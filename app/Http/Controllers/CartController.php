<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Resources\CartResource;
use App\Model\Item;
use App\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return CartResource::collection(Cart::where('customer_id',$user_id)->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store($customer_id,$item_id)
    {
        if ($cart=Cart::where('customer_id',$customer_id)->where('item_id',$item_id)->first()) {
            $this->cartPlus($cart->id);
           return $cart;
        }

        if (User::find($customer_id)) {
            if (Item::find($item_id)) {
                $cart=new Cart();
                $cart->customer_id=$customer_id;
                $cart->item_id=$item_id;
                $cart->status=0;
                $cart->quantity=1;
                $cart->price=Item::where('id',$item_id)->value('price');
                if ($cart->save()) {
                     return new CartResource($cart);
                }
                else{
                     return [
                         "error" => "something went wrong",
                     ];
                 }
            }
            else {
                return [
                    "error" => "Item doesnt found",
                ];
            }

        }
        else {
            return [
                "error" => "Invalid User",
            ];
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Cart::find($id)) {
            Cart::find($id)->delete();
            return 'Item removed successfully from your cart';
        }
        else {
            return[
                'error' => 'no item in your cart'
            ];
        }

    }

        /**
         * When Plus button will be clicked(i.e when item quantity should be incremented)
         *  then this method is going to call
         */
    public function cartPlus($id){
        if($cart=Cart::find($id)){
            $cart->quantity++;
            $cart->update();
            return $cart;
        }
        else {
            return "no item found";

        }
        }

        /**
         * When minus button will be clicked(i.e when item quantity should be decremented)
         *  then this method is going to call
         */
    public function cartMinus($id){
        if ($cart=Cart::find($id)) {
            if ($cart->quantity<=1) {
                $cart->delete();
                return [
                    'Message' => 'Item Deleted successfully',
                ];
            }
            $cart->quantity--;
            $cart->update();
            return $cart;
        }
        else {
            return "no item found";
        }

    }
}
