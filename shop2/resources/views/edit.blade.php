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
			<input type="text" name="name" id="name" value="{{ $account->Name }}" /><br />

			<text>Telephone: </text>
			<input type="text" name="tel" id="tel" value="{{ $account->Phone }}" /><br />

			<text>Address: </text>
			<input type="text" name="address" id="address" value="{{ $account->Address }}" /><br />

			<input type="submit" />
		</form>

		<a href="/shop2/public/">Last Page</a>

	</body>

</html>