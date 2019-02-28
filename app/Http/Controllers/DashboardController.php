<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\UsersChart;
use App\User;
use App\Role;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $roles = Role::count();

        return view('homepage', compact('users', 'roles'));
    }

}
