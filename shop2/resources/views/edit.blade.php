<!DOCTYPE html>
<html>
	<head>
		<title>Edit Page</title>
	</head>


	<body>
		<text>{{ trans('messages.editData') }}</text><br />
		<form method="POST" action="/postEdit">
			{{ csrf_field() }}
			<text>{{ trans('messages.name') }}: </text>
			<input type="text" name="name" id="name" value="{{ $account->Name }}" required="required" /><br />

			<text>{{ trans('messages.phone') }}: </text>
			<input type="text" name="tel" id="tel" value="{{ $account->Phone }}" required="required" /><br />

			<text>{{ trans('messages.address') }}: </text>
			<input type="text" name="address" id="address" value="{{ $account->Address }}" required="required" /><br />

			<input type="submit" value="更改" />
		</form>
		<a href="/editPasswd">{{ trans('messages.editPass') }}</a>
		<a href="/">{{ trans('messages.lastPage') }}</a>

	</body>

</html>