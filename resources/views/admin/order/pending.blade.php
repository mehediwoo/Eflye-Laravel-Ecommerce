@extends('admin.app.app')
@section('title','Pending Order')
@section('content')

<div class="container mt-3">
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Dashboard /</span>Pending Order</h4>
    @include('admin.app.flash')
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Shipping Address</th>
                <th>Product</th>
                <th>Image</th>
                <th>Size</th>
                <th>Color</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @if (!empty($order) && $order->count() > 0)
                @foreach ($order as $key => $iteam)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <ul>
                            <li>Name : {{ $iteam->user->name }}</li>
                            <li>Phone : {{ $iteam->Phone }}</li>
                            <li>State : {{ $iteam->state }}</li>
                            <li>City : {{ $iteam->city }}</li>
                            <li>Address : {{ $iteam->address }}</li>
                        </ul>

                    </td>
                    <td>{{ $iteam->product_name }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$iteam->image) }}" alt="" style="height:100px;width:80px">
                    </td>
                    @if ($iteam->size != '')
                    <td>{{ $iteam->size }}</td>
                    @else
                    <td class="text-danger">Null</td>
                    @endif

                    @if ($iteam->color != '')
                    <td>{{ $iteam->color }}</td>
                    @else
                    <td class="text-danger">Null</td>
                    @endif

                    <td>{{ $iteam->qty }}</td>
                    <td>{{ $iteam->price }}</td>
                    <td class="text-danger">{{ $iteam->status }}</td>
                    <td>
                        <a href="{{ route('order.status',$iteam->id) }}" class="btn btn-warning">Confrim</a>
                    </td>
                </tr>

                @endforeach
                @endif
            </tbody>
          </table>
          {{ $order->links() }}
        </div>
      </div>
</div>
@endsection
