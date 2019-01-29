<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use Validator;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails())
            return response()->json(['errors' => 'Tulis Email dengan benar'],422);
        
        $email = $request->email;
        $subscribe = Subscription::where('email', '=', $email)->first();
            
        if ($subscribe != NULL)
            return response()->json(['errors' => 'Email sudah terdaftar berlangganan'],419);
        else {
           $subscribe = Subscription::create($request->all());
           return response()->json(['success' => 'Berhasil berlangganan artikel Jobhun']);
       }
   }
}
