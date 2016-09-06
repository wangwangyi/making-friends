@extends('home.layouts.app')
@section('title')
    <title>首页_交友网</title>
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
            <div class="col-title-1"><h3>用户中心</h3></div>

            <!-- ======= register-midWrap-2 ======= -->
            <div class="register-midWrap-2">

                <!-- ======= register-txtBox-2 ======= -->
                <div class="register-txtBox-2">
                    用户中心............
                </div>
                <!-- ======= /register-txtBox-2 ======= -->

            </div>
            <!-- ======= /register-midWrap-2 ======= -->

        </div>
        <!-- ======= /sidebar-b ======= -->
    </div>
    <!-- ======= /main-midWrap ======= -->
</div>
    <!-- ======= main-wrap ======= -->
    @stop

@section('js')
    @if(Session::has('create-user-success'))
        <script>
            $(function(){
                layer.alert('恭喜您注册成功，请取用户中心验证邮箱，完善更多个人信息！', {icon: 6});
            })
        </script>
    @endif
    @endsection




