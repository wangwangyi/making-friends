<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>交友网_首页</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/home/css/common.css">
    <link rel="stylesheet" href="/assets/home/css/style.css">


</head>

<body>

<!-- ======= iframe-headerWrap ======= -->

<!-- ======= /iframe-headerWrap ======= -->


<!-- ======= main-wrap ======= -->
<div class="main-wrap">
    <!-- ======= main-midWrap ======= -->
    <div class="main-midWrap inner">
        <!-- ======= user-info-banner ======= -->

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
                           
                        </div>
                        <!-- ======= share-header-box ======= -->

                        <div class="share-photos-box">
                            <ul>
                                @foreach($users as $user)
                                <li><a href="#" target="_self" >{{$user->name}}<img src="/assets/home/imgs/share_photo_1.jpg"/></a></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ======= /share-mid-box ======= -->
                </div>
                <!-- ======= /share-happiness ======= -->


                <!-- ======= list-wrap-1 ======= -->
                <div class="list-wrap-1">

                    <form  method="get">

                    <!-- ======= search-wrap-1 ======= -->
                    <div class="search-wrap-1">
                        <strong>要求</strong>
                        <div class="search-input-1 search-style-1">
                            <select name="provice">
                                <option value="">请选择</option>
                                <option value="湖北省">湖北</option>
                                <option value="湖南">湖南</option>
                                <option>安徽</option>
                                <option>广东</option>
                            </select>
                            <select name="city">
                                <option value="">请选择</option>
                                <option value="武汉市">武汉</option>
                                <option>长沙</option>
                                <option>合肥</option>
                                <option>广州</option>
                            </select>
                        </div>

                        <div class="search-input-1">
                            <select class="star">
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                            </select>
                            &nbsp;~&nbsp;
                            <select class="end">
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26" selected="selected">26</option>
                            </select>
                            <input type="hidden" value="" name="birthday" id="birthday"/>
                        </div>

                        <div class="search-input-1">
                            <select name="marital_status">
                                <option value="1" @if(1== Request::input('marital_status')) selected @endif>未婚</option>
                                <option value="2" @if(2== Request::input('marital_status')) selected @endif>离异</option>
                                <option value="3" @if(3== Request::input('marital_status')) selected @endif>丧偶</option>
                            </select>
                        </div>

                        <div class="search-input-2">
                            <input type="checkbox" />有照片
                        </div>
                        <input class="submit1" type="submit" style="display: none;"/>
                        <a href="#" target="_self" class="btn-1 btn-style-2 submit">搜索</a>
                    </div>
                    <!-- ======= search-wrap-1 ======= -->
                    </form>


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


<!-- ======= footer-wrap ======= -->
<div class="footer-wrap">
    <!--footer-midWrap-->
    <div class="footer-midWrap inner">
        <div class="footer-imgBox-1"><a href="#" target="_self" ><img src="/assets/home/imgs/img_bg_2.jpg"/></a></div>

        <!--footer-ul-box-->
        <div class="footer-ul-box">
            <ul>
                <li><a href="#" target="_self" >联系客服</a></li>
                <li><a href="#" target="_self" >关于我们</a></li>
                <li><a href="#" target="_self" >联系我们</a></li>
                <li><a href="#" target="_self" >联系客服</a></li>
                <li><a href="#" target="_self" >关于我们</a></li>
                <li><a href="#" target="_self" >联系我们</a></li>
                <li><a href="#" target="_self" >联系客服</a></li>
                <li><a href="#" target="_self" >关于我们</a></li>
                <li><a href="#" target="_self" >联系我们</a></li>
            </ul>
        </div>
        <!--/footer-ul-box-->

        <div class="footer-txtBox-1"><a href="http://www.miitbeian.gov.cn/" target="_blank" >ICP证书：鄂ICP110100886</a>&nbsp;&nbsp;&nbsp;&nbsp;增值电信业务经营许可证：鄂B2-20160801&nbsp;&nbsp;&nbsp;&nbsp;ISO9001质量体</div>

        <div class="footer-txtBox-1">&copy;2015-2016&nbsp;版权所有&nbsp;&nbsp;&nbsp;&nbsp;鄂公网安备11088866688号&nbsp;&nbsp;不良和违法信息举报专线：027-8888666</div>
    </div>
    <!--/footer-midWrap-->
</div>
<!-- ======= /footer-wrap ======= -->




<script src="/assets/home/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
    $(function(){

        $(".submit").click(function(){
            var star = $(".star option:selected").val();
            var end = $(".end option:selected").val();
            $("#birthday").val(star+"-"+end);
            $(".submit1").click();
        });

    })
</script>
</body>
</html>
