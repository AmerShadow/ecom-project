<?php

namespace App\Http\Resources;

use App\Model\Category;
use App\Model\Item;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'parent category' => Category::where('id',$this->parent_id)->value('name'),
            'image' =>$url."/uploads/category/".$this->image,
            'products' => Item::where('category_id',$this->id)->count(),
        ];
    }
}
