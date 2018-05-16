@extends('template')
@section('content')



<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>">
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
                               {{Form::model($user, array('route' => array('me/profiles', $user), 'method' => 'post'))}}
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
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection