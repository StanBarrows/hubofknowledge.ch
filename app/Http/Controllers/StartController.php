<?php

namespace App\Http\Controllers;

class StartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = auth()->user()->questions()->with('user')->orderBy('created_at','desc')->get();

        return view('start.index', compact('questions'));
    }
}
