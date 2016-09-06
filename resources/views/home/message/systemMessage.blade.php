@extends('home.layouts.app')
@section('title')
    <title>首页_交友网</title>
@stop
@section('css')
@include('home.layouts.switch')
    @stop

    @section('content')
<!-- ======= main-wrap ======= -->
<div class="main-wrap">
    <!-- ======= main-midWrap ======= -->
    <div class="main-midWrap inner">
        <!-- ======= sidebar-a ======= -->
        @include('home.layouts.message_menu')
        <!-- ======= /sidebar-a ======= -->


        <!-- ======= sidebar-b ======= -->
        <div class="sidebar-b">
            <div class="col-title-1"><h3>系统通知</h3></div>

            <!-- ======= con-wrap-1 ======= -->
            <div class="con-wrap-1">
                <!-- ======= maintab ======= -->
                <div class="maintab">
                    <!-- ======= tabcontent-box ======= -->
                    <div class="tabcontent-box">
                        <!-- ======= tabcontent tab2 ======= -->
                        <div class="tabcontent">
                            <div class="tab-state">
                                <ul>
                                    <li class="state-hover"><a href="#"><p>全部</p></a></li>
                                    <li><a href="#"><p>未读</p></a></li>
                                    <li><a href="#"><p>已读</p></a></li>
                                </ul>
                            </div>

                            <!-- ======= tab-conList-wrap ======= -->
                            <div class="tab-conList-wrap">
                                <ul>
                                    <li>
                                        <img src="/assets/home/imgs/photo_system_1.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >快速找到真爱</a></dt>
                                            <dd>无限制看信发信，10项特权让你快速找到真爱</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>查看</p></a></div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_system_2.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >系统通知</a></dt>
                                            <dd>新人宝典，快来围观拉~~</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>查看</p></a></div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_system_1.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >快速找到真爱</a></dt>
                                            <dd>无限制看信发信，10项特权让你快速找到真爱</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>查看</p></a></div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_system_2.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >系统通知</a></dt>
                                            <dd>新人宝典，快来围观拉~~</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>查看</p></a></div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_system_1.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >快速找到真爱</a></dt>
                                            <dd>无限制看信发信，10项特权让你快速找到真爱</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>查看</p></a></div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_system_2.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >系统通知</a></dt>
                                            <dd>新人宝典，快来围观拉~~</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>查看</p></a></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- ======= /tab-conList-wrap ======= -->

                            <div class="pages-box">
                                <ul>
                                    <li><a href="#"><p>首页</p></a></li>
                                    <li><a href="#"><p>上一页</p></a></li>
                                    <li class="pages-active"><a href="#"><p>1</p></a></li>
                                    <li><a href="#"><p>2</p></a></li>
                                    <li><a href="#"><p>3</p></a></li>
                                    <li><a href="#"><p>4</p></a></li>
                                    <li><a href="#"><p>5</p></a></li>
                                    <li><a href="#"><p>下一页</p></a></li>
                                    <li><a href="#"><p>尾页</p></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- ======= /tabcontent tab2 ======= -->
                    </div>
                    <!-- ======= /tabcontent-box ======= -->
                </div>
                <!-- ======= /maintab ======= -->

            </div>
            <!-- ======= /con-wrap-1 ======= -->

        </div>
        <!-- ======= /sidebar-b ======= -->
    </div>
    <!-- ======= /main-midWrap ======= -->
</div>
<!-- ======= main-wrap ======= -->
    @stop