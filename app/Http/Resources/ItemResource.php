<?php

namespace App\Http\Resources;

use App\Model\ItemImage;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ItemResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category_id,
            'color' => $this->color,
            'size' => $this->size,
            'views' => $this->views,
            'vendor'=>$this->vendor_id,
            'image' => $url.'/uploads/items_images/'.ItemImage::where('item_id',$this->id)->value('image'),
            ];
    }
}
