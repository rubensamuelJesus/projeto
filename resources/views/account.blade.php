@extends('template')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Account</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'account', 'method' => 'post','_method', '_token']) }} 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="account_type">
                                            <option >Bank account</option>
                                            <option >Pocket money</option>
                                            <option >PayPal account</option>
                                            <option >Credit card</option>
                                            <option >Meal card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control border-input" placeholder="Date" name="date"  value="{{ old('date') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Account Code</label>
                                        <input type="text" class="form-control border-input" placeholder="Account Code" name="code" value="{{ old('code') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="comment">Description</label>
                                      <textarea value="description" name="description" class="form-control" rows="5" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Balance</label>
                                        <input type="numberarea" class="form-control border-input" placeholder="Start Balance" name="start_balance" value="{{ old('start_balance') }}">
                                    </div>
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
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Create account</button>
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