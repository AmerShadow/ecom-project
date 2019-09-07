<?php

namespace App\Http\Resources;
use App\Model\Item;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ItemImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $url=URL::to('/');
        return [
            'item' => Item::where('id',$this->item_id)->value('title'),
            'image id'=> $this->id,
            'image' =>$url.'/uploads/items_images/'.$this->image,
        ];
    }
}
