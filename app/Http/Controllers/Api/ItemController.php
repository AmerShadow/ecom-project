<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Model\Item;
use App\Model\ItemImage;

class ItemController extends Controller
{
    public function index()
    {
        return ItemCollection::collection(Item::all());
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($item=Item::find($id)){
            $item->views++;
            $item->update();
            return new ItemResource($item);
        }
        else{
            return "Item doesn't exist";
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item=new Item();
        $item->title=$request->title;
        $item->description=$request->description;
        $item->category_id=$request->category_id;
        $item->color=$request->color;
        $item->size=$request->size;
        $item->views=0;
        $item->vendor_id=0;
        $item->price=$request->price;



        if($item->save()){
            $itemImage=new ItemImage();
            $itemImage->item_id=$item->id;
            if($request->file('image')){
                $upload= $request->file('image');
                $fileformat=time().'.'.$upload->getClientOriginalExtension();
                if($upload->move('uploads/items_images/',$fileformat)){
                    $itemImage->image=$fileformat;
                }
            }
            $itemImage->save();
            return new ItemResource($item);
        }else{
            return [
                "error" => "something went wrong",
            ];
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {

        $item=Item::findOrFail($id);
        $item->title=$request->title;
        $item->description=$request->description;
        $item->category_id=$request->category_id;
        $item->color=$request->color;
        $item->size=$request->size;
        $item->price=$request->price;



        if($item->update()){
           return [
               'status' => 'Item Updated successfully',
           ];
        }else{
            return [
                'status' => 'unsuccessfull',
            ];
        }
        return $request;   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Item::where('id',$id)->delete()){
            ItemImage::where('item_id',$id)->delete();
            return "done";
        }else{
            return "failed";
        }
    }
}
