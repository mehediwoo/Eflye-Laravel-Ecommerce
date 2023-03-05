<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function Index()
    {
        $confirm  = Order::where('status','Confirm')->pluck('price');
        $pending  = Order::where('status','Pending')->pluck('price');
        $confirm_order  = Order::where('status','Confirm')->count();
        $pending_order  = Order::where('status','Pending')->count();
        return view('admin.dashboard',compact('confirm','pending','confirm_order','pending_order'));
    }
}
