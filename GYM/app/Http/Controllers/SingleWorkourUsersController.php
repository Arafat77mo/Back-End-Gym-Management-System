<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\SingleWorkoutCaregory;

class SingleWorkourUsersController extends Controller
{
    public function showcategory()
    {

    //     $user=User::find(2);

    // //    return $workoutCategory->exercies;

    //    return  $user->categories;

    $userId=Auth::user()->id;
    return $userId;
    }




  public function addMySingleworkout(){
    $userId=Auth::user()->id;
        return $userId;
  }
}

