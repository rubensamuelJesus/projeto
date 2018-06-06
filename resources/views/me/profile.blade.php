@extends('template')
@section('content')

<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="content">
                    <div class="author">
                      <img src="{{ route('account.image', ['filename' => $user->profile_photo]) }}" alt="" class="img-responsive">
                      <h4 class="title">{{$user->name}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Profile</h4>
                </div>
                <div class="content">
                   {{Form::open(['route' => 'me.profile', 'method' => 'PUT', 'files' => true])}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control border-input" placeholder="Name" name="name" value="{{$user->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control border-input" placeholder="Email" name="email"  value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" class="form-control border-input" placeholder="Username" name="phone" value="{{$user->phone}}">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" class="form-control border-input" placeholder="Photo" name="profile_photo" value="{{$user->profile_photo}}">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                        </div>
                        <div class="clearfix"></div>
                        {{Form::close()}}
                        @if($errors->all())
                            @foreach($errors->all() as $error)
                              <span class="input100">{{$error}}</span>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-4 col-md-5">
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Password</h4>
            </div>
            <div class="content">
                {{Form::open(['route' => 'me.password', 'method' => 'PATCH', 'files' => true])}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control border-input" name="oldpassword">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control border-input" name="newpassword">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" class="form-control border-input" name="confirmpassword">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Change Password</button>
                </div>
                <div class="clearfix"></div>
                {{Form::close()}}
                @if($errors->all())
                    @foreach($errors->all() as $error)
                        <span class="input100">{{$error}}</span>
                    @endforeach
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection