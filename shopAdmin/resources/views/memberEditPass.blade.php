<!DOCTYPE html>
<html>
	<head>
		<title>Member Edit Page</title>
	</head>

	<body>
		<form action="/admin/editPasswdPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.password') }}</text>
			<input type="hidden" name="id" value="{{ $userId }}" />
			<input type="text" name="passwd" required="required" /><br />
			<input type="submit" value="{{ trans('messages.confirm') }}">
		</form>

		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
					{{ trans('messages.illegel') }}
			@endif
		@endif

		<br />
		<a href="/admin/memberDetailPost/{{ $userId }}">{{ trans('messages.lastPage') }}</a>
	</body>


</html>