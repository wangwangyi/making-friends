@extends('system.layouts.app')

@section('title')
    <title>
        编辑内容-{{$article->title}}
    </title>
@stop
@section('css')
    <link rel="stylesheet" href="/assets/webupload/dist/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="/assets/webupload/style.css" />
@stop
@section('content')
    <div class="container">
        @include('system.layouts.msg')
        <div class="page-header">
            <h3>编辑内容</h3>
        </div>
        <form class="form-horizontal" action="{{route('admin.article.update',$article->id)}}" method="post">
            {!! csrf_field() !!}
            {!! method_field('put') !!}
            <div class="control-group">
                <label class="control-label" for="inputEmail">所属分类</label>
                <div class="controls">
                    <select name="category_id">
                        <option value="-1">分类名称</option>
                        @foreach ($categories as $category)
                            <option disabled>{{$category->name}}</option>
                            @foreach ($category->children as $cate)
                                <option value="{{$cate->id}}" @if($cate->id == $article->category_id) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPassword">标题</label>
                <div class="controls">
                    <input type="text" class="input-xlarge"  placeholder="标题不能为空" name="title" value="{{$article->title}}">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPassword">简介</label>
                <div class="controls">
                    <textarea rows="3" class="input-xlarge" name="desc">{{$article->desc}}</textarea>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="inputPassword">缩略图</label>
                <div class="controls">
                    <input type="text" style="display: none;" placeholder="缩略图" class="col-xs-10 col-sm-5" name="thumb" id="img" value="{{$article->thumb}}">
                    <input type="file" style="display: none;" id="thumb">
                    <button class="btn" id ="thumb_upload">
                        <i class="icon-picture" id="loading"></i>上传
                    </button>
                    <img id="img_show" class="editable img-responsive" src="{{$article->thumb}}" style="width:160px; height:140px;">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPassword">详情</label>
                <div class="controls">
                    <textarea rows="3"  id="editor_id" name="content">{{$article->content}}</textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPassword">相册</label>
                <div class="controls">

                    <ul class="thumbnails">

                        @foreach($article->galleries as $gallery)
                            <li class="span2">
                             <a href="{{$gallery->imgs}}" class="thumbnail">
                                 <img src="{{$gallery->imgs}}"/>
                             </a>
                                <button type="button" data-id="{{$gallery->id}}" class="close">&times;</button>
                            </li>
                        @endforeach
                    </ul>


                    <div id="uploader">
                        <div class="queueList">
                            <div id="dndArea" class="placeholder">
                                <div id="filePicker"></div>
                                <p>或将照片拖到这里，单次最多可选300张</p>
                            </div>
                        </div>
                        <div class="statusBar" style="display:none;">
                            <div class="progress">
                                <span class="text">0%</span>
                                <span class="percentage"></span>
                            </div>
                            <div class="info"></div>
                            <div class="btns">
                                <div id="filePicker2"></div>
                                <div class="uploadBtn">开始上传</div>
                            </div>
                        </div>

                        <div id="imgs"></div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">修改</button>
                </div>
            </div>
        </form>

    </div>
@stop

@section('js')
    <script src="/assets/upload/jquery.html5-fileupload.js"></script>
    <script src="/assets/upload/upload.js"></script>

    <script type="text/javascript" src="/assets/webupload/dist/webuploader.js"></script>
    <script type="text/javascript" src="/assets/webupload/upload.js"></script>

    <script src="/assets/kindeditor/kindeditor-min.js"></script>
    <script src="/assets/kindeditor/lang/zh_CN.js"></script>
    <script>
        $(function () {

            $(".close").click(function () {
                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/article/destroy_gallery",
                    data: {gallery_id: _this.data('id')},
                    success: function (data) {
                        console.log(data);
                        _this.parent("li").remove();
                    }
                });

            });
            KindEditor.ready(function (K) {
                window.editor = K.create('#editor_id');
            });

        })
    </script>
@stop