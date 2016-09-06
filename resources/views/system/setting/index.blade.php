@extends('system.layouts.app')

@section('title')
    <title>
        修改账号密码
    </title>
@stop

@section('content')
    <div class="container">
    <div class="row">
        @include('system.layouts.msg')
        <div class="col-md-8 col-md-offset-2">
            <div class="modal-header">
                <h3 id="myModalLabel">修改账号密码</h3>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal offset2" method="POST" action="/admin/setting/change_password">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}
                        <div class="control-group">
                            <label class="control-label">用户名</label>
                            <div class="controls">
                                <input type="text" name="name" value="{{$admin->name}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">原始密码</label>
                            <div class="controls">
                                <input type="password" name="old_password">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">新密码</label>
                            <div class="controls">
                                <input type="password" placeholder="请输入你的新密码" name="password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">确认新密码</label>
                            <div class="controls">
                                <input type="password" placeholder="请再次输入你的新密码" name="password_confirmation">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('js')

@stop