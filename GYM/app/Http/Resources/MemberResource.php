<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class emberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return [

        //     'name'=> $this-> name,
        //     'phone'=> $this-> phone,
        //     'gender'=> $this-> gender,
        //     'image'=> $this-> image,
        //     'session_id'=> $this-> session_id
        // ];
    }
}
