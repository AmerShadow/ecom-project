<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PinCodeResource;
use App\Model\PinCode;

class PinCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PinCodeResource::collection(PinCode::all());
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
            'pin_code' => 'required',
            'charges' => 'required'
        ]);
        $pincode=new PinCode();
        $pincode->pin_code=$request->pin_code;
        $pincode->charges=$request->charges;
        if($pincode->save()){
            return [
                'status' => 'pincode added successfully',
                'pin code data' => new PinCodeResource($pincode),
            ];
        }
        else{
            return [
                'status' => 'Something went wrong',
                'given data' => new PinCodeResource($pincode),
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
        if ($pincode=PinCode::find($id)) {
            return new PinCodeResource($pincode);
        }
        else {
            return [
                'status' => 'Something went wrong',
                'given data' => new PinCodeResource($pincode),
            ];
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
            'pin_code' => 'required',
            'charges' => 'required'
        ]);
        $pincode=PinCode::find($id);
        $pincode->pin_code=$request->pin_code;
        $pincode->charges=$request->charges;
        if($pincode->update()){
            return [
                'status' => 'pincode updated successfully',
                'pin code data' => new PinCodeResource($pincode),
            ];
        }
        else{
            return redirect()->back()->with('failed','something went wrong');
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
