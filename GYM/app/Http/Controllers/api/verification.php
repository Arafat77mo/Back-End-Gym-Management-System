<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class verification extends Controller
{
    public function verifyEmail(Request $request){
        if($request->user()->hasVerifiedEmail()){
            return [
                "message" => "AlreadyVerified"
            ];
        }
        $request->user()->sendEmailVerificationNotification();
        return ["status" => "verification - Link - sent"];
    }

    public function verify(EmailVerificationRequest $request){
        if($request->user()->hasVerifiedEmail()){
            return [
                "message" => "AlreadyVerified"
            ];
        }

        if($request->user()->markEmailAsVerified()){
            event(new verified($request->user()));
        }

        return ["massege" => "Email verified Successfully"];
    }
}
