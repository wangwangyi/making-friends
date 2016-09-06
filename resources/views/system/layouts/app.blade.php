<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @yield('title')

    <!-- Fonts -->
    <link href="/assets/bootstrap/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
   {{-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>--}}

    <!-- Styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="icon" type="image/png" href="/favicon.ico">

    @yield('css')
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#"><i class="icon-fire">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
            <div class="nav-collapse collapse navbar-responsive-collapse">
                <ul class="nav">

                    <li class="{{$_index or ''}}"><a href="{{ url('/admin') }}">首页</a></li>
                {{--    @ability('admin,owner', 'admin,owner')--}}
                    <li class="{{$_cate or ''}}"><a href="/admin/category">分类</a></li>
                   {{-- @endability--}}
                    <li class="{{$_slide or ''}}"><a href="/admin/slides">轮播图管理</a></li>
                    <li class="dropdown {{$_article or ''}} ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">内容管理 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/article">内容列表</a></li>
                         {{--   @ability('admin,owner', 'admin,owner')--}}
                            <li><a href="/admin/trash">内容回收站</a></li>
                           {{-- @endability--}}
                        </ul>
                    </li>

                    <li class="dropdown {{$_set or ''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">系统设置 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           {{-- @ability('admin,owner', 'admin,owner')--}}
                            <li><a href="/admin/config">站点信息</a></li>
                           {{-- @endability--}}
                            <li><a href="/admin/setting">修改账号密码</a></li>
                            <li><a href="/admin/clear_cache">清除缓存</a></li>
                            <li class="divider"></li>
                          {{--  @role('admin')--}}
                            <li><a href="/admin/user/create">新增管理员</a></li>
                            <li><a href="/admin/user">管理员列表</a></li>
                           {{-- @endrole--}}
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $admin->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div>


@yield('content')

        <!-- JavaScripts -->
<script src="/assets/bootstrap/js/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/laravel/laravel.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

@yield('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>