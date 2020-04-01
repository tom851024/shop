<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
	</head>


	<body>
		<form method="POST" action="/postLogin">
			{{ csrf_field() }}
			<text>帳號: </text>
			<input type="text" name="userName" id="userName" /><br />
			<text>密碼: </text>
			<input type="Password" name="passWord" id="passWord"><br />

			<!--
			<input class="tt" name="captcha">
			{!! captcha_img() !!}
			<br />
			-->
			<input type="submit" value="登入" /><br />

			@if(isset($lerr))
				@if($lerr == '1')
					<text style = "color:red;">帳號不存在</text>
				@elseif($lerr == '2')
					<text style = "color:red;">密碼錯誤！！</text>
				@endif
			@endif

		</form>
		<a href="/">回到首頁</a>

	</body>

</html>