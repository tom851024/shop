<!DOCTYPE html>
<html>
	<head>
		<title>Owner Login</title>
	</head>

	<body>
		<form action="/postOLogin" method="POST">
			{{ csrf_field() }}
			<text>帳號</text>
			<input type="text" name="userName" id="userName" required="required" /><br />
			<text>密碼</text>
			<input type="password" name="passWd" id="passWd" required="required" /><br />
			<input type="submit" value="登入" />

		</form>

		@if(isset($lerr))

			@if($lerr == '1')
				<text style = "color:red;">帳號不存在</text>
			@elseif($lerr == '2')
				<text style = "color:red;">密碼錯誤</text>
			@endif


		@endif
	</body>

</html>