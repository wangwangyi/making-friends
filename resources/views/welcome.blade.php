@extends('home.layouts.app')
@section('title')
    <title>交友网_首页</title>
@stop
@section('css')
    <script type="text/javascript">
        $(function(){
            var oFocus=$('#focus'),
                    oRight=oFocus.find('.mini-banner'),
                    oLeft=oFocus.find('.main-banner'),
                    aRLi=oRight.find('li'),
                    aLLi=oLeft.find('li'),
                    index=0,
                    timer = null;
            aRLi.click(function(){
                index=$(this).index()
                $(this).addClass('active').siblings().removeClass();
                aLLi.eq(index).addClass('active').siblings().removeClass();
                aLLi.eq(index).stop().animate({'opacity':1},300).siblings().stop().animate({'opacity':0},300);
                stopFoucs();
            })
            oLeft.mouseenter(function(){
                stopFoucs();
            }).mouseleave(function(){
                startFocus();
            });
            timer = setInterval(function(){
                startFocus();
            },5000);
            function startFocus(){
                index++;
                index = index > aRLi.size()-1 ? 0 :index;

                aLLi.eq(index).addClass('active').siblings().removeClass();
                aLLi.eq(index).stop().animate({'opacity':1},300).siblings().stop().animate({'opacity':0},300);
                aRLi.eq(index).addClass('active').siblings().removeClass();
            }
            function stopFoucs(){
                clearInterval(timer);
            }
        })
    </script>
    @stop




    @section('content')
            <!-- ======= main-wrap ======= -->
    <div class="main-wrap">
        <!-- ======= main-midWrap ======= -->
        <div class="main-midWrap inner">
            <!-- ======= user-info-banner ======= -->
            <div class="user-info-banner">
                <!-- ======= side-user-info ======= -->
                <div class="side-user-info user-infoStyle-1">
                    <!-- ======= side-user-wrap ======= -->
                    <div class="side-user-wrap">
                        用户注册：
                    </div>
                    <!-- ======= side-user-wrap ======= -->

                    <a href="{{url('register')}}" target="_self" class="btn-1 btn-style-1" >免费注册</a>

                    <div class="user-server-1"><p>我是会员：<a href="{{url('login')}}" target="_self" >立即登录</a></p></div>
                </div>
                <!-- ======= /side-user-info ======= -->

                <!-- ======= banner-box-1 ======= -->
                <div class="banner-box-1">
                    <div class="focus" id="focus">
                        <div class="main-banner">
                            <ul>
                                <li class="active" style="opacity:1; filter:alpha(opacity=100);"><p>图一</p><img src="/assets/home/imgs/banner_1.jpg"/></li>
                                <li><p>图二</p><img src="/assets/home/imgs/banner_2.jpg"/></li>
                                <li><p>图三</p><img src="/assets/home/imgs/banner_3.jpg"/></li>
                            </ul>
                        </div>
                        <div class="mini-banner">
                            <ul>
                                <li class="active"><img src="/assets/home/imgs/banner_1.jpg"/></li>
                                <li><img src="/assets/home/imgs/banner_2.jpg"/></li>
                                <li><img src="/assets/home/imgs/banner_3.jpg"/></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ======= /banner-box-1 ======= -->
            </div>
            <!-- ======= /user-info-banner ======= -->

            <!-- ======= main-list-wrap ======= -->
            <div class="main-list-wrap">
                <!-- ======= sidebar-a-1 ======= -->
                <div class="sidebar-a-1">
                    <!-- ======= share-happiness ======= -->
                    <div class="share-happiness">
                        <!-- ======= share-mid-box ======= -->
                        <div class="share-mid-box">
                            <!-- ======= share-header-box ======= -->
                            <div class="share-header-box">
                                <div class="share-title"><strong>晒幸福</strong><img src="/assets/home/imgs/share-title-img.png"/></div>
                                <div class="share-more color-blue"><a href="#" target="_self" ><p>更多&gt;&gt;</p></a></div>
                                <div class="share-tabs-box a-underline">
                                    <ul>
                                        <li><a href="#" target="_self" class="a-underline-active" ><p>一见钟情</p></a></li>
                                        <li><a href="#" target="_self" ><p>再婚</p></a></li>
                                        <li><a href="#" target="_self" ><p>郎才女貌</p></a></li>
                                        <li><a href="#" target="_self" ><p>单亲妈妈</p></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ======= share-header-box ======= -->

                            <div class="share-photos-box">
                                <ul>
                                    <li><a href="#" target="_self" ><img src="/assets/home/imgs/share_photo_1.jpg"/></a></li>
                                    <li><a href="#" target="_self" ><img src="/assets/home/imgs/share_photo_1.jpg"/></a></li>
                                    <li><a href="#" target="_self" ><img src="/assets/home/imgs/share_photo_1.jpg"/></a></li>
                                    <li><a href="#" target="_self" ><img src="/assets/home/imgs/share_photo_1.jpg"/></a></li>
                                    <li><a href="#" target="_self" ><img src="/assets/home/imgs/share_photo_1.jpg"/></a></li>
                                    <li><a href="#" target="_self" ><img src="/assets/home/imgs/share_photo_1.jpg"/></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- ======= /share-mid-box ======= -->
                    </div>
                    <!-- ======= /share-happiness ======= -->


                    <!-- ======= list-wrap-1 ======= -->
                    <div class="list-wrap-1">

                        <!-- ======= search-wrap-1 ======= -->
                        <div class="search-wrap-1">
                            <strong>要求</strong>
                            <div class="search-input-1 search-style-1">
                                <select>
                                    <option>湖北</option>
                                    <option>湖南</option>
                                    <option>安徽</option>
                                    <option>广东</option>
                                </select>
                                <select>
                                    <option>武汉</option>
                                    <option>长沙</option>
                                    <option>合肥</option>
                                    <option>广州</option>
                                </select>
                            </div>

                            <div class="search-input-1">
                                <select>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                </select>
                                &nbsp;~&nbsp;
                                <select>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option selected="selected">26</option>
                                </select>
                            </div>

                            <div class="search-input-1">
                                <select>
                                    <option>未婚</option>
                                    <option>离异</option>
                                    <option>丧偶</option>
                                </select>
                            </div>

                            <div class="search-input-2">
                                <input type="checkbox" />有照片
                            </div>

                            <a href="#" target="_self" class="btn-1 btn-style-2" >搜索</a>

                        </div>
                        <!-- ======= search-wrap-1 ======= -->



                    </div>
                    <!-- ======= /list-wrap-1 ======= -->

                </div>
                <!-- ======= /sidebar-a-1 ======= -->


                <!-- ======= sidebar-b-1 ======= -->
                <div class="sidebar-b-1">
                    <!-- ======= txt-kinds-1 ======= -->
                    <div class="txt-kinds-1">
                        uuuuuuuuuuuuuuuu<br />
                        uuuuuuuuuuuuuuuu<br />
                        uuuuuuuuuuuuuuuu<br />
                        uuuuuuuuuuuuuuuu<br />
                        uuuuuuuuuuuuuuuu<br />
                        uuuuuuuuuuuuuuuu<br />
                    </div>
                    <!-- ======= /txt-kinds-1 ======= -->

                </div>
                <!-- ======= /sidebar-b-1 ======= -->

            </div>
            <!-- ======= /main-list-wrap ======= -->
        </div>
        <!-- ======= /main-midWrap ======= -->
    </div>
    <!-- ======= main-wrap ======= -->
@stop






