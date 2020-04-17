<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>

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
		<form action="/postReg" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.userName') }}: </text> 
			<input type="text" name="userName" maxlength="20" id="userName" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.password') }}: </text> 
			<input type="password" name="passWord" maxlength="20" id="passWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.confirmPass') }}: </text> 
			<input type="password" name="repassWord" maxlength="20" id="repassWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.name') }}: </text>
			<input type="text" name="name" id="name" maxlength="20" required="required" /><br />
			<text>{{ trans('messages.phone') }}: </text>
			<input type="text" name="tel" id="tel" maxlength="10" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />

			<text>{{ trans('messages.address') }}: </text>
			<input type="text" name="address" id="address" maxlength="50" required="required" /><br />


			<text>{{ trans('messages.auth') }}: </text>
			<input class="tt" name="captcha">
			<div class="form-group refresh">
				{!! captcha_img() !!}
			</div>
			<a href="javascript:void(0)" onclick="refreshCaptcha()">{{ trans('messages.refresh') }}</a>
			
			<br />


			
			<input type="submit"  value="{{ trans('messages.confirm') }}" /><br />

			@if(count($errors) > 0)
				<text style = "color:red;">{{ trans('messages.authFail') }}</text>
			@endif
		
			@if(session() -> has('err'))

				@if(session()->get('err') == '1')
					<text style = "color:red;">{{ trans('messages.conPassErr') }}</text>
				@elseif(session()->get('err') == '2')
					<text style = "color:red;">{{ trans('messages.userEx') }}</text>
				@elseif(session()->get('err') == '3')
					<text style = "color:red;">{{ trans('messages.illegel') }}</text>
				@endif
			@endif

			
		
		</form>	

		<a href="/">{{ trans('messages.lastPage') }}</a>
	</body>


</html>