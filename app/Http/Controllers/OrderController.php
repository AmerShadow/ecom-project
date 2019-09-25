<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Resources\CartResource;
use App\Http\Resources\ItemResource;
use App\Model\Item;
use App\Model\PinCode;
use App\Order;
use App\OrderItem;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($customer_id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function orderPreview($customer_id)
    {
        $customer=User::where('id',$customer_id)->first();
        foreach (Cart::where('customer_id',$customer_id)->get() as $item) {
            $item->status=1;
            $item->update();
        }
        //$order=Cart::where('customer_id',$customer_id)->get();
        return [
            'items' => [
                CartResource::collection(Cart::where('customer_id',$customer_id)->get()),
            ],
            'customer' => [
                'name' => $customer->name,
                'email' => $customer->email,
                'mobile_no' => $customer->mobile_no,
                'delivery_address' => $customer->address,
                'total_cost' => $this->calTotal($customer_id),
            ],
        ];
    }

    public function calTotal($customer_id)
    {
        $total=0;
        $tax=0;
        $discount=0;
        foreach (Cart::where('customer_id',$customer_id)->get() as $item_id) {
            $item=Item::where('id',$item_id->item_id)->first();
            $discount=$discount+($item->discount_ratio/100*$item->price);

            //tax should be added after deduction of discount
            $tax=$tax+($item->tax_ratio/100*($item->price-$discount));

            $total=$total+$item->price;
        }
        return [
            'original_cost' => $total,
            'tax' => $tax,
            'discount' => $discount,
            'grand_total' => $total-$discount+$tax,
                ];
    }

    public function removeItem($itemid,$customerid)
    {
        $item=cart::where('item_id',$itemid)->where('customer_id',$customerid)->first();
        $item->status=0;
        $item->update();
        return 'item removed successfully';
    }

    public function confirmOrder(Request $request,$customerid)
    {
        $total=0;
        foreach (Cart::where('customer_id',$customerid)->where('status',1)->get() as $cartItem) {
            $orderItem=new OrderItem();
            $item=Item::where('id',$cartItem->item_id)->first();

            if (PinCode::where('vendor_id',$item->vendor_id)->where('pin_code',User::where('id',$customerid)->value('pin_code'))->count()<=0) {
                return [
                    'error' => 'delivery is not possible at your pin code',
                    'item' => new ItemResource($item),
                ];

            }

            $orderItem->item_id=$cartItem->item_id;
            $orderItem->vendor_id=$item->vendor_id;
            $orderItem->mrp=$item->price;
            $orderItem->tax_ratio=$item->tax_ratio;
            $orderItem->discount_ratio=$item->discount_ratio;
            $orderItem->quantity=$cartItem->quantity;

            $discount=($item->discount_ratio/100*$item->price);

            //tax should be added after deduction of discount
            $tax=($item->tax_ratio/100*($item->price-$discount));
            $orderItem->total=(($item->price)-$discount+$tax)*$orderItem->quantity;

            $total=$total+$orderItem->total;
            $orderItem->save();
        }
        $order=new Order();
        $order->customer_id=$customerid;
        $order->total=$total;
        $order->other_charges=100.00;
        $order->grand_total=$total+$order->other_charges;
        $order->payment_mode=$request->payment_mode;

        foreach (Cart::where('customer_id',$customerid)->where('status',1)->get() as $cartItem) {
            $cartItem::delete();
        }





    }




}
