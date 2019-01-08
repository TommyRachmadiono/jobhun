<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

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
        } else {
            $data = [
                'username' => $request->email, 
                'password' => $request->password,
            ];
            if (Auth::attempt($data))
                return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function Logout () {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha' => 'Kode captcha salah']);


        $user = new User;
        $user->fill($request->all());
        $user->role = 'author';
        $user->password = bcrypt($request->password);
        $user->status = 'unverified';
        $user->save();
       
    }

    public function refreshCaptcha(){
        return response()->json(['captcha'=>captcha_img()]);
    }

}
