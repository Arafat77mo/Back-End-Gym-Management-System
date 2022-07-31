<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MembershipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "MemeberShipID" => $this->id,
            "MemeberShipType"=>$this->type,
            "MemeberShipPrice" => $this->price,
            "MemeberShipImage" =>$this->image
        ];
    }
}
