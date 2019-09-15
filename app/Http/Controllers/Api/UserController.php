<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'type' => 'required',
            'password' => 'required',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->mobile_no=$request->mobile_no;
        $user->email=$request->email;
        $user->type=$request->type;
        $user->password=Hash::make($request->password);
        if($request->file('profile_image')){
            $upload=$request->file('profile_image');
            $fileformat=time().'.'.$upload->getClientOriginalExtension();
            if($upload->move('uploads/users/profile_image/',$fileformat)){
                $user->profile_image=$fileformat;
            }
        }
        if($user->save()){
            return $user;
        }else{
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
        //
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
        //
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
