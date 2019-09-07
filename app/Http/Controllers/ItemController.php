<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Model\Item;
use App\Model\ItemImage;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
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
            return redirect()->back()->with('success','Item added successfully');
        }else{
            return redirect()->back()->with('failure','something went wrong');
        }

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
            return view('item.read',compact('item'));
        }
        else{
            return "Item doesn't exist";
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::findOrFail($id);
        return view('item.update',compact('item'));
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
            return redirect('items')->with('Item updated');
        }else{
            return redirect()->back()->with('something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Item::where('id',$id)->delete()){
            return redirect('items')->with('success','item deleted');
        }else{
            return redirect()->back()->with('failure','failed! try again');
        }
    }
}
