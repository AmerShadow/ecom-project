<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideRequest;
use App\Model\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides= Slide::all();
        return view('slide.index',compact('slides'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $slide=new Slide();
        $slide->title=$request->title;
        $slide->description=$request->description;
        $slide->index=$request->index;

        if($request->file('image')){
            $upload= $request->file('image');
            $fileformat=time().'.'.$upload->getClientOriginalExtension();
            if($upload->move('uploads/slide/',$fileformat)){
                $slide->image=$fileformat;
            }
            if($slide->save()){
                return redirect('slides')->with('success','category updated');
            }else{
                return redirect()->back()->with('failure','something went wrong');
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide=Slide::findOrFail($id);
        return view('slide.read',compact('slide'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //$slide=Slide::findOrFail($id);
        return view("slide.update",compact("slide"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Slide $slide)
    {
        //$slide=Slide::finfOrFail($id);
        $slide->title=$request->title;
        $slide->description=$request->description;
        $slide->index=$request->index;

        if($request->file('image')){
            $upload= $request->file('image');
            $fileformat=time().'.'.$upload->getClientOriginalExtension();
            if($upload->move('uploads/slide/',$fileformat)){
                $slide->image=$fileformat;
            }
        }
        if($slide->update()){
            return redirect('slides')->with('success','category updated');
        }else{
            return redirect()->back()->with('failure','something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Slide::where('id',$id)->delete()){
            return redirect('slides')->with('success','category deleted');
        }else{
            return redirect()->back()->with('failure','Failed try again');
        }
    }
}
