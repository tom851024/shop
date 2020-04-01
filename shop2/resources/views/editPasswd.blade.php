<!DOCTYPE html>
<html>
	<head>
		<title>Edit Password</title>
	</head>


	<body>

		<text>修改密碼</text><br />
		<form method="POST" action="/edPassPost">
			{{ csrf_field() }}
			<text>新密碼:</text> 
			<input type="Password" name="newPasswd" required="required" /><br />

			<text>確認密碼</text>
			<input type="Password" name="reNewPasswd" required="required" /><br />

			<text>舊密碼</text>
			<input type="Password" name="passwd" required="required" /><br />

			<input type="submit" value="確定">
		</form>
		@if(isset($err))
			@if($err == '1')
				<text>密碼錯誤</text>
			@elseif($err == '2')
				<text>驗證密碼錯誤</text>
			@endif
		@endif
	</body>

	<a href="/">回到首頁</a>

</html>