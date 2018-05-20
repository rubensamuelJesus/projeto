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
            <a href="#profile-kv-1" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
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
        <div class="tab-pane fade in active" id="home-kv-1">
            <table class="table table-striped">
                @include('thead')
                <tbody>
                        @foreach ($users_all as $user)
                            @isAdmin($user)
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                <th>{{$user->name}}</th>
                                <th>Administrador</th>
                            </tr>
                            @endisAdmin
                        @endforeach
                </tbody>
            </table>  
        </div>
        <div class="tab-pane fade" id="blocked_users">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Photo                        
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Role
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($users_all as $user)
                            @isBlocked($user)
                            <tr>
                                <td><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></td>
                                <td>{{$user->name}}</td>
                                <td>Administrador</td>
                            </tr>
                            @endisBlocked
                        @endforeach
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
                                    <td><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></td>
                                    <td>{{$associated_member->name}}</td>
                                    <td>Administrador</td>
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
                @if(!$associated_members == null)
                    @include('thead')
                @endif
                <tbody>
                    @if(!$associated_members == null)
                        @foreach ($users_all as $user)
                            @isBlocked($user)
                            <tr>
                                <td><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></td>
                                <td>{{$user->name}}</td>
                                <td>Administrador</td>
                            </tr>
                            @endisBlocked
                        @endforeach
                    @else
                       <p>Nenhum Registo</p>
                    @endif
                </tbody>
            </table>     
        </div>
        <div class="tab-pane fade" id="all">
            <table class="table table-striped">
                @if(!$associated_members == null)
                    @include('thead')
                @endif
                <tbody>
                        @if(!$associated_members == null)
                            @foreach ($users_all as $user)
                                @isBlocked($user)
                                <tr>
                                    <td><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></td>
                                    <td>{{$user->name}}</td>
                                    <td>Administrador</td>
                                </tr>
                                @endisBlocked
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