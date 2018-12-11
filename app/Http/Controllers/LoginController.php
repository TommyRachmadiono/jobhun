<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function CekLogin(Request $request) 
    {
        $data = [
            'email' => $request->email, 
            'password' => $request->password,
        ];

        //Cek apakah data dari form sesuai dengan di DB
        if (Auth::attempt($data)) {
            // if (Auth::User()->role == 'admin')
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function Logout () {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
