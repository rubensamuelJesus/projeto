@extends('layouts.app')
@section('content')
<form method="POST" action= "{{route('register')}}" class="login100-form validate-form" enctype="multipart/form-data">
  {{csrf_field()}}
  <span class="login100-form-logo">
    <i class="zmdi zmdi-landscape"></i>
  </span>

  <span class="login100-form-title p-b-34 p-t-27">Sign Up</span>

  <div class="wrap-input100 validate-input" data-validate = "Enter name">
    <input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
    <span class="focus-input100" data-placeholder="&#xf207;"></span>
  </div>

  <div class="wrap-input100 validate-input">
    <input class="input100" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    <span class="focus-input100" data-placeholder="&#xf15a;"></span>
  </div>
  

  <div class="wrap-input100 validate-input">
    <input class="input100" type="password" name="password" placeholder="Password">
    <span class="focus-input100" data-placeholder="&#xf191;"></span>
  </div>

  <div class="wrap-input100 validate-input">
    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm password">
    <span class="focus-input100" data-placeholder="&#xf191;"></span>
  </div>

  
  <div class="wrap-input100 validate-input">
    <input class="input100" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone number">
    <span class="focus-input100" data-placeholder="&#xf2b6;"></span>
  </div>

  <div class="wrap-input100 validate-input">
    <input class="input100" id="tessssss" type="file" value="{{ old('profile_photo') }}" name="profile_photo" placeholder="Photo">
    <span class="focus-input100" data-placeholder="&#xf223;"></span>
  </div>
  @if($errors->all())
    @foreach($errors->all() as $error)
      <span class="input100">{{$error}}</span>
    @endforeach
  @endif
  
  <div class="container-login100-form-btn">
    <a class="login100-form-btn" href="/">Back</a>
    <button class="login100-form-btn">Regist</button>
  </div>

</form>
@endsection
