@extends('system.layouts.app')

@section('title')
    <title>
        编辑管理员权限
    </title>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="pull-left">编辑管理员权限</h3>
            </div>
        </div>

        <form class="form-horizontal" method="post" action="{{route('admin.user.update',$user->id)}}">
            {!! csrf_field() !!}
            {!! method_field('put') !!}
            <div class="control-group">
                <label class="control-label" for="inputEmail">管理员类型</label>
                <div class="controls">
                    <select name="role_id">
                        <option value="">请选择管理员类型</option>
                        <option value="2" @if($user->role_user->role_id == 2) selected @endif>超级管理员</option>
                        <option value="1" @if($user->role_user->role_id == 1) selected @endif>管理员</option>
                        <option value="3" @if($user->role_user->role_id == 3) selected @endif>发布员</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">修改</button>
                </div>
            </div>
        </form>

    </div>
@stop

