<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Model\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'hello';
        return CategoryResource::collection(Category::all());
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
            return new CategoryResource($category);
        }else{
            return [
                'error' => 'something went wrong'
            ];
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
        return new CategoryResource(Category::find($id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category=Category::find($id);
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
            return new CategoryResource($category);
        }else{
            return [
                'error' => 'something went wrong'
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
}
