@php
    $category = App\Models\Category::where('status','1')->latest()->get();
@endphp
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('front/images/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('front/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
      <link rel="stylesoeet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      @include('front.layout.navigation')
      <!-- banner bg main end -->

      <!-- Content  section start -->
      @yield('content')
      <!-- Content  section end -->

      <!-- footer section start -->
      @include('front.layout.footer')
      <!-- footer section end -->

      <!-- Javascript files-->
      <script src="{{ asset('front/js/jquery.min.js') }}"></script>
      <script src="{{ asset('front/js/popper.min.js') }}"></script>
      <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('front/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('front/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('front/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('front/js/custom.js') }}"></script>
      @yield('script')
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>
