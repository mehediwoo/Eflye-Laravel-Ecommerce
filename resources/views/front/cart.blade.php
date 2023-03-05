@extends('front.layout.app2')
@section('title','Eflyer | Cart')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
            <div class="msg">
                <p class="text-center alert alert-success">{{ session()->get('success') }}</p>
            </div>
            @elseif (session()->has('error'))
            <div class="msg">
                <p class="text-center alert alert-danger">{{ session()->get('error') }}</p>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <h3 class="mt-3 ml-3">Your shopping cart items</h3>
        <div class="col-12">
            <div class="box_main mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>QTY</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $key => $items)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$items->product->thumbnail) }}" alt="" style="height:40px;width:30px">
                                </td>
                                <td>{{ $items->product->title }}</td>
                                @if ($items->size !='')
                                    <td>{{ $items->size }}</td>
                                @else
                                <td class="text-warning">Not Available</td>
                                @endif

                                @if ($items->color !='')
                                    <td>{{ $items->color }}</td>
                                @else
                                <td class="text-warning">Not Available</td>
                                @endif
                                <td>{{ $items->quantity }}</td>
                                <td style="font-weight:700">{{ $items->price }}</td>
                                <td class="fw-bold">
                                    <a class="btn btn-sm btn-danger" href="{{ route('remove.cart',$items->id) }}">X</a>
                                </td>
                            </tr>
                            @php
                                $total = $total + $items->price;
                            @endphp
                        @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Sub Total</td>
                                <td style="font-weight:700">${{ $total }}</td>
                                <td>
                                    <a href="{{ route('customer.shipping') }}" class="btn btn-sm btn-info">Process to checkout</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        setTimeout(() => {
            $(".msg").slideUp('slow');
        }, 2500);
    });
</script>
@endsection
