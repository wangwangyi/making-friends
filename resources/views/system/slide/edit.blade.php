@extends('system.layouts.app')

@section('title')
    <title>
        编辑轮播图
    </title>
@stop

@section('content')
    <div class="container">
        @include('system.layouts.msg')
        <div class="page-header">
            <h3>轮播图编辑</h3>
        </div>
        <form class="form-horizontal" action="{{route('admin.slides.update',$slide->id)}}" method="post">
            {!! csrf_field() !!}
            {!! method_field('put') !!}
            <div class="control-group">
                <label class="control-label" for="inputEmail">内容选择</label>
                <div class="controls">
                    <select name="article_id">
                        <option value="">内容名称</option>
                        @foreach ($select_article as $category)
                            <option disabled>{{$category->name}}</option>
                            @foreach ($category->articles as $article)
                                <option value="{{$article->id}}" @if($slide->article_id == $article->id) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;{{$article->title}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="inputPassword">简介</label>
                <div class="controls">
                    <textarea rows="3" class="input-xlarge" name="desc">{{$slide->desc}}</textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPassword">缩略图</label>
                <div class="controls">
                    <input type="text" style="display: none;" placeholder="缩略图" class="col-xs-10 col-sm-5" name="thumb" id="img" value="{{$slide->thumb}}">
                    <input type="file" style="display: none;" id="thumb" >
                    <button class="btn" id ="thumb_upload">
                        <i class="icon-picture" id="loading"></i>上传
                    </button>
                    <img id="img_show" class="editable img-responsive" src="{{$slide->thumb}}" style="width:160px; height:140px;">
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
    <script src="/assets/upload/upload_slide.js"></script>

@stop