@extends('system.layouts.app')

@section('title')
    <title>
        分类
    </title>
@stop

@section('content')
    <div class="container">

        @include('system.layouts.msg')
        @ability('admin,owner', 'admin,owner')
        <a href="{{route('admin.slides.create')}}" role="button" class="btn btn-primary pull-right"  style="margin-top: 10px;">Save</a>
        @endability

        <table class="table">
            <thead>
            <tr>
                <th>编号</th>
                <th>内容标题</th>
                <th>图片展示</th>
                <th>描述</th>
                <th colspan="3">操作</th>
            </tr></thead>
            <tbody>
            @foreach ($slides as $slide)
                <tr>
                    <td>{{$slide->id}}</td>
                    <td>{{$slide->article->title}}</td>
                    <td><img src="{{$slide->thumb}}" style="width:100px; height:100px"></td>
                    <td>{{$slide->desc}}</td>
                    <td>
                        <div class='btn-group'>
                            <a href="{{route('admin.slides.edit',$slide->id)}}">
                                <button class="btn"><i class="icon-pencil"></i></button>
                            </a>
                        </div>
                        @ability('admin,owner', 'admin,owner')
                        <div class='btn-group'>
                            <button data-id="{{$slide->id}}" class="btn del"><i class="icon-trash"></i></button>
                        </div>
                        @endability
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop

@section('js')
    <script>
        $(function (){
            $(".del").click(function(){
                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/slide/delete",
                    data: {slide: _this.data('id')},
                    success: function (data){
                        console.log(data);
                        _this.parent().parent().parent().fadeOut(600);
                    }
                });
            })
        })
    </script>
@stop