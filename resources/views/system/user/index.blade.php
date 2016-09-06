@extends('system.layouts.app')

@section('title')
    <title>
        管理员列表
    </title>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="pull-left">管理员列表</h3>
            </div>
        </div>
        @include('system.layouts.msg')
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>类型</th>
                <th>添加日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>@if($user->role_user->role_id == 1) 管理员 @elseif($user->role_user->role_id == 2) 超级管理员 @elseif($user->role_user->role_id == 3) 发布员 @endif</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <p>
                            <a href="{{route('admin.user.edit',$user->id)}}"  class="btn btn-primary trash">编辑</a>
                            <a href="{{route('admin.user.destroy',$user->id)}}" data-token="{{csrf_token()}}" data-method="delete" data-confirm="你确定要删除吗！" class="btn btn-danger del">删除</a>
                        </p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop

