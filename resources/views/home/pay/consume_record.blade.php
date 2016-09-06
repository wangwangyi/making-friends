@extends('home.layouts.app')
@section('title')
    <title>消费记录_交友网</title>
    @stop
	<script src="http://open.web.meitu.com/sources/xiuxiu.js" type="text/javascript"></script>
    @section('content')
    <!-- ======= main-wrap ======= -->
    <div class="main-wrap">
        <!-- ======= main-midWrap ======= -->
        <div class="main-midWrap inner">
            <!-- ======= sidebar-a ======= -->
            <div class="sidebar-a-wrap">
                @include('home.layouts.menu')
            </div>
            <!-- ======= /sidebar-a ======= -->

 
            <!-- ======= sidebar-b ======= -->

            <div class="sidebar-b record2">
                <div class="col-title-1"><h3>我的消费记录</h3></div>

                <div class="con-banner-1"><img src="/assets/home/imgs/con_banner_1.jpg"/></div>

                <!-- ======= list-midWrap-1 ======= -->
                <div class="list-midWrap-1">
                    <div class="list-txtWrap-1">
                        <img src="/assets/home/imgs/icon_1.png"/>
                        <div class="list-txtBox-1">
                            <div class="list-txt-1"><p>剩余缘分币</p></div>
                            <div class="list-txt-2"><strong>20个</strong></div>
                        </div>
                    </div>


                    <!-- ======= list-txtWrap-2 ======= -->
                    <div class="list-txtWrap-2">
                        <div class="col-title-2"><h4>我的消费记录</h4></div>

                        <!-- ======= list-tableBox-1 ======= -->
                        <div class="list-tableBox-1">
                            <dl>
                                <dt><strong>充值金额</strong></dt>
                                <dd>200元</dd>
                                <dd>100元</dd>
                                <dd>100元</dd>
                                <dd>50元</dd>
                                <dd>20元</dd>
                            </dl>

                            <dl>
                                <dt><strong>充值时间</strong></dt>
                                <dd><p>2016-08-19 15:26:09</p></dd>
                                <dd><p>2016-08-19 15:26:09</p></dd>
                                <dd><p>2016-08-19 15:26:09</p></dd>
                                <dd><p>2016-08-19 15:26:09</p></dd>
                                <dd><p>2016-08-19 15:26:09</p></dd>
                            </dl>

                            <dl>
                                <dt><strong>充值方式</strong></dt>
                                <dd>微信支付</dd>
                                <dd>微信支付</dd>
                                <dd>微信支付</dd>
                                <dd>支付宝支付</dd>
                                <dd>支付宝支付</dd>
                            </dl>


                        </div>
                        <!-- ======= /list-tableBox-1 ======= -->
                    </div>
                    <!-- ======= /list-txtWrap-2 ======= -->

                </div>
                <!-- ======= /list-midWrap-1 ======= -->

            </div>
            <!-- ======= /sidebar-b ======= -->
        </div>
        <!-- ======= /main-midWrap ======= -->
    </div>                         
    <!-- ======= main-wrap ======= -->
@stop