@extends('layouts.app2')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <span class="login100-form-title p-b-34 p-t-27">Reset Password</span>
                        <div class="wrap-input100 validate-input" data-validate = "Enter email">
                            <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required  placeholder="Email">
                            <span class="focus-input100" data-placeholder="&#xf15a;"></span>
                        </div> 
                        <div class="col-md-6">
                            @if ($errors->has('email'))
                                <span class="input100">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        @if (session('status'))
                         <div class="input100">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Password Reset') }}
                                </button>
                                <a class="login100-form-btn" href="/login">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
