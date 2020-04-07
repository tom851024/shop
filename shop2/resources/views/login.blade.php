<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
	</head>


	<body>
		<form method="POST" action="/postLogin">
			{{ csrf_field() }}
			<text>{{ trans('messages.userName') }}: </text>
			<input type="text" name="userName" id="userName" /><br />
			<text>{{ trans('messages.password') }}: </text>
			<input type="Password" name="passWord" id="passWord"><br />

			<!--
			<input class="tt" name="captcha">
			{!! captcha_img() !!}
			<br />
			-->
			<input type="submit" value="登入" /><br />

			@if(isset($lerr))
				@if($lerr == '1')
					<text style = "color:red;">{{ trans('messages.userNex') }}</text>
				@elseif($lerr == '2')
					<text style = "color:red;">{{ trans('messages.passErr') }}</text>
				@endif
			@endif

		</form>
		<a href="/">{{ trans('messages.home') }}</a>

	</body>

</html>