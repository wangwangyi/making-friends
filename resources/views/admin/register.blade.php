@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="page-header">
                    <h1>Register</h1>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal offset2" method="POST" action="{{ url('/admin/register') }}">

                        {!! csrf_field() !!}
                        <div class="control-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label" for="inputEmail">Name</label>
                            <div class="controls">
                                <input type="text" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label" for="inputPassword">E-Mail Address</label>
                            <div class="controls">
                                <input type="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                                <input type="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="control-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="control-label" for="inputPassword">Confirm Password</label>
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
                            <div class="controls">
                                <button type="submit" class="btn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
