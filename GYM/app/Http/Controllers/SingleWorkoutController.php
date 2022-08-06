<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\SingleWorkoutCaregory;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiResponse;

class SingleWorkoutController extends Controller
{use ApiResponse;
    public function list()
    {

     $workoutCategory =SingleWorkoutCaregory::all();
     $msg=['your data returned successfully '];
    //  return $this->apiresponse( $workoutCategory,$msg,200);

       $workoutCategory = SingleWorkoutCaregory::all();
        if (count($workoutCategory) <= 0) { //for empty statement
            return ('empty');
        }
        // return response()->json($workoutCategory);
    //    return $this->apiresponse( $workoutCategory,$msg,200);

    return $workoutCategory;
    }











    public function show($id)
    {

        $workoutCategory=SingleWorkoutCaregory::find($id);

     if ($workoutCategory){
        // return response()->json($workoutCategory);

         $msg=['the  category return successfully '];
         return  $workoutCategory;


    }
    else{
        $msg=['this  category  not found '];
        return $this->apiresponse( $workoutCategory,$msg,200);
    }

    }





// to post new single workout category
    public function store(Request $request ){

        // $workoutCategory =SingleWorkoutCaregory::create($request ->all());
        $fileSystem = "";
                    $fileSystem = uploadImage("singleWorkout",$request->image);
        $workoutCategory = SingleWorkoutCaregory::create([
            "id" => $request->id,
            "name" =>$request->name,
            "level" =>$request->level,
            'body_place' => $request->body_place,

            "image" => $fileSystem
        ]);



        if ($workoutCategory){
            $msg=['the  category added successfully '];
            return $this->apiresponse( $workoutCategory,$msg,200);
        //   return $this->workoutCategory;


        }else{
            $msg=['this  category not saved '];
            return $this->apiresponse($workoutCategory,$msg,404);
         }



        }








public function deletecategory($id){
    $workoutCategory=SingleWorkoutCaregory::find($id);
    $result = $workoutCategory->delete();
    if($result){
        return['result'=>'category deleted'];
       }else{
        return['result'=>'category not  deleted'];

       }
}









public function updatecategory(request $request,$id){
    $singleworkout=SingleWorkoutCaregory::find($id);

    $singleworkout->update($request->all());

   if($singleworkout){

    return $singleworkout;
 }
 else{
    return['result'=>'category not  found'];

   }

}

}
