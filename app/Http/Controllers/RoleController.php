<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Rules\ValidPasswordPolicy;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role, Request $request)
    {
        
        $roles = Role::orderBy('created_at', 'desc')->paginate(5);

        

        if($request->ajax()){
            return view('roles.table', compact('roles'));
        }

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $validateRules = $request->validate([
            'name' => 'required',
            'password_policy' => ['required', new ValidPasswordPolicy]
        ]);

        $role['password_policy'] = $request->input('password_policy');
        $role['name'] = $request->input('name');


        $result = $role->save();

        if($result){
            return redirect('/roles')->with('success', trans('general.role_created'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::find($id);
        return view('roles.create', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $role['name'] = $request->input('name');
        $role['password_policy'] = $request->input('password_policy');

        $result = $role->save();

        if($result){
            return redirect('/roles')->with('success', trans('general.role_updated'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'success' => 'Role deleted'
        ]);
    }

    private function checkIfPolicyIsValid($policyRegex){
        try {
            preg_match($policyRegex, '');
        } catch (\Throwable $exception) {
            return false;
        }

        return true;
    }

}
