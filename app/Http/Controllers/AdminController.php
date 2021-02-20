<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function dashboard()
    {
        if(auth()->user()->is_admin == 1)
        {
            return view('admin.index'); 
        }else{
            return redirect()->route('home');

        }
       
    }
}
