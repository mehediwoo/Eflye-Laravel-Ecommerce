@extends('front.profile.layoutProfile')
@section('profileContent')
<h3>Dashboard</h3>

<div class="row">
    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-warning">Pending Order</p>
            @if (!empty($pending_order))
            <h1 class="text-center text-warning">{{ $pending_order }}</h1>
            @else
            <h1 class="text-center text-warning">0</h1>
            @endif

        </div>
    </div>

    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-success">Confirm Order</p>
            @if (!empty($confirm_order))
            <h1 class="text-center text-warning">{{ $confirm_order }}</h1>
            @else
            <h1 class="text-center text-warning">0</h1>
            @endif
        </div>
    </div>


    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-danger">Pending Amount</p>
            @if (!empty($pending_ammo))
            <h1 class="text-center text-danger">$ {{ $pending_ammo->sum() }}</h1>
            @else
            <h1 class="text-center text-danger">0</h1>
            @endif
        </div>
    </div>

    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-info">Confirm Amount</p>
            @if (!empty($confirm_ammo))
            <h1 class="text-center text-info">$ {{ $confirm_ammo->sum() }}</h1>
            @else
            <h1 class="text-center text-info">0</h1>
            @endif
        </div>
    </div>
</div>

@endsection
