<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\URL;
use App\Model\ItemImage;

class ItemCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
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
            'image' => $url."/uploads/items_images/".ItemImage::where('item_id',$this->id)->value('image'),
        ];

    }
}
