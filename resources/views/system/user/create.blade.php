@extends('system.layouts.app')

@section('title')
    <title>
       新增管理员
    </title>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="pull-left">回收站列表</h3>
            </div>
        </div>
        @include('system.layouts.msg')
        <form class="form-horizontal offset2" method="POST" action="{{route('admin.user.store')}}">

            {!! csrf_field() !!}
            <div class="control-group">
                <label class="control-label" >用户名</label>
                <div class="controls">
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >邮箱</label>
                <div class="controls">
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">密码</label>
                <div class="controls">
                    <input type="password" name="password">
                </div>
            </div>

            <div class="control-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="control-label">重复密码</label>
                <div class="controls">
                    <input type="password" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">管理员类型</label>
                <div class="controls">
                    <select name="role_id">
                        <option value="">请选择管理员类型</option>
                        <option value="2">超级管理员</option>
                        <option value="1">管理员</option>
                        <option value="3">发布员</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">新增</button>
                </div>
            </div>
        </form>

    </div>
@stop

