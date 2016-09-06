@extends('home.layouts.app')
@section('title')
    <title>充值记录_交友网</title>
    @stop
    @section('css')
    <link rel="stylesheet" type='text/css' href="/assets/home/css/dataTable/jquery.dataTables.css" />	

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
            <div class="sidebar-b record1">
                <div class="col-title-1"><h3>我的充值记录</h3></div>

                <div class="con-banner-1"><img src="/assets/home/imgs/con_banner_1.jpg"/></div>

                <!-- ======= list-midWrap-1 ======= -->
                <div class="list-midWrap-1">
                    <div class="list-txtWrap-1">
                        <img src="/assets/home/imgs/icon_1.png"/>
                        <div class="list-txtBox-1">
                            <div class="list-txt-1"><p>剩余缘分币</p></div>
                            <div class="list-txt-2"><strong>20个</strong></div>
                        </div>
                    </div>


                    <!-- ======= list-txtWrap-2 ======= -->
                    <div class="list-txtWrap-2">
                        <div class="col-title-2"><h4>我的充值记录</h4></div>

                        <!-- ======= list-tableBox-1 ======= -->
							 <table id="data" class="table tile" cellspacing="0" width="100%">
							    <thead>
							        <tr>
							            <th>充值金额</th>
							            <th>充值时间</th>
							            <th>充值方式</th>
							        </tr>
							    </thead>
							    <tbody></tbody>
							</table>
                        <!-- ======= /list-tableBox-1 ======= -->
                    </div>
                    <!-- ======= /list-txtWrap-2 ======= -->

                </div>
                <!-- ======= /list-midWrap-1 ======= -->

            </div>
 
		<script src="/assets/dataTable/jquery.dataTables.js"></script>
		<script src="/assets/home/js/table.js"></script>
	
            <!-- ======= /sidebar-b ======= -->
        </div>
        <!-- ======= /main-midWrap ======= -->
    </div>
    <!-- ======= main-wrap ======= -->
@stop