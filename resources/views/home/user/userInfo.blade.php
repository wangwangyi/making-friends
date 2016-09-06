@extends('home.layouts.app')
@section('title')
    <title>基本资料_交友网</title>
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
            <div class="col-title-1"><h3>基本资料</h3></div>

            <!-- ======= register-midWrap-2 ======= -->
            <div class="register-midWrap-2">
                <div class="register-txt-1"><p>个人信息再完善一点，我们会让结果更合您的心意。</p></div>
                <li class="register-promptTxt" id="real"><p class="real">*为保证资料真实有效，灰色字体信息不得随意修改！</p></li>

                <!-- ======= register-txtBox-2 ======= -->

                    <div class="register-txtBox-2" id="changeInfo">
                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>昵称</dt>
                                    <dd class="register-dd-3{{ $errors->has('name') ? ' has-error' : '' }}"><input name="name" id="name" type="text" value="{{$info->name}}" /></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; ">
                                @if ($errors->has('name'))
                                    <p>*{{ $errors->first('name') }}</p>
                                @endif
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>性别</dt>
                                    <dd class="register-dd-1"><span class="real">
                                        @if($info->sex == 1) 男
                                            @elseif($info->sex == 0) 女
                                            @else 其他
                                            @endif
                                    </span></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>生日</dt>
                                    <dd class="register-dd-1"><span class="real">{{date("Y年-m月-d日",$info->birthday)}}</span></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>年龄</dt>
                                    <dd class="register-dd-1"><span class="real">{{get_age(date("Y",$info->birthday),date("m",$info->birthday),date("d",$info->birthday))}}岁</span></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>生肖</dt>
                                    <dd class="register-dd-1"><span class="real">{{get_animal(date("Y",$info->birthday))}}</span></dd>
                                </dl>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                            </li>

                        </ul>

                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>星座</dt>
                                    <dd class="register-dd-1"><span class="real">{{get_constellation(date("m",$info->birthday),date("d",$info->birthday))}}</span></dd>
                                </dl>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>常住地</dt>
                                    <dd class="register-dd-1">
                                        <select name="">
                                            <option>湖北武汉</option>
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; "><p>*必填项，错误提示信息！</p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt">
                                <dl>
                                    <dt>婚姻状况</dt>
                                    <dd class="register-dd-1"><input name="marital_status" type="radio" value="1" @if($info->marital_status == 1) checked @endif/><span>未婚</span></dd>
                                    <dd class="register-dd-2"><input name="marital_status" type="radio" value="2" @if($info->marital_status == 2) checked @endif/><span>离异</span></dd>
                                    <dd class="register-dd-2"><input name="marital_status" type="radio" value="3" @if($info->marital_status == 3) checked @endif/><span>丧偶</span></dd>
                                </dl>
                            </li>

                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>身高</dt>
                                    <dd class="register-dd-1">
                                        <select name="height" id="height">
                                            <!-- @for($i=129;$i<226;$i++) -->
                                                <option value="{{$i+1}}" @if($i+1 == $info->height) selected @endif>
                                                    {{$i+1}}厘米
                                                </option>
                                           <!--  @endfor  -->
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>学历</dt>
                                    <dd class="register-dd-1">
                                        <select name="education" id="education">
                                               <!--  @foreach ($education_status as $k=>$v) -->
                                             <option value="{{$k}}" @if($info->education == $k) selected @endif>{{$v}}</option>
                                            <!--   @endforeach -->
                                         </select>
                                    </dd>
                                </dl>
                            </li>

                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>月薪</dt>
                                    <dd class="register-dd-1">
                                        <select name="salary" id="salary">
                                            @foreach($salary_status as $k=>$v)
                                                <option value="{{$k}}" @if($info->salary == $k) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>血型</dt>
                                    <dd class="register-dd-1">
                                        <select name="blood" id="blood">
                                            <option value="">--请选择--</option>
                                            @foreach($blood_type as $k=>$v)
                                                <option value="{{$k}}" @if($info->blood == $k) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>民族</dt>
                                    <dd class="register-dd-1">
                                        <select name="nation">
                                            <option value="">--请选择--</option>
                                            @foreach($nation_status as $k=>$v)
                                                <option value="{{$k}}" @if($info->nation == $k) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>户口</dt>
                                    <dd class="register-dd-1">
                                        <select name="">
                                            <option>农业户口</option>
                                            <option>非农</option>
                                            <option>北京户口</option>
                                            <option>上海户口</option>
                                            <option>广东户口</option>
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>住房情况</dt>
                                    <dd class="register-dd-1">
                                        <select name="house" id="house">
                                            <option value="">--请选择--</option>
                                            @foreach($house_status as $k=>$v)
                                                <option value="{{$k}}" @if($info->house == $k) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>购车情况</dt>
                                    <dd class="register-dd-1">
                                        <select name="auto" id="auto">
                                            <option value="">--请选择--</option>
                                            @foreach ($auto_status as $k=>$v)
                                                <option value="{{$k}}" @if($info->auto == $k) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">

                                <dl>
                                    <dt>邮箱</dt>
                                    <dd class="register-dd-3">
                                        <span class="real">{{$info->email}}</span>
                                    </dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt"><p>*注册后不可更改</p></li>
                        </ul>

                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>自我介绍</dt>
                                    <dd class="register-dd-3"><textarea name="" cols="" rows="5" >这里是注册的时候填写的信息！</textarea></dd>
                                </dl>
                            </li>
                            <li class="register-promptTxt register-style-5" style=" display:block; "><p>*必填项，错误提示信息！</p></li>
                        </ul>


                        <ul>
                            <li class="register-mainTxt register-style-2">
                                <dl>
                                    <dt>&nbsp;</dt>
                                    <dd><a href="#" target="_self" data-id="{{$home->id}}" class="register-btn" >保存</a></dd>
                                </dl>
                            </li>
                        </ul>
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
<script src="/assets/home/js/change_info.js"></script>
@stop

