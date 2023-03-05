@extends('front.layout.app2')
@section('title','Eflyer | Login')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="box_main mt-5">
                <h3 class="text-center" style="color:#F26522">User Login</h3>
                @if (session()->has('error'))
                <h5 id="invalid" class="text-center" style="color:#F26522">{{ session()->get('error') }}</h5>
                @endif

                <form action="{{ route('customer.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label style="color:#F26522" for="">E-Mail</label>
                        <input type="email" name="email" placeholder="E-Mail.." class="form-control">
                        @error('email')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="color:#F26522" for="">Password</label>
                        <input type="password" name="password" placeholder="Password.." class="form-control">
                        @error('password')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <button class="btn btn-warning">Log In</button>
                </form>
                <p class="text-center">You don't have an account <a href="{{ route('customer.register') }}" style="color:#F26522">click here</a></p>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        setTimeout(() => {
            $('#invalid').slideUp('slow');
        }, 5000);
    });
</script>
@endsection
