@extends('front.layout.app2')
@section('title','Eflyer | Place Order')
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
        <div class="col-6">
            <h3 class="mt-4">Place Order</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mt-5">
            <div class="box_main">
                Your Product will send at-
                <p>Name : {{ session()->get('name') }}</p>
                <p>Phone: {{ substr($shipping->phone,0,5).'-'.substr($shipping->phone,5)  }}</p>
                <p>State: {{ $shipping->state }}</p>
                <p>City / Town : {{ $shipping->city_town }}</p>
                <p>Address : {{ $shipping->Address }}</p>
            </div>
        </div>
        <div class="col-md-8 mt-5">
            <div class="box_main">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total =0;
                        @endphp
                        @foreach ($cart as $iteam)
                            <tr>
                                <td>{{ $iteam->product->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$iteam->product->thumbnail) }}" alt="" style="height:70px; width:60px">
                                </td>
                                @if ($iteam->size != '')
                                <td>{{ $iteam->size }}</td>
                                @else
                                <td class="text-warning">Not Available</td>
                                @endif

                                @if ($iteam->color != '')
                                <td>{{ $iteam->color }}</td>
                                @else
                                <td class="text-warning">Not Available</td>
                                @endif
                                <td>{{ $iteam->quantity }}</td>
                                <td>{{ $iteam->price }}</td>
                                <td class="fw-bold">
                                    <a class="btn btn-sm btn-danger" href="{{ route('remove.cart',$iteam->id) }}">X</a>
                                </td>
                            </tr>
                            @php
                                $total = $total + $iteam->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight:700">Sub Total</td>
                            <td style="font-weight:700">$ {{ $total }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <form action="" method="post">
            @csrf
            <input type="submit" value="Cancel Order" class="btn btn-danger mr-3">
        </form>
        <form action="{{ route('customer.order') }}" method="post">
            @csrf
            <input type="submit" value="Confirm Order" class="btn btn-primary mb-2">
        </form>
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
