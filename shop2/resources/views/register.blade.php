<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>
	</head>

	<body>
		<form action="/shop2/public/index.php/postReg" method="POST">
			{{ csrf_field() }}
			<text>Username: </text> <input type="text" name="userName" id="userName" required="required" /><br />
			<text>Password: </text> <input type="password" name="passWord" id="passWord" required="required" /><br />
			<text>Re Password: </text> <input type="password" name="repassWord" id="repassWord" required="required" /><br />
			<text>Name: </text>
			<input type="text" name="name" id="name" required="required" /><br />

			<text>Telephone: </text>
			<input type="text" name="tel" id="tel" required="required" /><br />

			<text>Address: </text>
			<input type="text" name="address" id="address" required="required" /><br />
			
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