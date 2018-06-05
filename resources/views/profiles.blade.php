@extends('template')
@section('content')
<div class="tabs-x tabs-above">
    <ul id="myTab-kv-1" class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#administrador" role="tab" data-toggle="tab"><i
                class="glyphicon glyphicon-home"></i>Administrators</a></li>
        <li>
            <a href="#blocked_users" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            Blocked users</a>
        </li>
        <li>
            <a href="#associate_members" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            Associate Members</a>
        </li>
        <li>
            <a href="#associate_members_I_belong_to" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            Associate members I belong to</a>
        </li>
        <li>
            <a href="#all" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            All</a>
        </li>
        <li>
            <nav class="navbar navbar-light bg-light right">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </nav>
        </li>
    </ul>
    <div id="myTabContent-kv-1" class="tab-content">
        <div class="tab-pane fade in active" id="administrador">
            <table class="table table-striped">
                @if(!$users_all == null)
                    @include('thead')
                @endif    
                <tbody>
                    @if(!$users_all == null)
                        @foreach ($users_all as $user)
                            @isAdmin($user)
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                <th>{{$user->name}}</th>
                                @admin
                                <th>{{$user->email}}</th>
                                @endadmin
                                @isBlocked($user)
                                    <th>{{'Blocked'}}
                                    @admin
                                        <th>
                                            <form method="POST" action="/users/{{$user->id}}/unblock">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button class="btn btn-small btn-success" type="submit">Unblock</button>
                                            </form>
                                        </th>
                                    @endadmin
                                    </th>
                                @else
                                <th>
                                    {{'Available'}}
                                    @admin
                                        <th>
                                            <form method="POST" action="/users/{{$user->id}}/block">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button class="pull-left btn btn-small btn-info" type="submit">Block</button>
                                            </form>
                                        </th>
                                    @endadmin
                                    </th>
                                @endisBlocked

                            @admin
                                        <th>
                                            {{'Admin'}}
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/demote">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="pull-left btn btn-small btn-info " type="submit">Demote</button>
                                                </form>
                                            </th>
                                    @endadmin
                            </tr>
                            @endisAdmin
                        @endforeach
                    @else
                       <p>0 records</p>
                    @endif
                </tbody>
            </table>
        @if(Session::has('message'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('message') }}
                </div>  
        @endif
        </div>
        <div class="tab-pane fade" id="blocked_users">
            <table class="table table-striped">
                @if(!$users_all == null)
                    @include('thead')
                @endif
                <tbody>
                    @if(!$users_all == null)    
                        @foreach ($users_all as $user)
                            @isBlocked($user)
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                <th>{{$user->name}}</th>
                                @admin
                                <th>{{$user->email}}</th>
                                @endadmin
                                <th>Blocked</th>
                                    @admin<th>
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/unblock">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-small btn-success" type="submit">Unblock</button>
                                                </form>
                                            </th>
                                        </th>
                                    @endadmin

                                        <th>@isAdmin($user)
                                            {{'Admin'}}
                                                @admin
                                                    <th>
                                                        <form method="POST" action="/users/{{$user->id}}/demote">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PATCH') }}
                                                            <button class="pull-left btn btn-small btn-info " type="submit">Demote</button>
                                                        </form>
                                                    </th>
                                                @endadmin
                                            @else
                                                {{'Normal'}}
                                                @admin
                                                    <th>
                                                        <form method="POST" action="/users/{{$user->id}}/promote">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PATCH') }}
                                                            <button class="pull-left btn btn-small btn-success" type="submit">Promote</button>
                                                        </form>
                                                    </th>
                                                @endadmin
                                            @endisAdmin
                                        </th>
                            </tr>
                            @endisBlocked
                        @endforeach
                    @else
                       <p>0 records</p>
                    @endif
                </tbody>
            </table>     
        </div>
        <div class="tab-pane fade" id="associate_members">
            <table class="table table-striped">
                @if(!$associated_members == null)
                    @include('thead')
                @endif
                <tbody>
                    @if(!$associated_members == null)
                        @foreach ($associated_members as $associated_member)
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                <th>{{$associated_member->name}}</th>
                                @admin
                                <th>{{$user->email}}</th>
                                @endadmin
                                <th>Associate</th>
                                @isBlocked($user)
                                    <th>{{'Blocked'}}
                                        @admin<th>     
                                                <th>
                                                    <form method="POST" action="/users/{{$user->id}}/unblock">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        <button class="btn btn-small btn-success" type="submit">Unblock</button>
                                                    </form>
                                                </th>
                                        @endadmin
                                    </th>
                                @else
                                    <th>{{'available'}}
                                        @admin
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="pull-left btn btn-small btn-info" type="submit">Block</button>
                                                </form>
                                            </th>  
                                        @endadmin                                          
                                    </th>
                                @endisBlocked

                                @isAdmin($user)
                                    <th>{{'Admin'}}
                                        @admin<th>     
                                                <th>
                                                    <form method="POST" action="/users/{{$user->id}}/demote">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        <button class="pull-left btn btn-small btn-info " type="submit">Demote</button>
                                                    </form>
                                                </th>
                                        @endadmin
                                    </th>
                                @else
                                    <th>{{'Normal'}}
                                        @admin
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/promote">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="pull-left btn btn-small btn-success" type="submit">Promote</button>
                                                </form>
                                            </th>  
                                        @endadmin                                          
                                    </th>
                                @endisAdmin
                            </tr>
                        @endforeach
                    @else
                       <p>0 records</p>
                    @endif
                </tbody>
            </table>     
        </div>
        <div class="tab-pane fade" id="associate_members_I_belong_to">
            <table class="table table-striped">
                @if(!$associated_members_belong == null)
                    @include('thead')
                @endif
                <tbody>
                        @if(!$associated_members_belong == null)
                            @foreach ($associated_members_belong as $associated_member_belong)
                                <tr>
                                    <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                    <th>{{$associated_member_belong->name}}</th>
                                    @admin
                                    <th>{{$user->email}}</th>
                                    @endadmin
                                    <th>Associate-of</th>
                                    @isBlocked($user)
                                        <th>{{'Blocked'}}
                                            @admin<th>     
                                                    <th>
                                                        <form method="POST" action="/users/{{$user->id}}/unblock">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PATCH') }}
                                                            <button class="btn btn-small btn-success" type="submit">Unblock</button>
                                                        </form>
                                                    </th>
                                            @endadmin
                                        </th>
                                    @else
                                        <th>{{'available'}}
                                            @admin
                                                <th>
                                                    <form method="POST" action="/users/{{$user->id}}/block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        <button class="pull-left btn btn-small btn-info" type="submit">Block</button>
                                                    </form>
                                                </th>  
                                            @endadmin                                          
                                        </th>
                                    @endisBlocked

                                    @isAdmin($user)
                                        <th>{{'Admin'}}
                                            @admin<th>     
                                                    <th>
                                                        <form method="POST" action="/users/{{$user->id}}/demote">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PATCH') }}
                                                            <button class="pull-left btn btn-small btn-info " type="submit">Demote</button>
                                                        </form>
                                                    </th>
                                            @endadmin
                                        </th>
                                    @else
                                        <th>{{'Normal'}}
                                            @admin
                                                <th>
                                                    <form method="POST" action="/users/{{$user->id}}/promote">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        <button class="pull-left btn btn-small btn-success" type="submit">Promote</button>
                                                    </form>
                                                </th>  
                                            @endadmin                                          
                                        </th>
                                    @endisAdmin
                                </tr>
                            @endforeach
                        @else
                           <p>0 records</p>
                        @endif
                </tbody>
            </table>     
        </div>
        <div class="tab-pane fade" id="all">
            <table class="table table-striped">
                @if(!$users_all == null)
                    @include('thead')
                @endif
                <tbody>
                        @if(!$users_all == null)
                            @foreach ($users_all as $user)
                                <tr>
                                    <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                    <th>{{$user->name}}</th>
                                    @admin
                                    <th>{{$user->email}}</th>
                                    @endadmin
                                    @admin<th>
                                        @if($user->blocked)
                                            {{'blocked'}}
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/unblock">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-small btn-success" type="submit">Unblock</button>
                                                </form>
                                            </th>
                                        @else
                                            {{'available'}}
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="pull-left btn btn-small btn-info" type="submit">Block</button>
                                                </form>
                                            </th>                                            
                                        @endif
                                        </th>

                                        <th>@if($user->admin)
                                            {{'Admin'}}
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/demote">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="pull-left btn btn-small btn-info " type="submit">Demote</button>
                                                </form>
                                            </th>
                                        @else
                                            {{'Normal'}}
                                            <th>
                                                <form method="POST" action="/users/{{$user->id}}/promote">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="pull-left btn btn-small btn-success" type="submit">Promote</button>
                                                </form>
                                            </th>

                                        @endif
                                        </th>
                                    @endadmin
                                </tr>
                            @endforeach
                        @else
                           <p>0 records</p>
                        @endif
                </tbody>
            </table>     
        </div>
        <!--@admin
        <div class="tab-pane fade" id="all">
            <table class="table table-striped">
                @if(!$users_all == null)
                    @include('thead')
                @endif
                <tbody>
                        @if(!$users_all == null)
                            @foreach ($users_all as $user)
                                <tr>
                                    <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                    <th>{{$user->name}}</th>
                                    <th>All</th>
                                </tr>
                            @endforeach
                        @else
                           <p>0 records</p>
                        @endif
                </tbody>
            </table>     
        </div>
        @endadmin-->
    </div>
</div>
@endsection