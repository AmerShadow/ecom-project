<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model\Item;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productList()
    {
        $items=Item::all();
        return view('item.index',compact('items'));
    }


    public function productDetails($id)
    {

    }



    public function sellerList(){
        $users=User::where('type',2)->get();
        return view('admin.sellerlist',compact('users'));
    }

    public function buyerList()
    {
        $users=User::where('type',3)->get();
        return view('admin.index',compact('users'));
    }


    public function buyerDetails($id)
    {
        $buyer=User::where('id',$id)->where('type',3)->first();
        return view('admin.buyerdetails',compact('buyer'));
    }


    public function sellerDetails($id)
    {
        $seller=User::where('id',$id)->where('type',2)->first();
        return view('admin.sellerdetails',compact('seller'));
    }

    public function userDestroy($id)
    {
        $user=User::find($id);
        if(User::where('id',$id)->delete()){
            if ($user->type==2) {
                return redirect('admin/sellerlist');
            }
            else {
                return redirect('admin/buyerlist');
            }
        }else{
            if ($user->type==2) {
                return redirect('admin/sellerlist');
            }
            else {
                return redirect('admin/buyerlist');
            }
        }
    }


    public function changeUserStatus($id)
    {
        $user=User::findOrFail($id);
        if ($user->status==1) {
           $user->status=0;
        }
        else{
            $user->status=1;
        }
        $user->update();
        $users=User::all();
        if ($user->type==2) {
            return redirect('admin/sellerlist');
        }
        else {
            return redirect('admin/buyerlist');
        }

    }


    public function addDeliveryPeer()
    {
        return "add peer";
    }

    public function deliveryList()
    {
        return "Delivery List";
    }

    public function deliveyDetails($id)
    {
        return 'delivery details';
    }

    public function transactionReports()
    {
        return "Transaction Reports";
    }

    public function successfullTransactions()
    {
        return 'Successfull Transaction- Code will be written after getting payment api';
    }

    public function failedTransactions()
    {
        return 'Failed Transaction- Code will be written after getting payment api';
    }



    //function to manipulate permissions of the customer
    public function customerPermissions()
    {
        return 'Here you are going to see all the permissions of the customer';
    }

     //function to manipulate permissions of the seller
     public function sellerPermissions()
     {
         return 'Here you are going to see all the permissions of the seller';
     }


}
