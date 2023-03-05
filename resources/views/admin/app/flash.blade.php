@if (session()->has('success'))
    <p id="fl-msg" class="alert alert-success">{{ session()->get('success') }}</p>
@elseif (session()->has('error'))
    <p id="fl-msg" class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
