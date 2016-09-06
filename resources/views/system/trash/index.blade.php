@extends('system.layouts.app')

@section('title')
    <title>
        内容回收站
    </title>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="pull-left">回收站列表</h3>
            </div>
        </div>
        @include('system.layouts.msg')
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>内容标题</th>
                <th>所属栏目</th>
                <th>删除日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category->name}}</td>
                    <td>{{$article->deleted_at}}</td>
                    <td>
                        <p>
                            <a href="javascript:void(0);" data-id="{{$article->id}}" class="btn btn-primary trash">还原</a>
                            <a href="/admin/trash/delete/{{$article->id}}" data-token="{{csrf_token()}}" data-method="delete" data-confirm="你确定要删除吗！" class="btn btn-danger del">删除</a>
                        </p>
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

            $(".trash").click(function(){
                var _this = $(this);
                $.ajax({
                    type: "get",
                    url: "/admin/trash/restore",
                    data: {article_id: _this.data('id')},
                    success: function (data){
                        console.log(data);
                        _this.parent().parent().parent().fadeOut(600);
                    }
                });
            })
        })
    </script>
@stop