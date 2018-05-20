@extends('template')
@section('content')

<style type="text/css">
    #table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    #table th,
    #table td {
        text-align: left;
        padding: 12px;
    }

    #table tr {
        border-bottom: 1px solid #ddd;
    }

    #table tr.header,
    #table tr:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="input-group">
    <input class="form-control" id="search" placeholder="search distribution" name="s" autocomplete="off"
        autofocus>
    <div class="input-group-btn">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            id="deviceSelector">
                      Devices
                    </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="javascript:void(0)" onclick="searchTableDevice(this.innerHTML)">Administrador</a>
            <a class="dropdown-item" href="javascript:void(0)" onclick="searchTableDevice(this.innerHTML)">Blocked users</a>
            <a class="dropdown-item" href="javascript:void(0)" onclick="searchTableDevice(this.innerHTML)">Associate members</a>
            <a class="dropdown-item" href="javascript:void(0)" onclick="searchTableDevice(this.innerHTML)">Associate Members I belong to</a>
            <div role="separator" class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)" onclick="searchTableDevice('all')">All</a>
        </div>
    </div>
</div>



<table id="table" class="table-striped table-hover">
    <tr class="header">
        <th style="width:35%;">Photo</th>
        <th style="width:35%;">Nome</th>
        <th style="width:20%;">Role</th>
    </tr>

    @foreach ($users_all as $user)
        @verAdmin($user)
        <tr>
            <td><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></td>
            <td>{{$user->name}}</td>
            <td>Administrador</td>
        </tr>
        @endverAdmin
    @endforeach

    @foreach ($associated_members as $associated_member)
             {{$associated_member->name}}     
    @endforeach


















    
    <tr>
        <td>Glass '17</td>
        <td>Administrador</td>
        <td><a href="#" class="btn btn-primary" target="_blank">Download</a></td>
    </tr>
    <tr>
        <td>Other distribution</td>
        <td>Mobile</td>
        <td><a href="#" class="btn btn-primary" target="_blank">Download</a></td>
    </tr>
    <tr>
        <td>Distribution 3</td>
        <td>Tablet & Mobile</td>
        <td><a href="#" class="btn btn-primary" target="_blank">Download</a></td>
    </tr>
</table>







<script>
$(function () {
    $('#search').on('input', function () {
        searchRow();
    });
})

function searchRow() {
    var $rows = $('#table > tbody > tr').not(".header");
    var val1 = $.trim($('#search').val()).replace(/ +/g, ' ').toLowerCase();
    var val2 = $.trim($("#deviceSelector").text()).toLowerCase();
    val2 = (val2 === "devices") ? "" : val2;

    $rows.show().filter(function () {
        var text1 = $(this).find('td:nth-child(1)').text().replace(/\s+/g, ' ').toLowerCase();
        var text2 = $(this).find('td:nth-child(2)').text().replace(/\s+/g, ' ').toLowerCase();
        return !~text1.indexOf(val1) || !~text2.indexOf(val2);
    }).hide();
}

function searchTableDevice(device) {
    var filter, table, tr, td, i;

    $("#deviceSelector").html(device);

    if (device == "all") {
        $("#deviceSelector").html("Devices");
    }

    searchRow();
}
</script>

@endsection