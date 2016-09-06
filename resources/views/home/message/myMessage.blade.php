@extends('home.layouts.app')
@section('title')
    <title>消息中心_交友网</title>
@stop

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
        <div class="sidebar-b">
            <div class="col-title-1"><h3>我的消息</h3></div>

            <!-- ======= con-wrap-1 ======= -->
            <div class="con-wrap-1">
                <!-- ======= maintab ======= -->
                <div class="maintab">
                    <div class="tabtitle-bg"></div>

                    <ul class="tabtitle">
                        <li class="tabhover"><a href="personalCenter_myMessage1.html"><p>收件箱</p></a></li>
                        <li><a href="personalCenter_myMessage2.html"><p>发件箱</p></a></li>
                    </ul>

                    <!-- ======= tabcontent-box ======= -->
                    <div class="tabcontent-box">
                        <!-- ======= tabcontent tab1 ======= -->
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
                                        <img src="/assets/home/imgs/photo_2.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >你若安好</a></dt>
                                            <dd>26岁，湖北，164cm，大学本科，5000～8000元</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>免费看信</p></a></div>
                                        <div class="read-num"><a href="#" class="a-style-1">1封未读</a>&nbsp;/&nbsp;共6条信息</div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_3.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >爱的颜色</a></dt>
                                            <dd>26岁，湖北，164cm，大学本科，5000～8000元</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-1 btn-style-4" ><p>看信</p></a></div>
                                        <div class="read-num"><a href="#" class="a-style-1">2封未读</a>&nbsp;/&nbsp;共6条信息</div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_4.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >你若安好</a></dt>
                                            <dd>26岁，湖北，164cm，大学本科，5000～8000元</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>免费看信</p></a></div>
                                        <div class="read-num"><a href="#" class="a-style-1">1封未读</a>&nbsp;/&nbsp;共6条信息</div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_3.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >爱的颜色</a></dt>
                                            <dd>26岁，湖北，164cm，大学本科，5000～8000元</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-4" ><p>看信</p></a></div>
                                        <div class="read-num"><a href="#" class="a-style-1">2封未读</a>&nbsp;/&nbsp;共6条信息</div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_2.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >你若安好</a></dt>
                                            <dd>26岁，湖北，164cm，大学本科，5000～8000元</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-2 btn-style-3" ><p>免费看信</p></a></div>
                                        <div class="read-num"><a href="#" class="a-style-1">1封未读</a>&nbsp;/&nbsp;共6条信息</div>
                                    </li>
                                    <li>
                                        <img src="/assets/home/imgs/photo_3.jpg"/>
                                        <dl>
                                            <dt><a href="#" class="color-blue-2" >爱的颜色</a></dt>
                                            <dd>26岁，湖北，164cm，大学本科，5000～8000元</dd>
                                            <dd class="conList-time">2016-08-06&nbsp;21:39:08</dd>
                                        </dl>
                                        <div class="read-btn"><a href="#" class="btn-1 btn-style-4" ><p>看信</p></a></div>
                                        <div class="read-num"><a href="#" class="a-style-1">2封未读</a>&nbsp;/&nbsp;共6条信息</div>
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
                        <!-- ======= /tabcontent tab1 ======= -->

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