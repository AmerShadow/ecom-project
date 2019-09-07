<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        if($request->file('image')){
            $upload= $request->file('image');
            $fileformat=time().'.'.$upload->getClientOriginalExtension();
            if($upload->move('uploads/category/',$fileformat)){
                $category->image=$fileformat;
            }
        }
        if($category->save()){
            return redirect()->back()->with('success','Category added successfully');
        }else{
            return redirect()->back()->with('failure','Failed try again');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($category=Category::find($id)){
            return view('category.read',compact('category'));
        }
        else{
            return redirect()->back()->with('failure','Failed try again');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('category.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //$category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        if($request->file('image')){
            $upload= $request->file('image');
            $fileformat=time().'.'.$upload->getClientOriginalExtension();
            if($upload->move('uploads/category/',$fileformat)){
                $category->image=$fileformat;
            }
        }
        if($category->update()){
            return redirect('categories')->with('success','category updated');
        }else{
            return redirect()->back()->with('failure','Failed try again');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        if(Category::where('id',$id)->delete()){
            return redirect('categories')->with('success','category deleted');
        }else{
            return redirect('categories')->with('failed','something went wrong');
        }
    }
}
