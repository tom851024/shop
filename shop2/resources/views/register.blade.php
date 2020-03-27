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
			<text>Password: </text> <input type="password" name="passWord" id="passWord"><br />
			<text>Re Password: </text> <input type="password" name="repassWord" id="repassWord"><br />
			<input type="submit" value="submit" /><br />
			@if(isset($err))
				@if($err == '1')
					<text style = "color:red;">Your rePassword is not common with password!</text>
				@elseif($err == '2')
					<text style = "color:red;">Your username is existed</text>
				@endif

			
			@endif
		</form>	
	</body>


</html>