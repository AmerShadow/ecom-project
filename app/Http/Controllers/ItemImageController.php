<?php

namespace App\Http\Controllers;

use App\Model\ItemImage;
use Illuminate\Http\Request;

class ItemImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemimages=ItemImage::all();
        return view('itemimage.index',compact('itemimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemimage.create');
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
            return redirect()->back()->with('success','item image stored successfully');

        }
        else{
            return redirect()->back()->with('failed','something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemimage=ItemImage::where('item_id',$id)->first();
        return view('itemimage.read',compact('itemimage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemimage=ItemImage::findOrFail($id);
        return view('itemimage.update',compact('itemimage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fid)
    {
        $request->validate([
            'item_id' => 'required',
            'image'   => 'required',
        ]);
        $itemImage=ItemImage::findOrFail($fid);
        $itemImage->item_id=$request->item_id;
        if($request->file('image')){
            $upload=$request->file('image');
            $fileformat=time().$upload->getClientOriginalExtension();
            if($upload->move('uploads/items_images',$fileformat)){
                $itemImage->image=$fileformat;
            }
        }
        if($itemImage->update()){
            return redirect('itemimage.index')->with('success','image updated');
        }
        else{
            return redirect()->back()->with('failed','something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(ItemImage::where('id',$id)->delete()){
            return redirect('itemimages')->with('success','category deleted');
        }
        else{
            return redirect()->back()->with('failed','something went wrong');
        }

    }
}
