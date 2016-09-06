@extends('home.layouts.app')
@section('title')
    <title>密码修改_交友网</title>
    @stop

    @section('content')
            <!-- ======= main-wrap ======= -->
<div class="main-wrap">
    <!-- ======= main-midWrap ======= -->
    <div class="main-midWrap inner">
        <!-- ======= sidebar-a-wrap ======= -->
        <div class="sidebar-a-wrap">
            @include('home.layouts.menu')
        </div>
        <!-- ======= /sidebar-a-wrap ======= -->


        <!-- ======= sidebar-b ======= -->
        <div class="sidebar-b">
            <div class="col-title-1"><h3>修改密码</h3></div>

            <!-- ======= register-midWrap-2 ======= -->
            <form method="post" action="/user/updatePassword">
                {!! csrf_field() !!}
                {!! method_field('put') !!}
            <div class="register-midWrap-2">

                <!-- ======= register-txtBox-2 ======= -->
                <div class="register-txtBox-2">
                    <ul>
                        <li class="register-mainTxt register-style-2">
                            <dl>
                                <dt>原始密码</dt>
                                <dd class="register-dd-3"><input name="old_password" type="password" /></dd>
                            </dl>
                        </li>
                        <li class="register-promptTxt register-style-5" style=" display:block; ">
                                @if (session('msg'))
                                <p>*{{ session('msg') }}</p>
                                @endif
                        </li>
                    </ul>

                    <ul>
                        <li class="register-mainTxt register-style-2">
                            <dl>
                                <dt>新&nbsp;&nbsp;密&nbsp;&nbsp;码</dt>
                                <dd class="register-dd-3"><input name="password" type="password" /></dd>
                            </dl>
                        </li>
                        <li class="register-promptTxt register-style-5" style=" display:block; ">
                            @if ($errors->has('password'))
                                <p>*{{ $errors->first('password') }}</p>
                            @endif
                        </li>
                    </ul>

                    <ul>
                        <li class="register-mainTxt register-style-2">
                            <dl>
                                <dt>确认密码</dt>
                                <dd class="register-dd-3"><input name="password_confirmation" type="password" /></dd>
                            </dl>
                        </li>
                        <li class="register-promptTxt register-style-5" style=" display:block; ">
                            @if ($errors->has('password_confirmation'))
                                <p>*{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </li>
                    </ul>

                    <ul>
                        <li class="register-mainTxt register-style-2">
                            <dl>
                                <dt>&nbsp;</dt>
                                <input type="submit" class="submit" style="display: none;"/>
                                <dd><a href="#" target="_self" class="register-btn" >保存</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                <!-- ======= /register-txtBox-2 ======= -->

            </div>
            </form>
            <!-- ======= /register-midWrap-2 ======= -->

        </div>
        <!-- ======= /sidebar-b ======= -->
    </div>
    <!-- ======= /main-midWrap ======= -->
</div>
    <!-- ======= main-wrap ======= -->
@stop

@section('js')

        <script>
            $(function(){
                $(".register-btn").click(function(){
                    layer.load(2);
                    setTimeout(function(){
                        layer.closeAll('loading');
                    }, 2000);
                    $('.submit').click();
                })
            })
        </script>

@endsection




