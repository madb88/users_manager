<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }


    public function create()
    {

        $roles = Role::all()->keyBy('id')->toArray();
        $roles = $this->prepareRoles($roles);


        return view('users.create', compact('roles'));

    }

    public function store(User $user, Request $request)
    {

        $validateRules = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password'=> 'min:3|required_with:re_password|same:re_password',
            're_password' => 'required|min:3'

        ]);

        $user->role()->associate(Role::where('id', $request->input('role'))->first());
        $user['name'] = $request->input('name');
        $user['email'] = $request->input('email');
        $user['password'] = Hash::make($request->input('password'));

        $user->save();
    }

    public function edit($id)
    {
        dd($id);
        //get User
        //return create view
    }

    public function update(Request $request, $id)
    {

    }

    private function prepareRoles($roles){
        foreach($roles as $key => $role){
            $roles[$key] = $role['name'];
        }

        return $roles;
    }
}
