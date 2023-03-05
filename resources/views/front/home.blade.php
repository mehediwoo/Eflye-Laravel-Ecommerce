@extends('front.layout.app')
@section('title','Eflyer')
@section('content')

<!-- electronic section start -->
@if (!empty($category) && $category->count() > 0)
@foreach ($category as $iteam)
<div class="fashion_section">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">{{ $iteam->title }} ({{ $iteam->product->count() }})</h1>
                <div class="fashion_section_2">
                   <div class="row">
                    @forelse ($iteam->product->take(8) as $product)
                    <div class="col-lg-3 col-sm-2">
                        <div class="box_main">
                           <h4 class="shirt_text">{{ $product->title }}</h4>
                           <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                           <div class="electronic_img"><img src="{{ asset('storage/'.$product->thumbnail) }}"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="{{ route('product.details',[$product->id,$product->slug]) }}">See More</a></div>
                           </div>
                        </div>
                     </div>
                    @empty

                    @endforelse
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endforeach
@endif

@endsection
