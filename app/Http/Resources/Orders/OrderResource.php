<?php

namespace App\Http\Resources\Orders;

use App\Http\Resources\Foods\FoodResource;
use App\Models\Food;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'spec'=> $this->spec,
            'amount'=> $this->amount,
            'orderAt'=> $this->order_at,
            'food'=>FoodResource::make($this->food),
        ];
    }
}
