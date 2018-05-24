@extends('template')
@section('content')
<div class="content">
    <div class="tabs-x tabs-above">
        <div id="myTabContent-kv-1" class="tab-content">
            <table class="table table-striped">
                @if(!$accounts_user_open == null)
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
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @if(!$accounts_user_open == null)
                        @foreach ($accounts_user_open as $account_user_open)
                            <tr>
                                <th>{{$account_user_open->id}}</th>
                                <th>{{$account_user_open->code}}</th>
                                <th>{{$account_user_open->account_type->name}}</th>
                                <th>{{$account_user_open->date}}</th>
                                <th>{{$account_user_open->description}}</th>
                                <th>{{$account_user_open->current_balance}}</th>
                                <th>{{$account_user_open->last_movement_date}}</th>
                                
                                <th>{{$account_user_open->created_at}}</th>

                                <th><form method="POST" action="/account/{{$account_user_open->id}}/close">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                {{ Form::submit("Close") }}</th>
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