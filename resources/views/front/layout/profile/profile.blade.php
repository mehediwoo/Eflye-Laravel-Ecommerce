@extends('front.layout.app')
@section('title','Pirate Shop | '.session()->get('name'))
@section('content')
<div class="container ">
    <div class="row">
        <div class="col-lg-4 col-sm-4 mt-5">
            <div class="box_main">
                <ul>
                    <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('customer.pending.order') }}">Pending Order</a></li>
                    <li><a href="{{ route('customer.order.history') }}">Order History</a></li>
                    <li><a href="{{ route('sing.out') }}">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8 col-sm-8 mt-5">
            <div class="box_main">
                @yield('profile')
            </div>
        </div>
    </div>
</div>
@endsection
