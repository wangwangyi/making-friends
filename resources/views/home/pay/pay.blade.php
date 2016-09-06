@extends('home.layouts.app')
@section('title')
	<title>财务中心_交友网</title>
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
			<div class="sidebar-b">
				<div class="col-title-1"><h3>财务中心</h3></div>

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
						<div class="col-title-2"><h4>我要充值</h4></div>

						<!-- ======= list-inputBox-1 ======= -->
						<form id = 'pay'>
							<div class="list-inputBox-1">
								<ul id='pay_much'>
									<li><input type="radio" value = '5'  name='pay_nuch'/><p>5元</p></li>
									<li><input type="radio" value = '10'  name='pay_nuch'/><p>10元</p></li>
									<li><input type="radio" value = '30'  name='pay_nuch'/><p>30元</p></li>
									<li><input type="radio" value = '50'  name='pay_nuch'/><p>50元</p></li>
									<li><input type="radio" value = '100'  name='pay_nuch'/><p>100元</p></li>
								</ul>

								<div class="list-input-1"><input id = 'custom'  name='use_nuch'  type="text" value="自定义"/><p>元</p></div>
							</div>
							<!-- ======= /list-inputBox-1 ======= -->

							<div class="col-title-2 col-style-1"><h4>请选择支付方式</h4></div>

							<!-- ======= list-inputBox-2 ======= -->
							<div class="list-inputBox-2">
								<ul>
									<li><img src="/assets/home/imgs/pay_img_1.jpg"/></li>
									<li><input type="radio" value= 'alipay' name ='pay_type'/><p>支付宝支付</p></li>
								</ul>

								<ul>
									<li><img src="/assets/home/imgs/pay_img_2.jpg"/></li>
									<li><input type="radio" value= 'wxpay' name ='pay_type'/><p>微信支付</p></li>
								</ul>
							</div>
							<!-- ======= /list-inputBox-2 ======= -->

							<!--  <a href="personalCenter_finance2.html" target="_self" class="btn-1 btn-style-3" >下一步</a> -->
							<a id = 'send' href='javascript:void(0)' target="_self" class="btn-1 btn-style-3" >下一步</a>
						</form>
					</div>
					<!-- ======= /list-txtWrap-2 ======= -->

				</div>
				<!-- ======= /list-midWrap-1 ======= -->

			</div>
			<!-- ======= /sidebar-b ======= -->
		</div>
		<!-- ======= /main-midWrap ======= -->
	</div>
	<!-- ======= main-wrap ======= -->
@stop

@section('js')
	<script>
		var dat = new Object();
		dat.form = get.Id('pay');
		dat.pay_type = get.Name('pay_type');
		dat.form.act = null;
		dat.flag = 0;
		var i = 0;
		//--判断用户之前是否选择了，如果选择了则用默认方式提交
		if(null != getCookie('actionindex'))
		{
			var inds = getCookie('actionindex');
			dat.pay_type[inds].checked = true;
		}
		//--支付类型
		while (i < dat.pay_type.length)
		{

			(function(index){
				dat.pay_type[i] .onclick = function() {
					console.log(index);
					if(true == dat.pay_type[index].checked)
					{

						switch (dat.pay_type[index].value)
						{

							case 'alipay' :
							{
								setCookie('action','/pay/alipay');
								setCookie('actionindex',index);
								break;
							}
							case 'wxpay' :
							{
								setCookie('action','/pay/wx');
								setCookie('actionindex',index);
								break;
							}
						}
					}
				}
			})(i);
			i = -~i;
		}

		//--当选中自定义付款的时候 不允许 输入其他的字符
		get.Id('custom').onkeyup = function(e)
		{
			return this.value=this.value.replace(/[^\0-9\.]/g,'');
		}
		get.Id('custom').onpaste = function(e)
		{

			return this.value=this.value.replace(/[^\0-9\.]/g,'');
		}
		get.Id('custom').onpaste = function(e)
		{

			return this.value=this.value.replace(/[^\0-9\.]/g,'');
		}
		get.Id('custom').onkeydown = function(e)
		{

			return this.value=this.value.replace(/[^\0-9\.]/g,'');
		}

		//--当选择自定义付款类型的时候
		get.Id('custom').onclick = function ()
		{
			if(this.value.indexOf('自定义') >= 0)
			{
				this.value = '';
				return ;
			}

		}

		get.Id('custom').onblur = function ()
		{
			this.value = this.value.length <= 0 ? '自定义' : this.value;
		}

		get.Id('send').onclick  = function ()
		{

			dat.form.action = getCookie('action');
			dat.pay_much = get.Tag(get.Id('pay_much'),'input');
			var f = false;
			var w = 0;
			while(w < dat.pay_much.length)
			{
				if (true == dat.pay_much[w].checked) { f = true; }
				w = -~w;
			}
			if((false == f) && get.Id('custom').value == '自定义' || get.Id('custom').value == '0' || (get.Id('custom').value.indexOf(' ') >= 0)) {
				console.log('---');
				layer.tips('请填写充值金额',get.Id('custom'));
				//layer.alert('请选择充值金额', {icon: 6});
				return;
			}
			if(get.Name('_token').length < 1){
				try{
					var input = add.Dom(dat.form,'input');
					add.Attr(input,'name','_token');
					add.Attr(input,'type','hidden');
					add.Attr(input,'value','{{csrf_token()}}');
				}catch(e){

				}
			}
			dat.form.method = 'post';
			dat.form.submit();
		}
	</script>

@endsection
