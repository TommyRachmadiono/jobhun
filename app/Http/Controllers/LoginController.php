<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Token;
use DB;
use Mail;
use Validator;
use Session;

class LoginController extends Controller
{
    private $email = '';
    private $username = '';

    public function index(){
        if(Auth::check())
            return redirect()->route('home');
        else
            return view('login');
    }

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

    public function register(Request $request)
    {
        Session::forget('mode');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            session(['mode' => 'regis']);
            return redirect()->back()->withErrors($validator);
        }

        $user = new User;
        $user->fill($request->all());
        $user->role = 'administrator';
        $user->password = bcrypt($request->password);
        $user->status = 'unverified';
        $user->save();
        $this->email = $user->email;
        $this->username = $user->username;

        $token = new Token;
        $token->token = md5($user->email.'RahasiaRegister');
        $token->user_id = $user->id;
        $token->save();

        $data = array('name' => $user->username , 'body' => '<p>untuk verifikasi silahkan klik link berikut</p><p><a href="http://localhost/jobhun/public/register/' . $token->token .'">link registrasi</a></p>');

        Mail::send('email.mail', $data, function ($message) {
            $message->to($this->email, $this->username)->subject('Verifikasi Register');
            $message->from('jobhun.id@gmail.com', 'Jobhun');
        });

        return view('login')->with('message','Silahkan cek email anda untuk verifikasi');
    }

    public function lupaPassword(Request $request)
    {
        Session::forget('mode');
        $email = $request->email;
        $user = DB::table('users')->where('email', '=', $email)->first();
        if ($user)
        {
            $this->email = $user->email;
            $this->username = $user->username;
            $newPass = str_random(10);
            
            $token = new Token;
            $token->token = md5($user->email.'TokenLupaPassword');
            $token->user_id = $user->id;
            $token->save();

            $data = array('name' => $user->username, 'link' => "http://localhost/jobhun/public/password/forgot/' . $token->token .'");

            Mail::send('email.forgot_pass', $data, function ($message) {
                $message->to($this->email, $this->username)->subject('Lupa Password');
                $message->from('jobhun.id@gmail.com', 'Jobhun');
            });

            return view('login')->with('message','Silahkan cek email anda untuk mendapatkan password baru anda.');
        } 

        session(['mode' => 'forgot_pass']);
        Session::flash('message', "Email salah, silahkan masukkan lagi.");
        return back();
    }

    public function kirimPasswordBaru($tkn)
    {
        $token = Token::where('token', '=', $tkn)->first();
        if ($token)
        {
            $this->email = $user->email;
            $this->username = $user->username;
            $newPass = str_random(10);

            $data = array('name' => $user->username, 'newPass' => $newPass, 'link' => "http://localhost/jobhun/public/password/send-new-password/' . $token->token .'");

            Mail::send('email.forgot_pass', $data, function ($message) {
                $message->to($this->email, $this->username)->subject('Password Baru');
                $message->from('jobhun.id@gmail.com', 'Jobhun');
            });

            $token->delete();
            $user->password = $newPass;
            $user->save();
            
            return view('login')->with('message','Gunakan kata sandi yang baru untuk login');
        }
    }

    public function registerCek($tkn)
    {
        $token = Token::where('token', '=', $tkn)->first();
        if ($token)
        {
            $user = User::findOrFail($token->user_id);
            $user->status = 'verified';
            $user->save();
            $token->delete();

            return view('login')->with('message', 'Berhasil Register Silahkan Login');
        }
        return view('login')->with('message', 'Silahkan daftar kembali. Verifikasi gagal.');
        
    }

    public function refreshCaptcha(){
        return response()->json(['captcha'=>captcha_img()]);
    }

    public function destroySession(Request $request, $ses){
        $request->session()->forget($ses);
    }
}