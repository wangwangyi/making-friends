@extends('system.layouts.app')

@section('title')
    <title>
        分类
    </title>
@stop

@section('content')
    <div class="container">

        @include('system.layouts.msg')
        <a href="#save" role="button" class="btn btn-primary pull-right" data-toggle="modal" style="margin-top: 10px;">Save</a>

        <div id="save" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">新增分类</h3>
            </div>

            <form class="form-horizontal" role="form" action="{{route('admin.category.store')}}" method="post">
                {!! csrf_field() !!}
                <div class="tab-content">

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">顶级栏目：</label>
                        <div class="controls">
                            <select name="parent_id">
                                <option value="0">顶级分类</option>
                                @foreach ($categories as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">分类名称：</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge"  name="name">
                        </div>
                    </div>

                    <div class="form-group" style="text-align: center">
                        <button type="reset" class="btn btn-default">
                            Cancel
                        </button>
                        &nbsp; &nbsp; &nbsp;
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>编号</th>
                <th>分类名称</th>
                <th colspan="3">操作</th>
            </tr></thead>
            <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{route('admin.category.edit',$category->id)}}">
                            <button class="btn"><i class="icon-pencil"></i></button>
                        </a>
                    </div>
                    <div class='btn-group'>
                        <a href="{{route('admin.category.destroy',$category->id)}}" data-method="delete"
                           data-token="{{csrf_token()}}">
                            <button class="btn"><i class="icon-trash"></i></button>
                        </a>
                    </div>
                </td>
            </tr>

            @foreach ($category->children as $cate)
                <tr>
                    <td>{{$cate->id}}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cate->name}}</td>
                    <td>
                        <div class='btn-group'>
                            <a href="{{route('admin.category.edit',$cate->id)}}">
                                <button class="btn"><i class="icon-pencil"></i></button>
                            </a>
                        </div>
                        <div class='btn-group'>
                            <a href="{{route('admin.category.destroy',$cate->id)}}" data-method="delete"
                               data-token="{{csrf_token()}}">
                                <button class="btn"><i class="icon-trash"></i></button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            @endforeach
            </tbody>
        </table>

    </div>
@stop

