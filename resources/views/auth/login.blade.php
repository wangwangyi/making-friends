<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户登录_交友网</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/home/css/common.css">
    <link rel="stylesheet" href="/assets/home/css/style.css">
    <link rel="stylesheet" href="/assets/home/layer/skin/layer.css">
    <link rel="stylesheet" href="/assets/home/css/custom.css">

</head>

<body>

<!-- ======= headerWrap ======= -->
<div class="iframe-headerWrap">
    @include('home.layouts.header-out')
</div>
<!-- ======= -/headerWrap ======= -->



<!-- ======= main-wrap ======= -->
<div class="main-wrap">
    <!-- ======= main-midWrap ======= -->
    <div class="main-midWrap img_bg_1 inner">

        <!-- ======= login-wrap ======= -->
        <div class="login-wrap">
            <div class="col-title-1"><h3>会员登录</h3></div>

            <!-- ======= login-inputs-wrap ======= -->
            <div class="login-inputs-wrap">
                <form  method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                <div class="login-inputBox-1">
                    <b>登录账号</b>
                    <input name="email" type="text" value="{{ old('email') }}" />
                    <br>
                    @if ($errors->has('email'))
                        <p class="do-login">*{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="login-inputBox-1">
                    <b>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</b>
                    <input name="password" type="password" />
                    @if ($errors->has('password'))
                        <p class="do-login">*{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="login-inputBox-2"><input name="remember" type="checkbox" value="" border="0" /><b>记住密码</b></div>

                <div class="login-inputBox-3">
                    <input class="submit" type="submit" style="display: none;"/>
                    <a href="#" target="_self" class="login-btn" >登&nbsp;录</a>
                    <a href="#" target="_self" class="password-1" >忘记密码？</a></div>
                </form>
                <!-- ======= login-inputBox-4 ======= -->
                <div class="login-inputBox-4" style=" display:none;">
                    <dl>
                        <dt>其他账号登录</dt>
                        <dd><a href="#" target="_self" class="login-kind-1" >QQ账号</a></dd>
                        <dd><a href="#" target="_self" class="login-kind-2" >新浪微博</a></dd>
                        <dd><a href="#" target="_self" class="login-kind-3" >微信</a></dd>
                    </dl>
                </div>

                <!-- ======= /login-inputBox-4 ======= -->
            </div>
            <!-- ======= login-inputs-wrap ======= -->

            <div class="login-txt-1"><a href="{{ url('/register') }}" target="_self" >你还不是会员？立即注册</a></div>
        </div>
        <!-- ======= login-wrap ======= -->

    </div>
    <!-- ======= /main-midWrap ======= -->
</div>
<!-- ======= main-wrap ======= -->


<!-- ======= footer-wrap ======= -->
<div class="iframe-footerWrap">
    @include('home.layouts.footer')
</div>
<!-- ======= /footer-wrap ======= -->


<script src="/assets/bootstrap/js/jquery.min.js"></script>
<script src="/assets/home/layer/layer.js"></script>
<script>
    $(function() {

        $(".login-btn").click(function(){
            layer.load(2);
            setTimeout(function(){
                layer.closeAll('loading');
            }, 2000);
            $(".submit").click();
        })


    });
</script>



</body>
</html>
