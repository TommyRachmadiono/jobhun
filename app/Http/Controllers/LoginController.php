<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Token;
Use Mail;
use Validator;

class LoginController extends Controller
{
    private $email = '';
    private $username = '';
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
        // $validator = request()->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:5|confirmed',
        //     'captcha' => 'required|captcha',
        // ],
        // ['captcha.captcha' => 'Kode captcha salah']);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            // return redirect()->to(app('url')->previous(). '#register-btn');
            return Redirect::to(URL::previous() . "#form-register")->withErrors($validator);
            // return redirect(url()->current() . "#anchor");
            // return redirect()->back()->withErrors($validator)->withInput()->with('mode', 'register');
            // return redirect('login')
            // ->withErrors($validator)
            // ->withInput();
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
        // return redirect()->route('home');
    }


    public function registerCek($tkn)
    {
        $token = Token::where('token', '=', $tkn)->first();
        if ($token)
        {
            $user = User::findOrFail($token->user_id);
            $user->status = 'verified';
            $user->save();

            return view('login')->with('message', 'Berhasil Register Silahkan Login');
        }
        return view('login')->with('message', 'Silahkan daftar kembali. Verifikasi gagal.');
        
    }

    public function refreshCaptcha(){
        return response()->json(['captcha'=>captcha_img()]);
    }

}
