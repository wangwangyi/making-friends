<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$_title or ''}}{{$_system}}-交友网站</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="/assets/admin/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/assets/admin/css/admin.css">
    <link rel="stylesheet" href="/assets/admin/xSystem/css/xSystem.css">
    <link rel='stylesheet' href='/assets/admin/xSystem/vendor/nprogress/nprogress.css'/>
    @yield('css')
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong>交友</strong>
        <small>管理系統</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">


            <li>
                <div style="line-height: 50px;">
                    <select data-am-selected="{btnStyle: 'danger', btnSize: 'sm'}" id="change_system">
                        @foreach($systems as $url=>$system)
                            <option value="/{{$url}}" @if($_system==$url) selected @endif>
                                {{$system}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </li>

            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> {{$admin->name}}管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li>
                        <a href="/xSystem/config/clear_cache">
                            <span class="am-icon-refresh am-icon-spin"></span>
                            清除缓存
                        </a>
                    </li>
                    <li><a href="/xSystem/config/edit"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="/xSystem/logout"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>

            <li class="am-hide-sm-only">
                <a href="javascript:;" id="admin-fullscreen">
                    <span class="am-icon-arrows-alt"></span>
                    <span class="admin-fullText">开启全屏</span>
                </a>
            </li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                {{--加载各个系统自己的菜单--}}
                @include("system.$_system._menu")
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 思考</p>
                    <p>{{$bibel['cn']}}</p>
                </div>
            </div>
            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> Holy Bible</p>
                    <p>{{$bibel['en']}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    @yield('content')
            <!-- content end -->
</div>


<script src="/assets/admin/js/jquery.min.js"></script>
<script src='/assets/admin/xSystem/vendor/nprogress/nprogress.js'></script>
<script src="/assets/admin/js/amazeui.min.js"></script>
<script src="/assets/admin/js/app.js"></script>
<script src="/assets/laravel/laravel.js"></script>
<script src="/assets/admin/xSystem/js/xSystem.js"></script>
@yield('js')
</body>
</html>
