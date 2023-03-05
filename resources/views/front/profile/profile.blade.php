@extends('front.profile.layoutProfile')
@section('profileContent')
<h3>Profile</h3>
<ul>
    @if (!empty($addr))
    <li>Name: {{ session()->get('name') }}</li>
    <li>E-Mail: {{ session()->get('email') }}</li>
    <li>Phone : {{ $addr->phone }}</li>
    <li>State : {{ $addr->state }}</li>
    <li>City / Town : {{ $addr->city_twon }}</li>
    <li>Billing Address : {{ $addr->Address }}</li>
    @else
    <li class="text-danger">Your Profile data is empty!</li>
    @endif

</ul>
@endsection
