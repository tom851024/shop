<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
	</head>


	<body>
		<form method="POST" action="/postLogin">
			{{ csrf_field() }}
			<text>Username: </text>
			<input type="text" name="userName" id="userName" /><br />
			<text>PassWord: </text>
			<input type="Password" name="passWord" id="passWord"><br />

			<!--
			<input class="tt" name="captcha">
			{!! captcha_img() !!}
			<br />
			-->
			<input type="submit" value="Login" /><br />

			@if(isset($lerr))
				@if($lerr == '1')
					<text style = "color:red;">Username not exist</text>
				@elseif($lerr == '2')
					<text style = "color:red;">Password error</text>
				@endif
			@endif

		</form>


	</body>

</html>