@extends('template')
@section('content')
<div class="content">
    <div class="tabs-x tabs-above">
        <div id="myTabContent-kv-1" class="tab-content">
            <table class="table table-striped">
                @if(!$accounts_user_closed == null)
                    <thead>
                        <tr>
                            <th>
                                Id                        
                            </th>
                            <th>
                                Code
                            </th>
                            <th>
                                account_type
                            </th>
                            <th>
                                date
                            </th>
                            <th>
                                description
                            </th>
                            <th>
                                current_balance
                            </th>
                            <th>
                                last_movement_date
                            </th>
                            <th>
                                created_at
                            </th>
                            <th>
                                deleted_at
                            </th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @if(!$accounts_user_closed == null)
                        @foreach ($accounts_user_closed as $account_user_closed)
                            <tr>
                                <th>{{$account_user_closed->id}}</th>
                                <th>{{$account_user_closed->code}}</th>
                                <th>{{$account_user_closed->account_type->name}}</th>
                                <th>{{$account_user_closed->date}}</th>
                                <th>{{$account_user_closed->description}}</th>
                                <th>{{$account_user_closed->current_balance}}</th>
                                <th>{{$account_user_closed->last_movement_date}}</th>
                                
                                <th>{{$account_user_closed->created_at}}</th>
                                <th>{{$account_user_closed->deleted_at}}</th>
                                <th><form method="POST" action="/account/{{$account_user_closed->id}}/reopen">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                {{ Form::submit("Open") }}</th>
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