<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Rules\CustomRegexValidation;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)
    {

        $users = User::orderBy('created_at', 'desc')->paginate(5);
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

    public function show($id)
    {
        $user = User::find($id);
        $user['role'] = $user->role;

        return view('users.show', compact('user'));

    }

    public function store(User $user, Request $request)
    {
        $validateRules = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
            'twitter_handle' => [
                'nullable',
                new CustomRegexValidation('/^@+?([a-z0-9_]{1,15})$/i', trans('validation.custom.twitter_handle'))
            ],
        ]);

        $this->checkPasswordPolicy($request);

        $user->role()->associate(Role::where('id', $request->input('role'))->first());

        $user['name'] = $request->input('name');
        $user['surname'] = $request->input('surname');
        $user['email'] = $request->input('email');
        $user['password'] = Hash::make($request->input('password'));
        $user['twitter_handle'] = !empty($request->input('twitter_handle'))?$request->input('twitter_handle'):'';

        $result = $user->save();

        if($result){
            return redirect('/users')->with('success', trans('general.user_created'));
        } else {
            return redirect()->back();
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

        $validateRules = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'twitter_handle' => [
                'nullable',
                new CustomRegexValidation('/^@+?([a-z0-9_]{1,15})$/i', trans('validation.custom.twitter_handle'))
            ],
        ]);

        $user = User::find($id);

        $user['name'] = $request->input('name');
        $user['surname'] = $request->input('surname');
        $user['email'] = $request->input('email');
        $user['twitter_handle'] = $request->input('twitter_handle');
        $user->role()->associate(Role::where('id', $request->input('role'))->first());

        if(!empty($request->input('password'))){
            $this->checkPasswordPolicy($request);
            $user['password'] = Hash::make($request->input('password'));
        }

        $result = $user->save();

        if($result){
            return redirect('/users')->with('success', trans('general.user_updated'));
        } else {
            return redirect()->back();
        }


    }

    public function destroy(User $user)
    {

        $user->delete();
        return response()->json([
            'success' => 'User deleted'
        ]);
    }

    private function prepareRoles($roles)
    {
        foreach($roles as $key => $role){
            $roles[$key] = $role['name'];
        }

        return $roles;
    }

    private function checkPasswordPolicy($request):void
    {
        $role = Role::find($request->input('role'));
        $request->validate([
            'password' => [
                'required',
                new CustomRegexValidation($role['password_policy'], $role['name'] == 'Admin'?trans('users.admin_password_check'):trans('users.user_password_check'))
            ]
        ]);
    }
}
