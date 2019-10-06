<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Model\PinCode;
use Illuminate\Http\Request;

class PinCodeController extends Controller
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
        $pincodes=PinCode::where('vendor_id',Auth::user()->id)->get();
        return view('pincode.index',compact('pincodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pincode.create');
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
        $pinCode=new PinCode();
        $pinCode->pin_code=$request->pin_code;
        $pinCode->charges=$request->charges;
        $pinCode->vendor_id=Auth::user()->id;
        if($pinCode->save()){
            return redirect()->route('pincodes.index');
        }
        else{
            return redirect()->back()->with('failed','something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PinCode  $pinCode
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pincode=PinCode::find($id);
        return view('pincode.read',compact('pincode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PinCode  $pinCode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pincode=PinCode::find($id);
        return view('pincode.update',compact('pincode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PinCode  $pinCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PinCode $pinCode)
    {
        $request->validate([
            'pin_code' => 'required',
            'charges' => 'required'
        ]);
        //$pinCode=PinCode::findOrFail($id);
        $pinCode->pin_code=$request->pin_code;
        $pinCode->charges=$request->charges;
        $pinCode->vendor_id=Auth::user()->id;
        if($pinCode->update()){
            return redirect()->back()->with('success','pin code details updated successfully');
        }
        else{
            return redirect()->back()->with('failed','something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PinCode  $pinCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (PinCode::where('id',$id)->delete()) {
            return redirect('pincodes')->with('success','category deleted');
        }
        else{
            return redirect()->back()->with('failed','something went wrong');
        }
    }
}
