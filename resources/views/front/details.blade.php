@extends('front.layout.app2')
@section('title','Efley | '.$slug)
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            @if (session()->has('success'))
            <div class="">
                <p class="text-center alert alert-success">{{ session()->get('success') }}</p>
            </div>
            @elseif (session()->has('error'))
            <div class="">
                <p class="text-center alert alert-danger">{{ session()->get('error') }}</p>
            </div>
            @endif
        </div>
        <div class="col-4">
            <div class="box_main mt-5">
                <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="">
            </div>
        </div>
        <div class="col-6">
            <div class="box_main mt-5">
                <h4 class="shirt_text text-left">{{ $product->title }}</h4>
                <p  class="price_text text-left">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                <h4 class="lead">Category: {{ $product->category->title }}</h4>
                <h4 class="lead">Sub Category: {{ $product->sub_category->title }}</h4>
                <h4 class="lead">Quantity: {{ $product->qty }}</h4>

                <hr>
                <div class="mt-2 mb-2">
                    <form action="{{ route('cart') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Quantity</label><br>
                            <input type="number" name="qty" min="1" value="1" class="form-control">
                            @error('qty')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="stock" value="{{ $product->qty }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">

                            @if ($product->size !='')
                            <div class="form-group">
                                <label for="">Size</label>
                                <select name="size" class="form-select form-select-lg form-control mb-3" aria-label=".form-select-lg example">
                                    <option selected>Select Product Size</option>
                                    @foreach (explode(',',$product->size) as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            @endif

                            @if ($product->color != '')
                            <div class="form-group">
                                <label for="">Color</label>
                                <select name="color" class="form-select form-select-lg form-control mb-3" aria-label=".form-select-lg example">
                                    <option selected>Select Product Color</option>
                                    @foreach (explode(',',$product->color) as $color)
                                    <option value="{{ $color }}">{{ $color }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add To cart" class="btn btn-warning">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box_main mt-5">
                <h3>Product Description</h3>
                <p>{{ $product->desc }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
