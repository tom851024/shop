<!DOCTYPE html>
<html>
	<head>
		<title>Edit Page</title>
	</head>


	<body>
		<text>{{ trans('messages.editdata') }}</text><br />
		<form method="POST" action="/postEdit">
			{{ csrf_field() }}
			<text>{{ trans('messages.name') }}: </text>
			<input type="text" name="name" id="name" maxlength="20" value="{{ $account->Name }}" required="required" /><br />

			<text>{{ trans('messages.phone') }}: </text>
			<input type="text" name="tel" id="tel" maxlength="10" value="{{ $account->Phone }}" required="required" /><br />

			<text>{{ trans('messages.address') }}: </text>
			<input type="text" name="address" id="address" maxlength="50" value="{{ $account->Address }}" required="required" /><br />

			
			

			<input type="submit" value="{{ trans('messages.edit') }}" />
		</form>

		@if(session() -> has('err'))

				@if(session()->get('err') == '1')
					<text style = "color:red;">{{ trans('messages.illegel') }}</text>
				@endif
			@endif
			<br />
		<a href="/editPasswd">{{ trans('messages.editPass') }}</a>
		<a href="/">{{ trans('messages.lastPage') }}</a>

	</body>

</html>