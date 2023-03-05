@extends('front.layout.app2')
@section('title','Eflyer | '.$slug)
@section('content')
<!-- electronic section start -->
<div class="fashion_section">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">{{ ucfirst($slug) }} ({{ $product->count() }})</h1>
                <div class="fashion_section_2">
                   <div class="row">
                        @if (!empty($product) && $product->count() > 0)
                        @foreach ($product as $iteam)
                            <div class="col-lg-3 col-sm-2">
                                <div class="box_main">
                                <h4 class="shirt_text">{{ $iteam->title }}</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ {{ $iteam->price }}</span></p>
                                <div class="electronic_img"><img src="{{ asset('storage/'.$iteam->thumbnail) }}"></div>
                                <div class="btn_main">
                                    <div class="seemore_bt"><a href="{{ route('product.details',[$iteam->id,$iteam->slug]) }}">See More</a></div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-12">
                            <p class="text-center text-danger">No product found in this sub-category!</p>
                        </div>
                        @endif
                   </div>
                   <div class="row">
                        <div class="col-12">
                            <div class="paginator text-center" style="text-align: center">
                                {{ $product->links() }}
                            </div>

                        </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>



@endsection
