@extends('template')
@section('content')
<div class="content">
    <div class="tabs-x tabs-above">
        <div id="myTabContent-kv-1" class="tab-content">
            <table class="table table-striped">
                @if(!$accounts == null)
                    <thead>
                        <tr>
                            <th>
                                Code                        
                            </th>
                            <th>
                                Account Type
                            </th>
                            <th>
                                Current Balance
                            </th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @if(!$accounts == null)
                        @foreach ($accounts as $account)
                            <tr>
                                <th>{{$account->id}}</th>
                                <th>{{$account->code}}</th>
                                <th>{{$account->account_type->name}}</th>
                                <th>{{$account->current_balance}}</th>
                                <th>

                                    <button> 
                                    <a href="{{route('movements.{account}',$account->id)}}">View Movment</a> 
                                    </button> 

                                    <button> 
                                    <a href="{{route('account.{account}',$account->id), method('get')}}">Edit</a>
                                    </button> 

                                    <button> 
                                    <a href="{{route('account/{account}/delete',$account->id), method('get')}}">Remove</a>
                                    </button> 


                                </th>
                                
                            </tr>
                        @endforeach
                    @else
                       <p>Nenhum Registo</p>
                    @endif
                </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection
