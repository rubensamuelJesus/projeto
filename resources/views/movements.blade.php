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
                                 <th>
                                    {{ Form::open(array('route' => ['movement.{movement}', $movement->id], 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Remove', array('class' => 'btn btn-warning')) }}
                                    {{ Form::close() }}

                                    <button class="btn btn-small btn-info pull-right" > 
                                    <a href="{{route('movement.{movement}',$movement->id)}}" >Edit</a>
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
