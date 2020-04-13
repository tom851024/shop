<!DOCTYPE html>
<html>
	<head>
		<title>Report Page</title>
	</head>

	<body>
		<form action="/admin/replyPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.reply') }}: </text>
			<textarea cols="50" rows="5" name="reply" id="reply" required="required"></textarea>
			<input type="hidden" name="id" value="{{ $userId }}" />
			<input type="submit" value="{{ trans('messages.confirm') }}">
		</form>



		<a href="/admin/viewReport">{{ trans('messages.lastPage') }}</a>
	</body>

</html>