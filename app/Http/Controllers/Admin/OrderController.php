<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pending()
    {
        $order = Order::latest()->where('status','Pending')->paginate(20);
        return view('admin.order.pending',compact('order'));
    }

    public function complete()
    {
        $order = Order::latest()->where('status','Confirm')->paginate(20);
        return view('admin.order.confirm',compact('order'));
    }

    public function Status($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status = 'Pending') {
            $order->status = 'Confirm';
            $order->update();
            return redirect()->back()->with('success','Order is confirmed!');
        }
    }


}
