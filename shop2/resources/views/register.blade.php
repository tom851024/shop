<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>
	</head>

	<body>
		<form action="/postReg" method="POST">
			{{ csrf_field() }}
			<text>帳號: </text> <input type="text" name="userName" id="userName" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>密碼: </text> <input type="password" name="passWord" id="passWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>驗證密碼: </text> <input type="password" name="repassWord" id="repassWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>姓名: </text>
			<input type="text" name="name" id="name" required="required" /><br />
			<text>電話: </text>
			<input type="text" name="tel" id="tel" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />

			<text>住址: </text>
			<input type="text" name="address" id="address" required="required" /><br />
			
			<input type="submit"  value="送出" /><br />
			@if(isset($err))
				@if($err == '1')
					<text style = "color:red;">驗證密碼不符</text>
				@elseif($err == '2')
					<text style = "color:red;">帳號已存在</text>
				@endif

			
			@endif
		</form>	

		<a href="/">上一頁</a>
	</body>


</html>