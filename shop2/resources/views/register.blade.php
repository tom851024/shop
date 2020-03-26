<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>
	</head>

	<body>
		<form action="/shop2/public/index.php/postReg" method="POST">
			{{ csrf_field() }}
			<text>Username: </text> <input type="text" name="userName" id="userName"><br />
			<text>Password: </text> <input type="text" name="passWord" id="passWord"><br />
			<text>Re Password: </text> <input type="text" name="repassWord" id="repassWord"><br />
			<input type="submit" value="submit" />
			@if(isset($err))
			<text>Your rePassword is not common with password!</text>
			@endif
		</form>	
	</body>


</html>