@extends('system.layouts.app')

@section('title')
    <title>
        站点信息
    </title>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="pull-left">站点信息</h3>
            </div>
        </div>
        @include('system.layouts.msg')
        <form class="form-horizontal offset2" method="POST" action="">

            {!! csrf_field() !!}
            <div class="control-group">
                <label class="control-label" >网站标题</label>
                <div class="controls">
                    <input type="text" name="title" value="{{$system->title}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >关键词</label>
                <div class="controls">
                    <input type="text" name="keyword" value="{{$system->keyword}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">简介</label>
                <div class="controls">
                    <input type="text" name="desc" value="{{$system->desc}}">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="inputPassword">网站图标</label>
                <div class="controls">

                    <input type="file" style="display: none;" id ="thumb_upload">
                    <button type="button" class="btn" id="ico">
                        <i class="icon-picture" id="loading"></i>上传
                    </button>
                    <img id="img_show" class="editable img-responsive" src="/favicon.ico" style="width:30px; height:30px;">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label">备案号</label>
                <div class="controls">
                    <input type="text" name="icp" value="{{$system->icp}}">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">版权信息</label>
                <div class="controls">
                    <input type="text" name="copyright" value="{{$system->copyright}}">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">公司名称</label>
                <div class="controls">
                    <input type="text" name="company" value="{{$system->title}}">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">电话</label>
                <div class="controls">
                    <input type="text" name="tel" value="{{$system->tel}}">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">邮箱</label>
                <div class="controls">
                    <input type="text" name="email" value="{{$system->email}}">
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">修改</button>
                </div>
            </div>
        </form>

    </div>
@stop

@section('js')
    <script src="/assets/upload/jquery.html5-fileupload.js"></script>
    <script>
        //文件上传
        $('#ico').on('click', function () {
            $("#thumb_upload").click();
            return false;
        });
        //文件上传
        var opts = {
            url: "/upload_icon",
            type: "POST",
            beforeSend: function () {
                $("#loading").attr("class", "am-icon-spinner am-icon-pulse");
            },
            success: function (result, status, xhr) {
//                console.log(result);
                if (result.status == "0") {
                    alert(result.info);
                    return false;
                }
                $("#loading").attr("class", "icon-picture");
                var src = '/favicon.ico?' + Math.random();
                $("#img_show").attr('src', src);
            },
            error: function (result, status, errorThrown) {
                alert('文件上传失败');
            }
        }
        $('#thumb_upload').fileUpload(opts);
    </script>
@endsection