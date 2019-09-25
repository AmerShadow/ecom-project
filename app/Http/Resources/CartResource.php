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
        $item=Item::where('id',$this->item_id)->first();
        return [
            'item' => $item->title,
            'item_detail' => route('api.item', $this->item_id),
            'quantity' => $item->quantity,
            'tax_ratio' => $item->tax_ratio,
            'discount_ratio' => $item->discount_ratio,
            'price' => $item->price,
        ];
     }
}
