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
                                <th>{{$account->code}}</th>
                                <th>{{$account->account_type->name}}</th>
                                <th>{{$account->current_balance}}</th>
                                <th>

                                    <button> 
                                    <a href="/movements/{{$account->id}}">View Movment</a> 
                                    </button> 
                                    <button> 
                                    <a href="/account/{{$account->id}}">Edit</a>
                                    </button> 

                                    <form name="delete" method="POST" action="/account/{{$account->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    {{ Form::submit("Delete") }}

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
