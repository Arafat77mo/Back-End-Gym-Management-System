<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainerResource;
use App\Models\Trainer;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    public function index()
    {
        // $trainers = TrainerResource::collection(Trainer::get());
        $trainers = Trainer::all();
        // return response($trainers, 200);
        return $trainers;
    }

    public function show($id)
    {

        $trainer = Trainer::find($id);

        if ($trainer) {

            // return response(new TrainerResource($trainer), 200);
            return $trainer;
        }

        return response(null, 404);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {


            return response($validator->errors(), 400);
        }

            $fileSystem = "";
            $fileSystem = uploadImage("trainers",$request->image);

        // $trainer = Trainer::create($request->all());

        $trainer = Trainer::create([
            "id" => $request->id,
            "name" =>$request->name,
            "phone" =>$request->phone,
            'gender' => $request->gender,
            'decription' =>$request->decription,
            'session_id' => $request->session_id,
            "image" => $fileSystem
        ]);

        if ($trainer) {

            // return response(new TrainerResource($trainer), 201);
            return $trainer;
        }
        return response(null, 400);
    }


    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {


            return response($validator->errors(), 400);
        }

        $trainer = Trainer::find($id);

        if (!$trainer) {
            return response(null, 404);
        }

        $trainer->update($request->all());

        if ($trainer) {

            // return response(new TrainerResource($trainer), 201);
            return $trainer;
        }
    }

    public function destroy($id)
    {

        $trainer = Trainer::find($id);

        if (!$trainer) {
            return response(null, 404);
        } else {

            $trainer->delete($id);
            return response(null, 200);
        }
    }


    public function getTrainer($id)
    {

        $session = Session::find($id);

        //  return $session -> trainers;
        //  $session = Session::with('trainers')->find(1);
        //  return $session -> name;

        $trainers = $session->trainers;
        foreach ($trainers as $trainer) {

            echo   $trainer->name . '<br>';
        }
    }
}
