<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','role:administrator']);
    }

    public function index()
    {
        $users = User::with('roles','authentications')->orderBy('name','asc')->get();

        return view('users.index', compact('users'));
    }


}
