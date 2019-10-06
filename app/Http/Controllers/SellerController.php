<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Model\Item;
use App\Model\ItemImage;
use App\OrderItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{


    public function seller()
    {
        return view('seller.home');
    }


    public function products()
    {
        $items=Item::where('vendor_id',Auth::user()->id)->get();
        return view('item.index',compact('items'));
    }


    public function create()
    {
        return view('seller.additem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item=new Item();
        $item->title=$request->title;
        $item->description=$request->description;
        $item->category_id=$request->category_id;
        $item->color=$request->color;
        $item->size=$request->size;
        $item->views=0;
        $item->vendor_id=Auth::user()->id;
        $item->discount_ratio=$request->discount_ratio;
        $item->tax_ratio=$request->tax_ratio;
        $item->price=$request->price;


        if($item->save()){
            $itemImage=new ItemImage();
            $itemImage->item_id=$item->id;
            if($request->file('image')){
                $upload= $request->file('image');
                $fileformat=time().'.'.$upload->getClientOriginalExtension();
                if($upload->move('uploads/items_images/',$fileformat)){
                    $itemImage->image=$fileformat;
                }
            }
            $itemImage->save();
            return redirect()->route('seller.products');
        }else{
            return redirect()->back()->with('failure','something went wrong');
        }

    }



    public function recievedOrders()
    {
        //order_id,product_id,product,size,color,quantity,
        $order_items=OrderItem::where('vendor_id',Auth::user()->id)->where('status',1)->get();
        return view('seller.recieved_orders',compact('order_items'));
    }


    public function dispatchedOrders()
    {
        $order_items=OrderItem::where('vendor_id',Auth::user()->id)->where('status',2)->get();
        return view('seller.dispatched_orders',compact('order_items'));
    }

    public function ordersHistory()
    {
        $order_items=OrderItem::where('vendor_id',Auth::user()->id)->where('status',3)->get();
        return view('seller.orders_history',compact('order_items'));
    }

    public function changeToDispatch($id)
    {
        $order_item=OrderItem::where('id',$id)->first();
        $order_item->status=2;
        $order_item->update();
        return redirect()->route('seller.orders.recieved');
    }

    public function trackOrder($id)
    {
        return 'track details';
    }

    public function profile()
    {
        $profile=User::where('id',Auth::user()->id)->first();
        return view('seller.profile',compact('profile'));
    }

    public function customerProfile($id)
    {
        $buyer=User::find($id);
        return view('seller.customerprofile',compact('buyer'));
    }

    //function which is going to handle the purchasing of subscription plan for seller
    public function buySubscription()
    {
        return view('seller.subscribe');
    }
}
