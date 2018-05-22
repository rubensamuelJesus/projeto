@extends('template')
@section('content')
<div class="content">
    <div class="tabs-x tabs-above">
        <div id="myTabContent-kv-1" class="tab-content">
            <table class="table table-striped">
                @if(!$associated_members_belong == null)
                    <thead>
                        <tr>
                            <th>
                                Photo                        
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Link
                            </th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @if(!$associated_members_belong == null)
                        @foreach ($associated_members_belong as $associated_member_belong)
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                <th>{{$associated_member_belong->name}}</th>
                                <th>{{$associated_member_belong->email}}</th>
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