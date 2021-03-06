<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home()
    {
        return view('static_pages/home');
    }

    public function signup()
    {
        return view('static_pages/signup');
    }

    public function login()
    {
        return view('static_pages/login');
    }

    public function vision()
    {
        return view('static_pages/vision');
    }
    public function about()
    {
        return view('static_pages/about');
    }

}
