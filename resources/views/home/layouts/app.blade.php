<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="/assets/home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/assets/home/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/home/layer/skin/layer.css">
    <script src="/assets/home/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type='text/javascript' src='/assets/common/js/lib.js'></script>
    @yield('css')
</head>

<body>

<div class="iframe-headerWrap">
    @include('home.layouts.header-on')
</div>
<!-- ======= main-wrap ======= -->

@yield('content')

        <!-- ======= main-wrap ======= -->

<!-- ======= footer-wrap ======= -->
<div class="iframe-footerWrap">
    @include('home.layouts.footer')
</div>
<!-- ======= /footer-wrap ======= -->
<script src="/assets/home/layer/layer.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('js')

</body>
</html>