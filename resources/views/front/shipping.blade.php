@extends('front.layout.app2')
@section('title','Eflyer | Shipping Address')
@section('content')

<div class="container">
    <div class="row">
        <h3 class="mt-3 ml-3">Your Shipping Information</h3>
        <div class="col-12">
            <div class="box_main mt-3">
                <form action="{{ route('customer.shipping.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" placeholder="Phone Number...." class="form-control">
                        @error('phone')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">State</label>
                        <input type="text" name="state" placeholder="State Addresss...." class="form-control">
                        @error('state')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">City/Town</label>
                        <input type="text" name="cityTown" placeholder="City / Town Addresss...." class="form-control">
                        @error('cityTown')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" cols="30" rows="5" class="form-control" placeholder="Address"></textarea>
                        @error('address')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
