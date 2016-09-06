<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户注册_交友网</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
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
    <div class="main-midWrap inner">

        <!-- ======= register-wrap ======= -->
        <div class="register-wrap">
            <div class="register-wrap-1">
                <div class="register-bgImg-1"></div>

                <div class="register-txtBox-1">
                    <dl>
                        <dt>最真实的交友平台</dt>
                        <dd>今年找一个靠谱的女朋友回家！</dd>
                    </dl>

                    <dl>
                        <dt>成功率高</dt>
                        <dd>千万成功会员，见证幸福！</dd>
                    </dl>
                </div>
            </div>


            <!-- ======= register-inputs-wrap ======= -->
            <div class="register-inputs-wrap">
                <div class="register-title-1"><img src="/assets/home/imgs/register_title_1.png"/></div>
                <form method="post" action="{{ url('/register') }}">
                    {!! csrf_field() !!}
                <!-- ======= register-midWrap-1 ======= -->
                <div class="register-midWrap-1">
                    <div class="register-txt-1"><p>花点时间填写真实信息，我们会让结果更合您的心意。</p></div>

                    <!-- ======= register-txtBox-2 ======= -->
                    <div class="register-txtBox-2">
                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>我是</dt>
                                    <dd class="register-dd-1"><input name="sex" type="radio" value="1" checked="checked"/><span>男</span></dd>
                                    <dd class="register-dd-2"><input name="sex" type="radio" value="0" /><span>女</span></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2" id="birthday">
                                <dl>
                                    <dt>生日</dt>
                                    <dd class="register-dd-4">
                                        <select name="year" class="year">
                                            <option value="">请选择 年</option>
                                            @for($i=1939;$i<2000;$i++)
                                            <option value="{{$i+1}}" @if($i+1 == 1990) selected @endif>{{$i+1}}年</option>
                                        @endfor
                                        </select>
                                    </dd>
                                    <dd class="register-dd-5">
                                        <select name="month" class="month">
                                            <option value="">请选择 月</option>
                                            @for($i=0;$i<12;$i++)
                                                @if($i<9)
                                                    <option value="0{{$i+1}}" @if($i+1 == 01) selected @endif>{{$i+1}}月</option>
                                                    @else
                                            <option value="{{$i+1}}">{{$i+1}}月</option>
                                                @endif
                                                @endfor
                                        </select>
                                    </dd>
                                    <dd class="register-dd-5">
                                        <select name="day" class="day">
                                            <option value="">请选择 日</option>
                                            @for($i=0;$i<31;$i++)
                                                @if($i<9)
                                                    <option value="0{{$i+1}}" @if($i+1 == 01) selected @endif>{{$i+1}}日</option>
                                                    @else
                                                    <option value="{{$i+1}}">{{$i+1}}日</option>
                                                    @endif
                                                @endfor
                                        </select>
                                    </dd>
                                </dl>
                                <input type="hidden" class="birthday" name="birthday" value=""/>
                            </li>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>常住地</dt>
                                    <dd class="register-dd-1">
                                        <div id="distpicker5">
                                            <div>
                                                <label class="sr-only" for="province10"></label>
                                                <select class="form-control provice" id="province10" name="provice"></select>
                                            </div>
                                            <div>
                                                <label class="sr-only" for="city10"></label>
                                                <select class="form-control city" id="city10" name="city"></select>
                                            </div>
                                            <div>
                                                <label class="sr-only" for="district10"></label>
                                                <select class="form-control area" id="district10" name="area"></select>
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; ">
                                @if ($errors->has('provice','city','area'))
                                    <p>*地区不能为空！</p>
                                @endif
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>婚姻状况</dt>
                                    <dd class="register-dd-1"><input name="marital_status" type="radio" value="1" checked="checked"/><span>未婚</span></dd>
                                    <dd class="register-dd-2"><input name="marital_status" type="radio" value="2" /><span>离异</span></dd>
                                    <dd class="register-dd-2"><input name="marital_status" type="radio" value="3" /><span>丧偶</span></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; "><p class="right"> </p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>身高</dt>
                                    <dd class="register-dd-1">
                                        <select name="height">
                                            @for($i=129;$i<226;$i++)
                                                <option value="{{$i+1}}" @if($i+1 == 175) selected @endif>
                                                    {{$i+1}}厘米
                                                </option>
                                            @endfor
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; "><p class="right"> </p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>学历</dt>
                                    <dd class="register-dd-1">
                                        <select name="education">
                                            <option value="10">高中中专及以下</option>
                                            <option value="20">大专</option>
                                            <option value="30" selected>本科</option>
                                            <option value="40">双学士</option>
                                            <option value="50">硕士</option>
                                            <option value="60">博士</option>
                                            <option value="70">博士后</option>
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; "><p class="right"> </p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>月薪</dt>
                                    <dd class="register-dd-1">
                                        <select name="salary">
                                            <option value="10">2000元以下</option>
                                            <option value="20">2000-5000元</option>
                                            <option value="30" selected>5000-10000元</option>
                                            <option value="40">10000-20000元</option>
                                            <option value="50">20000元以上</option>
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; "><p class="right"> </p></li>
                        </ul>


                    </div>
                    <!-- ======= /register-txtBox-2 ======= -->

                    <!-- ======= register-txtBox-2 ======= -->
                    <div class="register-txtBox-2 register-style-3">
                        <div class="register-title-2">真实的我，真实的爱！</div>
                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>邮箱</dt>
                                    <dd class="register-dd-3{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input name="email" id="email" type="text" value="{{ old('email') }}"/></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; ">
                                @if ($errors->has('email'))
                                    <p>*{{ $errors->first('email') }}</p>
                                @endif
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>创建密码</dt>
                                    <dd class="register-dd-3{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input name="password" id="password" type="password" /></dd>
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
                                    <dd class="register-dd-3{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <input name="password_confirmation" type="password" /></dd>
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
                                    <dt>昵称</dt>
                                    <dd class="register-dd-3{{ $errors->has('name') ? ' has-error' : '' }}"><input name="name" id="name" type="text" value="{{ old('name') }}"/></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; ">
                                @if ($errors->has('name'))
                                        <p>*{{ $errors->first('name') }}</p>
                                @endif
                            </li>
                        </ul>


                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>&nbsp;</dt>
                                    <dd>
                                        <input class="submit" type="submit" style="display: none;"/>
                                       <a href="javascript:void(0);" class="register-btn" >免费注册</a>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>&nbsp;</dt>
                                    <dd class="register-dd-8">
                                        <input name="agree" type="checkbox" value="" class="consent"/>
                                        <span>我同意<a href="#" target="_self" >注册条款</a></span></dd>
                                </dl>
                            </li>
                        </ul>

                        <div class="register-warning-1">我承诺年满18岁、单身、抱着严肃的态度，真诚寻找另一半</div>

                    </div>
                    <!-- ======= /register-txtBox-2 ======= -->

                </div>
                <!-- ======= /register-midWrap-1 ======= -->
                    </form>
            </div>
            <!-- ======= /register-inputs-wrap ======= -->

        </div>
        <!-- ======= /register-wrap ======= -->

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
<script src="/assets/address/js/distpicker.data.js"></script>
<script src="/assets/address/js/distpicker.js"></script>
<script src="/assets/address/js/main.js"></script>
<script src="/assets/home/js/register.js"></script>

</body>
</html>
