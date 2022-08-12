<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberResource;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email'=> 'required|email'
        ]);

        if ($validator->fails()) {

            return response($validator->errors(), 400);
        }



        $member = Member::create($request->all());

       
        return $member;
    }

    ################ Relations ################

    public function getUser($id)
    {
        // $user = User::find($id);
        $member = Member::find($id);
        $user = Auth::user();
        // return "nass";
        return $member->user();
        return response() -> json ($user);
    }
}
