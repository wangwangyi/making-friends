<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="/assets/bootstrap/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

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

                            <li class="active"><a href="{{ url('/') }}">首页</a></li>
                            <li><a href="#">链接一</a></li>
                            <li><a href="#">链接二</a></li>
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">示例下拉 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">拉我一</a></li>
                                    <li><a href="#">拉我二</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">其他</li>
                                    <li><a href="#">再拉一</a></li>
                                    <li><a href="#">再拉二</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-search pull-left" action="">
                            <input type="text" class="search-query span2" placeholder="Search">
                        </form>
                        <ul class="nav pull-right">

                            @if (Auth::guest('admin'))
                            <li><a href="{{ url('/admin/login') }}">登陆</a></li>
                            <li><a href="{{ url('/admin/register') }}">注册</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    123 <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                            @endif

                            <li class="divider-vertical"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">更多 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">拉一</a></li>
                                    <li><a href="#">拉二</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">拉三</a></li>
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
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
