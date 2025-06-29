<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = auth()->user()->projects()->limit(5)->latest()->get();

        return view('index', compact('projects'));
    }
}
