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
                       {{Form::open(['route' => 'account', 'method' => 'POST'])}}
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
                                        <label>Data</label>
                                        <input type="date" class="form-control border-input" placeholder="Data" name="data">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Account Code</label>
                                        <input type="text" class="form-control border-input" placeholder="Account Code" name="account_code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="comment">Description</label>
                                      <textarea name="description" class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Balance</label>
                                        <input type="numberarea" class="form-control border-input" placeholder="Start Balance" name="start_balance">
                                    </div>
                                </div>
                            </div>
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