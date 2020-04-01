<!DOCTYPE html>
<html>
	<head>
		<title>Edit Page</title>
	</head>


	<body>
		<text>編輯資料</text><br />
		<form method="POST" action="/shop2/public/index.php/postEdit">
			{{ csrf_field() }}
			<text>姓名: </text>
			<input type="text" name="name" id="name" value="{{ $account->Name }}" required="required" /><br />

			<text>電話: </text>
			<input type="text" name="tel" id="tel" value="{{ $account->Phone }}" required="required" /><br />

			<text>住址: </text>
			<input type="text" name="address" id="address" value="{{ $account->Address }}" required="required" /><br />

			<input type="submit" value="更改" />
		</form>
		<a href="/editPasswd">修改密碼</a>
		<a href="/">上一頁</a>

	</body>

</html>