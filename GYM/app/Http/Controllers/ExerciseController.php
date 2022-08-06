<?php

namespace App\Http\Controllers;
use App\Models\SingleWorkoutCaregory;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiResponse;

class ExerciseController extends Controller
{ use ApiResponse;



    public function gitAllExercies()
    {

     $product =Exercise::get();
     $msg=['your data returned successfully '];

    return($product) ;




    //    return $this->apiresponse($product,$msg,200);
    //  return response($product,200,$msg);
    }

















    ////get exerciese by category id
    public function listexercies($id)
    {

        $workoutCategory=SingleWorkoutCaregory::find($id);

    //    return $workoutCategory->exercies;


        if ($workoutCategory){
        // return response()->json($workoutCategory);

         $msg=['the  exercies return successfully '];
        //  return $this->apiresponse(  $workoutCategory->exercies,$msg,200);

         return $workoutCategory->exercies;

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



            //   return $this->$exercies;
           if($exercies){
             $msg=['the  exercies updated successfully '];
               $exercies->update($request->all());
              return $exercies;
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






        public function exerciesdatails($id)
        {

         $exercies= Exercise::find($id);
         if ($exercies){
            // return response()->json($product);
            return $exercies;

            //  $msg=['the  product return successfully '];
        //    return $this->apiresponse(new ProductResource($product));
        // return $this->apiresponse( $exercies,$msg,200);



         }else{
            $msg=['this  exercies not found '];
            return $this->apiresponse($exercies,$msg,404);
         }


        }

}
