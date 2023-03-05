@extends('front.layout.app2')
@section('title','Eflyer | Regostration')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="box_main mt-5">
                <h3 class="text-center" style="color:#F26522">User Registration</h3>

                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label style="color:#F26522" for="">Name</label>
                        <input type="name" name="name" placeholder="Name..." class="form-control">
                        @error('name')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

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

                    <div class="form-group">
                        <label style="color:#F26522" for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Password.." class="form-control">
                    </div>

                    <button class="btn btn-warning">Log In</button>
                </form>
                <p class="text-center">Allready you have an account <a href="{{ route('customer.auth') }}" style="color:#F26522">click here</a></p>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection
