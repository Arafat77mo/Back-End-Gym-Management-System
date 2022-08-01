<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Http\Resources\MembershipResource;
use Validator;
use  App\Models\Membership;



class MemeberShipController extends Controller
{
    use GeneralTrait;

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'type' => 'required|unique:Memberships|max:255',
            "price" => 'numeric |regex:/^\d+(\.\d{1,2})?$/',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails())

            return $this->returnError('404',$validator->errors());


            $fileSystem = "";
            $fileSystem = uploadImage("Memberships",$request->image);
        
        $MemberShip = Membership::create([
            "id" => $request->id,
            "type" =>$request->type,
            "price"=>$request->price,
            "image" => $fileSystem
        ]);

        return $this->returnData('AddMemeberships',new MembershipResource($MemberShip),'MemberShip added successfully','201');
    }

    public function index(){
       $MemberShips = MembershipResource::collection(Membership::all());
        return $this->returnData('all MemberShips',$MemberShips,'all your MemberShips','200');
    }

    public function update(Request $request,$id){
        $MemberShip = Membership::find($id);

        if(!$MemberShip)
        return $this->returnError('404','the MemberShip NotFound');

        $validator = Validator::make($request->all(), [
            'type' => 'required|unique:Memberships|max:255',
            "price" => 'numeric |regex:/^\d+(\.\d{1,2})?$/',
            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails())

        return $this->returnError('404',$validator->errors());

        $MemberShip->type = $request->type;
        $MemberShip->price = $request->price;
        if ($request->has("image"))
        $filePath = uploadImage("Memberships",$request->image);
        $MemberShip->image = $filePath;
        $MemberShip->update();
        return $this->returnData('newMemberShip',new MembershipResource($MemberShip),'MemberShip updated successfully','201');
    }

    public function show($id){

        $MemberShip = Membership::find($id);
        if($MemberShip)
        return $this->returnData('yourMemberShip',new MembershipResource($MemberShip),'selected MemberShip','200');

        return $this->returnError('404','the Class MemberShip');
    }

    public function destory($id){
        $MemberShip = Membership::find($id);
        if(!$MemberShip)
        return $this->returnError('404','the MemberShip NotFound');

        $MemberShip->delete($id);
        return $this->returnSuccessMessage('your MemberShip deleted Succefully');
    }
}
