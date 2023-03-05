@extends('front.profile.layoutProfile')
@section('profileContent')
<h3>Pending Order</h3>
<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Size</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($pending_order) && $pending_order->count() > 0)
        @foreach ($pending_order as $iteam)
        <tr>
            <td>
                <img src="{{ asset('storage/'.$iteam->image) }}" alt="" style="height:60px;width:50px">
            </td>
            <td>{{ $iteam->product_name }}</td>
            @if (!empty($iteam->size))
            <td>{{ $iteam->size }}</td>
            @else
            <td class="text-danger">Null</td>
            @endif

            @if (!empty($iteam->color))
            <td>{{ $iteam->color }}</td>
            @else
            <td class="text-danger">Null</td>
            @endif
            <td>{{ $iteam->qty }}</td>
            <td>{{ $iteam->price }}</td>
            <td class="text-danger">{{ $iteam->status }}</td>
        </tr>

        @endforeach
        @else
        <tr>
            <td>Your pending order is empty!</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
