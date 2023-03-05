<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminAuth;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.auth.login');
    }

    public function AdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $pass  = $request->input('password');

        $admin = AdminAuth::where('email',$email)->where('status',1)->first();
        if($admin== true && Hash::check($pass,$admin->password)){
            session()->put('admin_name',$admin->name);
            session()->put('admin_email',$admin->email);
            return redirect()->route('dashboard')->with('success','Welcome you are loged in!');
        }else{
            return redirect()->back()->with('error','Incorect information');
        }
    }

    public function AdminLogOut()
    {
        session()->forget('admin_name');
        session()->forget('admin_email');
        return redirect()->route('login.page')->with('error','You are log out');
    }
}
