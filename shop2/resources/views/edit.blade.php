<!DOCTYPE html>
<html>
	<head>
		<title>Edit Page</title>
	</head>


	<body>
		<text>Edit your data</text><br />
		<form method="POST" action="/shop2/public/index.php/postEdit">
			{{ csrf_field() }}
			<text>Name: </text>
			<input type="text" name="name" id="name" value="{{ $account->Name }}" required="required" /><br />

			<text>Telephone: </text>
			<input type="text" name="tel" id="tel" value="{{ $account->Phone }}" required="required" /><br />

			<text>Address: </text>
			<input type="text" name="address" id="address" value="{{ $account->Address }}" required="required" /><br />

			<input type="submit" />
		</form>

		<a href="/">Last Page</a>

	</body>

</html>