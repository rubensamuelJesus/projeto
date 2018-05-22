@extends('template')
@section('content')
<div class="tabs-x tabs-above">
    <ul id="myTab-kv-1" class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#administrador" role="tab" data-toggle="tab"><i
                class="glyphicon glyphicon-home"></i>Administrador</a></li>
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
                                <th>Administrador</th>
                            </tr>
                            @endisAdmin
                        @endforeach
                    @else
                       <p>Nenhum Registo</p>
                    @endif
                </tbody>
            </table>  
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
                                <th>Blocked users</th>
                            </tr>
                            @endisBlocked
                        @endforeach
                    @else
                       <p>Nenhum Registo</p>
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
                                <th>Associate</th>
                            </tr>
                        @endforeach
                    @else
                       <p>Nenhum Registo</p>
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
                                    <th>Associate-of</th>
                                </tr>
                            @endforeach
                        @else
                           <p>Nenhum Registo</p>
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
                                    <th>All</th>
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