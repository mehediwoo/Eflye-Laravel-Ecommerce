<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddr;
use App\Models\Order;

class ProfileController extends Controller
{
    public function profile()
    {
        $addr = ShippingAddr::where('user_id',session()->get('customer_id'))->first();
        return view('front.profile.profile',compact('addr'));
    }

    public function dashboard()
    {
        $confirm_order = Order::where('user_id',session()->get('customer_id'))->where('status','Confirm')->count();
        $pending_order = Order::where('user_id',session()->get('customer_id'))->where('status','Pending')->count();
        $pending_ammo  = Order::where('user_id',session()->get('customer_id'))->where('status','Pending')->pluck('price');
        $confirm_ammo  = Order::where('user_id',session()->get('customer_id'))->where('status','Confirm')->pluck('price');
        return view('front.profile.dashboard',compact('confirm_order','pending_order','pending_ammo','confirm_ammo'));
    }
    public function PendingOrder()
    {
        $pending_order = Order::where('user_id',session()->get('customer_id'))->where('status','Pending')->get();
        return view('front.profile.pendingOrder',compact('pending_order'));
    }
    public function OrderHistory()
    {
        $confirm_order = Order::where('user_id',session()->get('customer_id'))->where('status','Confirm')->get();
        return view('front.profile.orderHistory',compact('confirm_order'));
    }
}
