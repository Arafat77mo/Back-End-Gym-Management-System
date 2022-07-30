<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class classResource extends JsonResource
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
            "id" => $this->id,
            "className" =>$this->name,
            "ClassTime" =>$this->Duaration,
            'classDiscount' => $this->discount,
            "ClassDesc" =>$this->description,
            "ClassPrice"=>$this->price,
            "day" => $this->Day,
            "time" => $this->Time,
            "ClassImage" => $this->image
        ];
    }
}
