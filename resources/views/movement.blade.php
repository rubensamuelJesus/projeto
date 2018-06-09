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
                        {{ Form::open(['method' => 'post','_method', '_token','route' => ['movements.{account}.create',$account->id]]) }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="type">
                                            <option >Revenue</option>
                                            <option >Expense</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control border-input" placeholder="Date" name="date" value="{{ old('date') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="category">
                                            <option >Food</option>
                                            <option >Clothes</option>
                                            <option >Services</option>
                                            <option >Electricity</option>
                                            <option >Phone</option>
                                            <option >Fuel</option>
                                            <option >Mortgage payment</option>
                                            <option >Salary</option>
                                            <option >Bonus</option>
                                            <option >Royalties</option>
                                            <option >Interests</option>
                                            <option >gifts</option>
                                            <option >Dividends</option>
                                            <option >Product sales</option>
                                        </select>
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
                                        <label>Value</label>
                                        <input type="numberarea" class="form-control border-input" placeholder="Start Balance" name="value" value="{{ old('value') }}">
                                    </div>
                                </div>
                            </div>
                            @if($errors->all())
                                @foreach($errors as $error)
                                    <div class="text-center">
                                        <span class="invalid-feedback">
                                        <strong>{{$error}}<br></strong>
                                    </span>
                                    </div>
                                @endforeach
                            @endif
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Create movement</button>
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