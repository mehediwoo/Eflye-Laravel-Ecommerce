@extends('admin.app.app')
@section('title','Dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-2">
            <h2>Dashboard</h2>
            @include('admin.app.flash')
        </div>
    </div>
    <div class="row">
        @if (!empty($confirm))
        <div class="col-4 mt-3">
            <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('admin/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded">
                    </div>
                  </div>
                  <span>Total Sales</span>
                  <h3 class="card-title text-nowrap mb-1 text-success">$ {{ $confirm->sum() }}</h3>
                </div>
              </div>
        </div>
        @endif
        @if (!empty($pending))
        <div class="col-4 mt-3">
            <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('admin/img/icons/unicons/chart-success.png') }}" alt="Credit Card" class="rounded">
                    </div>
                  </div>
                  <span>Total Pending Amount</span>
                  <h3 class="card-title text-nowrap mb-1 text-danger">$ {{ $pending->sum() }}</h3>
                </div>
              </div>
        </div>
        @endif

        @if (!empty($confirm_order))
        <div class="col-4 mt-3">
            <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('admin/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded">
                    </div>
                  </div>
                  <span>Total Confirm Order</span>
                  <h3 class="card-title text-nowrap mb-1 text-success">$ {{ $confirm_order }}</h3>
                </div>
              </div>
        </div>
        @endif

        @if (!empty($pending_order))
        <div class="col-4 mt-3">
            <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('admin/img/icons/unicons/chart-success.png') }}" alt="Credit Card" class="rounded">
                    </div>
                  </div>
                  <span>Total Pending Order</span>
                  <h3 class="card-title text-nowrap mb-1 text-danger">$ {{ $pending_order }}</h3>
                </div>
              </div>
        </div>
        @endif
    </div>
</div>

@endsection
