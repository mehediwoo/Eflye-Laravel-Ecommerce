<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddr;
use App\Models\Cart;

class ShippingController extends Controller
{
    public function index()
    {
        $user_id = session()->get('customer_id');
        $shipping = ShippingAddr::where('user_id',$user_id)->first();
        if($shipping){
            return redirect()->route('place.order');
        }else{
            return view('front.shipping');
        }

    }

    public function Store(Request $request)
    {
        $request->validate([
            'phone'    => 'required',
            'state'    => 'required',
            'cityTown' => 'required',
            'address'  => 'required',
        ]);

        $user_id = session()->get('customer_id');

        $shipping = new ShippingAddr;
        $shipping->user_id   = $user_id;
        $shipping->phone     = $request->input('phone');
        $shipping->state     = $request->input('state');
        $shipping->city_twon = $request->input('cityTown');
        $shipping->Address   = $request->input('address');
        $result = $shipping->save();
        return redirect()->back()->with('success','shipping success');
    }

    // Place Order
    public function PlaceOrder()
    {
        $user_id  = session()->get('customer_id');
        $shipping = ShippingAddr::where('user_id',$user_id)->first();
        $cart     = Cart::where('user_id',$user_id)->get();
        return view('front.placeOrder',compact('shipping','cart'));
    }
}
