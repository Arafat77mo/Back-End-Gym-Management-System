<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use  App\Models\Session;
use  App\Models\Trainer;
use  App\Models\User;
use  App\Models\Member;
use App\Http\Resources\classResource;
use Validator;
use Carbon\Carbon;


class ClassesController extends Controller
{
    use GeneralTrait;

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:Sessions|max:255',
            'Duaration' => 'required',
            'discount' => 'required',
            'description' => 'required|max:255',
            "price" => 'numeric |regex:/^\d+(\.\d{1,2})?$/',
            "Day" => 'required',
            "Time" => 'required',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails())

            return $this->returnError('404',$validator->errors());


            $fileSystem = "";
            $fileSystem = uploadImage("classess",$request->image);
        
        // $class = Session::create($request->all());

        $class = Session::create([
            "id" => $request->id,
            "name" =>$request->name,
            "Duaration" =>$request->Duaration,
            'discount' => $request->discount,
            "description" =>$request->description,
            "price"=>$request->price,
            "Day" => $request->Day,
            "Time" => $request->Time,
            "image" => $fileSystem
        ]);

        // return $this->returnData('addedclass',new classResource($class),'class added successfully','201');
        return $class;
    }

    public function index(){
        // $classes = Session::all();
    //    $classes = classResource::collection(Session::all());
    $classes = Session::all();
        // return $this->returnData('all classes',$classes,'all your classes','200');
        return($classes);
    }

    public function update(Request $request,$id){
        $class = session::find($id);

        if(!$class)
        return $this->returnError('404','the Class NotFound');

        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'Duaration' => '',
            'discount' => '',
            'description' => '|max:255',
            "price" => 'numeric |regex:/^\d+(\.\d{1,2})?$/',
            "Day" => '',
            "Time" => '',
            // "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails())

        return $this->returnError('404',$validator->errors());

        $class->name = $request->name;
        $class->Duaration = $request->Duaration;
        $class->discount = $request->discount;
        $class->description = $request->description;
        $class->price = $request->price;
        $class->Day = $request->Day;
        $class->Time = $request->Time;
        // if ($request->has("image"))
        // $filePath = uploadImage("classes",$request->image);
        // $class->image = $filePath;
        $class->update();
        // $class::update($request->all());
        // $class->save();
        // return $this->returnData('newClass',new classResource($class),'class updated successfully','201');
        return $class;
    }

    public function show($id){

        $class = session::find($id);
        if($class)
        // return $this->returnData('yourClass',new classResource($class),'selected Class','200');

        return $class;

        return $this->returnError('404','the Class NotFound');
    }

    public function destory($id){
        $class = session::find($id);
        if(!$class)
        return $this->returnError('404','the Class NotFound');

        $class->delete($id);
        return $this->returnSuccessMessage('your Class deleted Succefully');
    }

        public function getTrainer($id){
            $class = session::find($id);
            if(!$class)
            return $this->returnError('404','the Class NotFound');

            $traineres = $class->trainers;

            foreach($traineres as $trainere){
            $trainerName =  $trainere -> name;
            // echo $trainerName;
            }
            // return $this->returnData('TrainerName',$trainerName,'trainerNameSuccefully','200');
            return $trainerName;
        }

        // public function test(){
        //     // return Carbon::now()->format('M'); //
        //    return Carbon::tomorrow()->format('l');
        //     return Carbon::today()->format('l');
        // }

        public function TodayClass(){

            $today = Carbon::today()->format('l'); // 
            // $class = classResource::collection(Session::where('Day',$today)->get());
            $class = Session::where('Day',$today)->get();

            // return $this->returnData('Our Class Today',$class['name'],'classesToday','200');
            return $class;
        }


        public function NextDayClass(){

            $tomorrow = Carbon::tomorrow()->format('l');
            // $class = classResource::collection(Session::where('Day',$tomorrow)->get());
            $class = (Session::where('Day',$tomorrow)->get());
            return $class;

            return $this->returnData('Our Class NextDay',$class,'classessTomorrow','200');
        }
                //// counting for dashboard
        public function classesCount(){
            $class = Session::count();
            if($class == 0)
            return 'No class Yet';
            return $class;
        }

        
        public function counttrainer(){
            $trainer = Trainer::count();
            if($trainer == 0)
            return 'no trainer yet';
            return $trainer;
        }

        
        public function Countusers(){
            $users = User::count();
            if($users == 0)
            return 'No users yet';
            return $users;
        }

        
        public function CountMember(){
            $member = Member::count();
            if($member == 0)
            return 'No member yet';
            return $member;
        }

        public function getclassMember(){
            // $sessions = $this->session->with('members')->all();
            // $session = Member::all();
            // $allmember = Member::with('session')->get();
            // return $allmember['session'].name;

           return  Member::query()->with(['session' => function ($query) {
        $query->select('id', 'name');}])->get();
            // return $session->with('session');
        }
       


}
