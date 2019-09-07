<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userList(){
        $users=User::all();
        return view('admin.index',compact('users'));
    }

    public function userDestroy($id)
    {
        if(User::where('id',$id)->delete()){
            return redirect('admin/userlist')->with('success','category deleted');
        }else{
            return redirect('admin/userlist')->with('failed','something went wrong');
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
        return redirect('admin/userlist');
    }
}
