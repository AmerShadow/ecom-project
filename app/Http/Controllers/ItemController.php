<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Model\Item;
use App\Model\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $item->vendor_id=Auth::user()->id;
        $item->discount_ratio=$request->discount_ratio;
        $item->tax_ratio=$request->tax_ratio;
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
            return $this->index();
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
        $item->discount_ratio=$request->discount_ratio;
        $item->tax_ratio=$request->tax_ratio;



        if($item->update()){
            $itemImage=ItemImage::where('item_id',$item->id)->first();
            if($request->file('image')){
                $upload= $request->file('image');
                $fileformat=time().'.'.$upload->getClientOriginalExtension();
                if($upload->move('uploads/items_images/',$fileformat)){
                    $itemImage->image=$fileformat;
                }
            }
            $itemImage->update();
            return $this->index();
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
        $item=Item::find($id);
        if($item->delete()){
            return redirect('items')->with('success','item deleted');
        }else{
            return redirect()->back()->with('failure','failed! try again');
        }
    }
}
