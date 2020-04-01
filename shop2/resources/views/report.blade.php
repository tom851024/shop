<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
	</head>


	<body>
		<form action="/reportPost" method="POST">
			{{ csrf_field() }}
			<text>回報問題：</text>
			<textarea cols="50" rows="5" name="report" id="report" required="required"></textarea>
			<input type="submit" value="回報">
		</form>
	</body>

</html>