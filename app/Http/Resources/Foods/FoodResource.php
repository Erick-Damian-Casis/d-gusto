<?php

namespace App\Http\Resources\Foods;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'id'=> $this->id,
            'name'=> $this->name,
            'cost'=> $this->cost,
            'state'=> $this->state,
            'special'=> $this->special,
            'image'=> $this->image,
            'description'=> $this->description,
            ];
    }
}
