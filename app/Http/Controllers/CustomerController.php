<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function authenticate()
    {
        if(session()->has('name') || session()->has('email')){
            return redirect()->route('home');
        }else{
            return view('front.authCustomer.login');
        }

    }

    // Customer Login
    public function login(Request $request)
    {
        if(session()->has('name') || session()->has('email')){
            return redirect()->route('home');
        }else{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
            $user = Customer::where('email',$request->email)->first();
            if($user==true && Hash::check($request->password, $user->password)){
                session()->put('name',$user->name);
                session()->put('email',$user->email);
                session()->put('customer_id',$user->id);
                return redirect()->route('home')->with('success','Login Success');
            }else{
                return redirect()->back()->with('error','Invalid User Information');
            }
        }

    }

    public function register()
    {
        if(session()->has('name') || session()->has('email')){
            return redirect()->route('home');
        }else{
            return view('front.authCustomer.register');
        }

    }
    // Registration
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $register           = new Customer;
        $register->name     = $request->input('name');
        $register->email    = $request->input('email');
        $register->password = Hash::make($request->input('password'));
        $result = $register->save();

        if($result == true){
            $user = Customer::where('email',$request->input('email'))->where('password',Hash::check($request->input('password'), $request->input('password')))->first();
            session()->put('name',$request->input('name'));
            session()->put('email',$request->input('email'));
            session()->put('customer_id',$user->id);
            return redirect()->route('home')->with('success','Registration success, You can now buy any product');
        }else{
            return redirect()->back()->with('error','Eror, plese try again !');
        }
    }

    // User Log Out
    public function LogOut(Request $request)
    {
        $request->session()->forget('name');
        $request->session()->forget('email');
        return redirect()->back();
    }
}
