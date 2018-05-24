@extends('template')
@section('content')
<div class="content">
    <div class="tabs-x tabs-above">
        <div id="myTabContent-kv-1" class="tab-content">
            <table class="table table-striped">
                <button> 
                    <a href="/movements/{{$account->id}}/create">Create Movment</a> 
                </button>
                @if(!$movements == null)
                    <thead>
                        <tr>
                            <th>
                                Category                        
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Value
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                End_balance
                            </th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @if(!$movements == null)
                        @foreach ($movements as $movement)
                            <tr>
                                <th>{{$movement->movement_categorie->name}}</th>
                                <th>{{$movement->date}}</th>
                                <th>{{$movement->value}}</th>
                                <th>{{$movement->type}}</th>
                                <th>{{$movement->end_balance}}</th>
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
