@extends('system.layouts.app')

@section('title')
    <title>
        内容
    </title>
@stop

@section('content')
    <div class="container">

        <p>
        <p>
          {{--  @ability('admin,owner', 'admin,owner')--}}
            <button class="btn btn-small pull-right btn-danger" type="button" id="destroy_checked">多选删除</button>
        {{--    @endability--}}
            <a href="{{route('admin.article.create')}}"><button class="btn btn-small btn-primary pull-right" type="button" style="margin-right: 5px;">新增内容</button></a>
        </p>

        <form class="form-inline" method="get">
            <input type="text" name="title" class="input-large" placeholder="请输入内容名称" value="{{ Request::input('title') }}">
            <select name="category_id">
                <option value="-1">分类</option>
                @foreach ($categories as $category)
                    <option disabled>{{$category->name}}</option>
                    @foreach ($category->children as $cate)
                        <option value="{{$cate->id}}" @if($cate->id == Request::input('category_id')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</option>
                    @endforeach
                @endforeach
            </select>
            <button type="submit" class="btn">Search</button>
        </form>

        </p>
        @include('system.layouts.msg')

        <table class="table table-hover">
            <thead>
            <tr>
                <th class="table-check"><input type="checkbox" id="CheckedAll"></th>
                <th>ID</th>
                <th>内容标题</th>
                <th>所属栏目</th>
                <th>更新日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
            <tr>
                <td><input type="checkbox" type="checkbox" value="{{$article->id}}" class="checked_id"
                           name="checked_id[]"/></td>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->category->name}}</td>
                <td>{{$article->updated_at}}</td>
                <td>
                    <p>
                        <a href="{{route('admin.article.edit',$article->id)}}" class="btn btn-primary">编辑</a>
                      {{--  @ability('admin,owner', 'admin,owner')--}}
                        <a href="javascript:void(0);" data-id="{{$article->id}}" data-method="delete" class="btn btn-danger del">删除</a>
                       {{-- @endability--}}
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
            //全选,反选
            $("#CheckedAll").click(function () {
                $(':checkbox').prop("checked", this.checked);
            });

            //删除所选
            $('#destroy_checked').click(function () {
                var length = $(".checked_id:checked").length;
                if (length == 0) {
                    alert("您必须至少选中一条!");
                    return false;
                }

                var checked_id = $(".checked_id:checked").serialize();

                $.ajax({
                    type: "DELETE",
                    url: "/admin/article/destroy_checked",
                    data: checked_id,
                    success: function () {
                        location.href = location.href;
                    }
                });
            });


            $(".del").click(function(){
                var _this = $(this);
                $.ajax({
                    type: "delete",
                    url: "/admin/article/delete",
                    data: {article_id: _this.data('id')},
                    success: function (){
                        _this.parent().parent().parent().fadeOut(600);
                    }
                });
            })
        })
    </script>
@stop