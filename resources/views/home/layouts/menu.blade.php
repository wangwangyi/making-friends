<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>iframe_menu_1_交友网</title>
    <meta charset="utf-8">
    <link href="/assets/home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/assets/home/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/assets/home/js/jquery-1.8.0.js" type="text/javascript"></script>
    <link href="/assets/home/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css" />
    <script src="/assets/home/js/jquery-accordion-menu.js" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("#jquery-accordion-menu").jqueryAccordionMenu();

        });

        $(function(){
            //列表项背景颜色切换
            $("#menu-listBox li").click(function(){
                $("#menu-listBox li.active").removeClass("")
                $(this).addClass("active");
            })
        })
    </script>
    <script type="text/javascript">
        (function($) {
            $.expr[":"].Contains = function(a, i, m) {
                return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
            };
            function filterList(header, list) {
                //@header 头部元素
                //@list 无序列表
                //创建一个搜素表单
                var form = $("<form>").attr({
                    "class":"filterform",
                    action:"#"
                }), input = $("<input>").attr({
                    "class":"filterinput",
                    type:"text"
                });
                $(form).append(input).appendTo(header);
                $(input).change(function() {
                    var filter = $(this).val();
                    if (filter) {
                        $matches = $(list).find("a:Contains(" + filter + ")").parent();
                        $("li", list).not($matches).slideUp();
                        $matches.slideDown();
                    } else {
                        $(list).find("li").slideDown();
                    }
                    return false;
                }).keyup(function() {
                    $(this).change();
                });
            }
            $(function() {
                filterList($("#form"), $("#menu-listBox"));
            });
        })(jQuery);
    </script>
</head>

<body>



<!-- ======= sidebar-a ======= -->
<div class="sidebar-a">
    <!-- ======= side-user-info ======= -->
    <div class="side-user-info">
        <div class="user-photo-box">
            <div class="user-photo"><a href="personalCenter.html" target="_top" ><img src="/assets/home/imgs/photo_1.jpg"/></a></div>
            <div class="user-photo-info"><p><a href="index.html" target="_top" >信用分85</a></p></div>
        </div>

        <!-- ======= user-brief-box ======= -->
        <div class="user-brief-box">
            <div class="user-nickname"><a href="personalCenter.html" target="_top" class="a-style-1" ><p>飞飞哥</p></a></div>
            <div class="user-id"><p>ID&nbsp;80000696</p></div>

            <!-- ======= user-brief-list ======= -->
            <div class="user-brief-list">
                <ul>
                    <li class="brief-txt-1"><p>资&nbsp;&nbsp;&nbsp;料：</p></li>
                    <li class="brief-txt-2"><p>55分</p></li>
                    <li class="brief-txt-3"><a href="personalCenter_baseinfo.html" target="_top" ><p>完善</p></a></li>
                </ul>

                <ul>
                    <li class="brief-txt-1"><p>照&nbsp;&nbsp;&nbsp;片：</p></li>
                    <li class="brief-txt-2"><p>0张</p></li>
                    <li class="brief-txt-3"><a href="personalCenter_myPhoto.html" target="_top" ><p>上传</p></a></li>
                </ul>

                <ul>
                    <li class="brief-txt-1"><p>缘分币：</p></li>
                    <li class="brief-txt-2"><p>2个</p></li>
                    <li class="brief-txt-3"><a href="personalCenter_finance.html" target="_top" ><p>充值</p></a></li>
                </ul>
            </div>
            <!-- ======= /user-brief-list ======= -->
        </div>
        <!-- ======= /user-brief-box ======= -->
    </div>
    <!-- ======= /side-user-info ======= -->

    <div class="important-infoBox">
        <ul>
            <li><a href="{{url('message')}}" class="btn-3 btn-style-5" target="_top" ><p>我的消息</p></a><span class="menu-num-1 menu-numStyle-1"><p>6</p></span></li>
            <li><a href="personalCenter_whoSeen.html" class="btn-3 btn-style-5" target="_top" ><p>谁看过我</p></a><span class="menu-num-1 menu-numStyle-1"><p>99</p></span></li>
        </ul>
    </div>


    <!-- ======= user-menu-list ======= -->
    <div class="user-menu-list">
        <div class="jquery-accordion-menu red">
            <ul>
                <li class="{{$_info or ''}}"><a href="{{url('user/info')}}" target="_top"><b class="menu-title-1">基本资料</b></a></li>
                <li><a href="{{url('photo')}}" target="_top"><b class="menu-title-1">我的照片</b></a></li>
                <li class="{{$_seen or ''}}"><a href="{{url('seen')}}" target="_top"><b class="menu-title-1">谁看过我</b><span class="menu-num-1"><p>99</p></span></a></li>
                <li><a href="personalCenter_meSeen.html" target="_top"><b class="menu-title-1">我看过谁</b></a></li>
                <li onclick="window.open('{{url('pay')}}','_top')"><a href="#"><b class="menu-title-1">财务中心</b></a>
                    <ul class="submenu" style="display:{{$_pay or ''}};">
                        <li><a href="/pay/record/{{Auth::user()->id}}" target="_top"><p>充值记录</p></a></li>
                        <li><a href="/consume/record" target="_top"><p>消费记录</p></a></li>
                    </ul>
                </li>
                <li class="{{$_password or ''}}"><a href="{{url('/user/changePassword')}}" target="_top"><b class="menu-title-1">密码修改</b></a></li>
            </ul>
        </div>
    </div>
    <!-- ======= /user-menu-list ======= -->



</div>
<!-- ======= /sidebar-a ======= -->


</body>
</html>
