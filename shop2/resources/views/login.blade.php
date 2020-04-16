<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript">
			
			function refreshCaptcha(){
				$.ajax({
					url: "/refreshCaptcha",
					type: 'get',
					dataType: 'html',
					success: function(json){
						$('.refresh').html(json);
					},
					error: function(data){
						alert('Try Again');
					}
				});
			}
		</script>
	</head>


	<body>
		<form method="POST" action="/postLogin">
			{{ csrf_field() }}
			<text>{{ trans('messages.userName') }}: </text>
			<input type="text" name="userName" id="userName" /><br />
			<text>{{ trans('messages.password') }}: </text>
			<input type="Password" name="passWord" id="passWord"><br />


			
			<text>{{ trans('messages.auth') }}: </text>
			<input class="tt" name="captcha">
			<div class="form-group refresh">
				{!! captcha_img() !!}
			</div>
			<a href="javascript:void(0)" onclick="refreshCaptcha()">{{ trans('messages.refresh') }}</a>
			
			<br />

			<!-- <img src="{{ captcha_src() }}"> -->


			<input type="submit" value="登入" /><br />

			

			@if(count($errors) > 0)
				<text style = "color:red;">{{ trans('messages.authFail') }}</text>
			@endif

			@if(session() -> has('err'))

				@if(session()->get('err') == '1')
					<text style = "color:red;">{{ trans('messages.userNex') }}</text>
				@elseif(session()->get('err') == '2')
					<text style = "color:red;">{{ trans('messages.passErr') }}</text>
				@elseif(session()->get('err') == '3')
					<text style = "color:red;">{{ trans('messages.illegel') }}</text>
				@endif
			@endif

		</form>
		<a href="/">{{ trans('messages.home') }}</a>

	</body>

</html>