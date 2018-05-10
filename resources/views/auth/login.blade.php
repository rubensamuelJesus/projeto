@extends('layouts.app')
@section('content')
<form method="POST" action= "{{route('login')}}" class="login100-form validate-form">
  {{csrf_field()}}
  <span class="login100-form-logo">
    <i class="zmdi zmdi-landscape"></i>
  </span>

  <span class="login100-form-title p-b-34 p-t-27">Log in</span>
    <div class="wrap-input100 validate-input" data-validate = "Enter email">
      <input class="input100" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
      <span class="focus-input100" data-placeholder="&#xf15a;"></span>
    </div>

  <div class="wrap-input100 validate-input" data-validate="Enter password">
    <input class="input100" type="password" name="password" placeholder="Password">
    <span class="focus-input100" data-placeholder="&#xf191;"></span>
  </div>

  @if($errors->all())
    @foreach($errors->all() as $error)
      <span class="input100">{{$error}}</span>
    @endforeach
  @endif

  <div class="container-login100-form-btn">
    <a class="login100-form-btn" href="/">Back</a>
    <button class="login100-form-btn">Login</button>
  </div>

  <div class="text-center p-t-90">
    <span class="txt2">Not a member?</span>
    <a class="txt1" href="/register">Sign up now</a>
  </div>

  <div class="text-center p-t-5">
    <a class="txt2" href="password/reset">Forget Password?</a>
  </div>
</form>
@endsection