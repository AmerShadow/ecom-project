<?php

namespace App\Http\Controllers;

use App\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
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
        $plans=SubscriptionPlan::all();
        return view('subscription.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscriptionPlan=new SubscriptionPlan();

        $subscriptionPlan->title=$request->title;
        $subscriptionPlan->price=$request->price;
        $subscriptionPlan->duration=$request->duration;
        $subscriptionPlan->max_stock=$request->max_stock;

        if ($subscriptionPlan->save()) {
            return redirect()->route('subscriptions.index');
        }
        else {
            return redirect()->back();
        }



        }



    /**
     * Display the specified resource.
     *
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionPlan $subscriptionPlan)
    {
        $plans=SubscriptionPlan::all();
        return view('subscription.index',compact('plans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan=SubscriptionPlan::where('id',$id)->first();
        return view('subscription.update',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscriptionPlan=SubscriptionPlan::find($id);

        $subscriptionPlan->title=$request->title;
        $subscriptionPlan->price=$request->price;
        $subscriptionPlan->duration=$request->duration;
        $subscriptionPlan->max_stock=$request->max_stock;

        if ($subscriptionPlan->save()) {
            return redirect()->route('subscriptions.index');
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (SubscriptionPlan::where('id',$id)->delete()) {
            return redirect()->route('subscriptions.index');
        }
        else {
            return redirect()->back()->with("error","something went wrong");
        }
    }
}
