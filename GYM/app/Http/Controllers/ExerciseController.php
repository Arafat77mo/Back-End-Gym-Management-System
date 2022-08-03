<?php

namespace App\Http\Controllers;
use App\Models\SingleWorkoutCaregory;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiResponse;

class ExerciseController extends Controller
{ use ApiResponse;

    ////get exerciese by category id
    public function listexercies($id)
    {

        $workoutCategory=SingleWorkoutCaregory::find($id);

    //    return $workoutCategory->exercies;


        if ($workoutCategory){
        // return response()->json($workoutCategory);

         $msg=['the  exercies return successfully '];
         return $this->apiresponse(  $workoutCategory->exercies,$msg,200);

        //  return $workoutCategory->exercies;

    }
    else{
        $msg=['this this category dose not exist '];
         return response ($msg);
     }

    }




    public function store(Request $request ){

        // $product =Product::create($request ->all());
        $fileSystem = "";
                    $fileSystem = uploadImage("exercies",$request->image);
        $exercies = Exercise::create([
            "id" => $request->id,
            "name" =>$request->name,
            "equipment" =>$request->equipment,
            'discription' => $request->discription,
            "sets" =>$request->sets,
            "reps" =>$request->reps,
            "rest" =>$request->rest,
            "single_workout_caregorie_id" =>$request->single_workout_caregorie_id,


            "image" => $fileSystem]);



        if ($exercies){
            $msg=['the  exercies added successfully '];
        //   return $this->$exercies;
        return $this->apiresponse($exercies,$msg,200);



        }else{
            $msg=['this  exercies not saved '];
            // return $this->$msg;
            return $this->apiresponse($exercies,$msg,200);

         }



        }






        public function updateExercies(request $request,$id){
            $exercies=Exercise::find($id);

            $exercies->update($request->all());

            //   return $this->$exercies;
           if($exercies){
             $msg=['the  exercies updated successfully '];
            return $this->apiresponse($exercies,$msg,200);
         }
         else{
            return['result'=>'exercise not  found'];

           }

        }






        public function deleteexercise($id){
            $exercies=Exercise::find($id);
            $result = $exercies->delete();
            if($result){
                return['result'=>'exercies deleted'];
               }else{
                return['result'=>'exercies not  deleted'];

               }
        }
}
