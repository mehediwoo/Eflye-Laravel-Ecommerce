<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ShippingAddr;
use App\Models\Order;

class CartController extends Controller
{
    public function Index(Request $request)
    {
        if(session()->has('name') || session()->has('email')){
            $request->validate([
                'qty' => 'required'
            ],
            [
                'qty.required' => 'Your quantity is emtpy!'
            ]);
            $product_id = $request->input('product_id');
            $stock      = $request->input('stock');
            $price      = $request->input('price');
            $qty        = $request->input('qty');
            $size       = $request->input('size');
            $color      = $request->input('color');
            if($qty > $stock){
                return redirect()->back()->with('error','Your quantity is more than our stock! Pleaes decress some iteam');
            }else{
                $cart = new Cart;
                $cart->user_id    = session()->get('customer_id');
                $cart->product_id = $product_id;
                $cart->size = $size;
                $cart->color = $color;
                $cart->quantity = $qty;
                $cart->price = $qty * $price;
                $result = $cart->save();
                if($result){
                    return redirect()->back()->with('success','Iteam is added to cart successfully!');
                }else{
                    return redirect()->back()->with('error','Iteam is not added to cart successfully! please try again!');
                }

            }
        }else{
            return redirect()->route('customer.auth')->with('error','Please login and buy product');
        }

    }
    // Cart Items Page
    public function CartItems()
    {
        $customerId = session()->get('customer_id');
        $cart_items = Cart::where('user_id','=',$customerId)->get();
        return view('front.cart', compact('cart_items'));
    }

    // Remove Cart Iteam
    public function RemoveCart($id)
    {
        $remove = Cart::findOrFail($id)->delete();
        if($remove){
            return redirect()->back()->with('success','Cart iteam remove successfully!');
        }else{
            return redirect()->back()->with('error','Something wrong, please try again!');
        }

    }

    // Order
    public function Order()
    {
        $user_id  = session()->get('customer_id');
        $user_name  = session()->get('name');
        $shipping = ShippingAddr::where('user_id',$user_id)->first();
        $cart     = Cart::where('user_id',$user_id)->get();
        foreach ($cart as $iteam) {
            $order = new Order;
            $order->user_id      =  $user_id;
            $order->user_name    =  $user_name;
            $order->Phone =  $shipping->phone;
            $order->state =  $shipping->state;
            $order->city  =  $shipping->city_twon;
            $order->address  =  $shipping->Address;
            $order->product_name =  $iteam->product->title;
            $order->image =  $iteam->product->thumbnail;
            $order->size =  $iteam->size;
            $order->color =  $iteam->color;
            $order->qty =  $iteam->quantity;
            $order->price =  $iteam->price;
            $order->save();

        }
        if($order==true){
            $carts  = Cart::where('user_id','=',$user_id)->delete();
            return redirect()->route('PendingOrder')->with('success','Your order is pending, wait to confirm it!');
        }



    }
}
