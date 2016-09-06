@extends('home.layouts.app')

@section('css')
    <link rel="stylesheet" href="/assets/croppic/assets/css/main.css"/>
    <link rel="stylesheet" href="/assets/croppic/assets/css/croppic.css"/>
@endsection
@section('content')
    <div class="container">
        <div class="row margin-bottom-40">
            <div class="col-md-12">
                <h1>用户上传图像</h1>
            </div>
        </div>

        <div class="row margin-bottom-40" style="width:200px;height:200px;">
            <div class=" col-md-3">
                <div id="cropContainerEyecandy"></div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="/assets/croppic/croppic.min.js"></script>

    <script>

        var eyeCandy = $('#cropContainerEyecandy');
        var croppedOptions = {
            uploadUrl: 'upload',
            cropUrl: 'crop',
            cropData:{
                'width' : eyeCandy.width(),
                'height': eyeCandy.height()
            }
        };
        var cropperBox = new Croppic('cropContainerEyecandy', croppedOptions);


    </script>

@endsection


