<div class="banner_bg_main">
    <!-- header top section start -->
    <div class="container">
       <div class="header_section_top">
          <div class="row">
             <div class="col-sm-12">
                <div class="custom_menu">
                   <ul>
                      <li><a href="#">Gift Ideas</a></li>
                      <li><a href="#">New Releases</a></li>
                      <li><a href="#">Today's Deals</a></li>
                      @if (session()->has('email') || session()->has('name'))
                      <li><a href="{{ route('user.logout') }}">Log Out</a></li>
                      @endif
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- header top section start -->
    <!-- logo section start -->
    <div class="logo_section">
       <div class="container">
          <div class="row">
             <div class="col-sm-12">
                <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('front/images/logo.png') }}"></a></div>
             </div>
          </div>
       </div>
    </div>
    <!-- logo section end -->
    <!-- header section start -->
    <div class="header_section">
       <div class="container">
          <div class="containt_main">
             <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @if (!empty($category) && $category->count() > 0)
                    @foreach($category as $iteam)
                    <a href="{{ route('categoryWiseProduct',[$iteam->id,$iteam->slug]) }}">{{ $iteam->title }}</a>
                        @foreach ($iteam->sub_category as $subCategory)
                        <a href="{{ route('sub-categoryWiseProduct',[$subCategory->id,$subCategory->slug]) }}" class="ml-4">{{ $subCategory->title }}</a>
                        @endforeach
                    @endforeach
                @endif
             </div>
             <span class="toggle_icon" id="openNav" onclick="openNav()"><img src="{{ asset('front/images/toggle-icon.png') }}"></span>
             <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (!empty($category) && $category->count() > 0)
                        @foreach ($category as $iteam)
                        <a class="dropdown-item" href="{{ route('categoryWiseProduct',[$iteam->id,$iteam->slug]) }}">{{ $iteam->title }}</a>
                            @foreach ($iteam->sub_category as $subCategory)
                            <a class="dropdown-item" href="{{ route('sub-categoryWiseProduct',[$subCategory->id,$subCategory->slug]) }}"><span class="ml-4">{{ $subCategory->title }}</span></a>
                            @endforeach
                        @endforeach
                    @endif
                </div>
             </div>
             <div class="main">
                <!-- Another variation with a button -->
                <div class="input-group">
                   <input type="text" class="form-control" placeholder="Search this blog">
                   <div class="input-group-append">
                      <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                      <i class="fa fa-search"></i>
                      </button>
                   </div>
                </div>
             </div>
             <div class="header_box">
                <div class="login_menu">
                   <ul>
                    @php
                        $customerId = session()->get('customer_id');
                        $cart = App\Models\Cart::where('user_id','=',$customerId)->count();
                    @endphp
                    @if (session()->has('name') || session()->has('email'))
                    <li><a href="{{ route('cart.items') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="padding_10">Cart({{ $cart }})</span></a>
                    </li>
                    @else
                    <li><a href="{{ route('cart.items') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="padding_10">Cart</span></a>
                    </li>
                    @endif
                      @if(session()->has('email') || session()->has('name'))
                      <li><a href="{{ route('profile') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="padding_10">{{ session()->get('name') }}</span></a>
                     </li>
                     @else
                     <li><a href="{{ route('customer.auth') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="padding_10">Log In</span></a>
                     </li>
                     @endif
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- header section end -->

    <!-- banner section start -->
    @include('front.layout.banner')
    <!-- banner section end -->
 </div>
