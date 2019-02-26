<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Rules\PasswordRegex;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userModel = new User();
        $users = $userModel::paginate(10);

        $roles = Role::all()->keyBy('id')->toArray();
        $roles = $this->prepareRoles($roles);

        if($request->ajax()){
            return view('users.table', compact('users','roles'));
        }

        return view('users.index', compact('users','roles'));
    }


    public function create()
    {

        $roles = Role::all()->keyBy('id')->toArray();
        $roles = $this->prepareRoles($roles);

        return view('users.create', compact('roles'));

    }

    public function show($id){
        $user = User::find($id);
        $user['role'] = $user->role;
        
        
        return view('users.show', compact('user'));

    }

    public function store(User $user, Request $request)
    {

        $validateRules = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $this->checkPasswordPolicy($request);

        $user->role()->associate(Role::where('id', $request->input('role'))->first());
        $user['name'] = $request->input('name');
        $user['email'] = $request->input('email');
        $user['password'] = Hash::make($request->input('password'));

        $result = $user->save();

        if($result){
            return redirect('/users')->with('success', trans('general.user_created'));
        }

    }


    public function edit($id)
    {
        $roles = Role::all()->keyBy('id')->toArray();
        $roles = $this->prepareRoles($roles);

        $user = User::find($id);

        return view('users.create', compact('roles', 'user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $user['name'] = $request->input('name');
        $user['email'] = $request->input('email');
        $user['twitter_handle'] = $request->input('twitter_handle');
        $user->role()->associate(Role::where('id', $request->input('role'))->first());

        if(!empty($request->input('password'))){
            $this->checkPasswordPolicy($request);
            $user['password'] = Hash::make($request->input('password'));

        }
        $user->save();

        return redirect('/users');


    }

    public function destroy(User $user){

        $user->delete();

        return response()->json([
            'success' => 'deleted'
        ]);
    }

    private function prepareRoles($roles){
        foreach($roles as $key => $role){
            $roles[$key] = $role['name'];
        }

        return $roles;
    }

    private function checkPasswordPolicy($request):void{
        $role = Role::find($request->input('role'));
        $request->validate([
            'password' => [
                'required',
                new PasswordRegex($role['password_policy'], $role['name'] == 'Admin'?trans('users.admin_password_check'):trans('users.user_password_check'))
            ]
        ]);

    }
}
