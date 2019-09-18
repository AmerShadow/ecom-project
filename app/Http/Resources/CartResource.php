<?php

namespace App\Http\Resources;

use App\Model\Item;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'item' => Item::where('id',$this->item_id)->value('title'),
            'item_detail' => route('api.item', $this->item_id),
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
     }
}
