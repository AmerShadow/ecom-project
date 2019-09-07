<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemImageResource;
use App\Model\ItemImage;
use App\Model\Item;
class ItemImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemImageResource::collection(ItemImage::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'item_id' => 'required',
            'image'   => 'required',
        ]);
        $itemImage=new ItemImage();
        $itemImage->item_id=$request->item_id;
        if($request->file('image')){
            $upload=$request->file('image');
            $fileformat=time().'.'.$upload->getClientOriginalExtension();
            if($upload->move('uploads/items_images/',$fileformat)){
                $itemImage->image=$fileformat;
            }
        }
        if($itemImage->save()){
            return new ItemImageResource($itemImage);
        }
        else{
            return "error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($itemImage=ItemImage::find($id)){
        return new ItemImageResource($itemImage);
        }
        else{
            return "There is no preview Image for this product";
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id' => 'required',
            'image'   => 'required',
        ]);
        $itemImage=ItemImage::findOrFail($id);
        $itemImage->item_id=$request->item_id;
        if($request->file('image')){
            $upload=$request->file('image');
            $fileformat=time().".".$upload->getClientOriginalExtension();
            if($upload->move('uploads/items_images',$fileformat)){
                $itemImage->image=$fileformat;
            }
        }
        if($itemImage->update()){
            return [
                'status' => 'item image updates successfully',
                'image details' => new ItemImageResource($itemImage),
            ];
        }
        else{
            return [
                'status' => 'failed! something went wrong',
                'image details' => new ItemImageResource($itemImage),
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showItemImages($id)
    {
        if($item=Item::find($id)){
            if ($itemImage=ItemImage::where('item_id',$id)->first()) {
                return ItemImageResource::collection(ItemImage::where('item_id',$id)->get());
            }
            else {
                return [
                    'notification' => 'Product Image is not provided',
                ];
            }

            }
        else {
            return [
                    'error' => 'incorrect product no',
                ];
         }

    }
}
