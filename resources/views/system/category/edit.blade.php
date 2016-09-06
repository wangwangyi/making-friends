@extends('system.layouts.app')

@section('title')
    <title>
        编辑分类
    </title>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h3 class="pull-left">编辑分类</h3>
            </div>
        </div>

        @include('system.layouts.msg')
        <div class="row">
            <form class="form-horizontal" role="form" action="{{route('admin.category.update',$category->id)}}" method="post">
                {!! csrf_field() !!}
                {!! method_field('put') !!}
                <div class="tab-content">

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">顶级栏目：</label>
                        <div class="controls">
                            <select name="parent_id">
                                <option value="0">顶级分类</option>
                                @foreach ($categories as $cate)
                                    <option value="{{$cate->id}}" @if($cate->id  == $category->parent_id) selected @endif>{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="inputEmail">分类名称：</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge"  name="name" value="{{$category->name}}">
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
    </div>
@stop