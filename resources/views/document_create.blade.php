@extends('template')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                        <div class="content">
                            @if(Session::has('message'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message') }}
                    </div>  
                    @endif
                       {{Form::open(['route' => ['documents.{movement}',$movement->id], 'method' => 'POST','_method', '_token', 'files' => true]) }} 
                                    <div class="row">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="comment">Description</label>
                                      <textarea name="document_description" class="form-control"  value="{{ old('document_description') }}"  rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input class="input100" id="tessssss" type="file" value="{{ old('document_file') }}" name="document_file" placeholder="Photo">
                                    <span class="focus-input100" data-placeholder="&#xf223;"></span>
                                </div>
                            </div>
                            @if($errors->all())
                                @foreach($errors->all() as $error)
                                    <div class="text-center">
                                        <span class="invalid-feedback">
                                        <strong>{{$error}}<br></strong>
                                    </span>
                                    </div>
                                @endforeach
                            @endif
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update account</button>
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