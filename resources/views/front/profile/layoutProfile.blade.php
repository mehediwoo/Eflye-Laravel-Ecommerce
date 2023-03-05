@extends('front.layout.app2')
@section('title','Welcome '.session()->get('name'))
@section('content')

<div class="container">
    <div class="row ">
        <div class="col-4 mt-5">
            <div class="box_main">
                <ul>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('profile.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('PendingOrder') }}">Pending Order</a></li>
                    <li><a href="{{ route('OrderHistory') }}">Order History</a></li>
                    <li><a href="{{ route('user.logout') }}">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="col-8 mt-5">
            <div class="box_main">
                @yield('profileContent')
            </div>
        </div>
    </div>
</div>
@endsection
