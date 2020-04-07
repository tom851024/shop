<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
	</head>


	<body>
		<form action="/reportPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.report') }}：</text>
			<textarea cols="50" rows="5" name="report" id="report" required="required"></textarea>
			<input type="submit" value="{{ trans('messages.reporting') }}">
		</form>

		<a href="/">{{ trans('messages.lastPage') }}</a>
	</body>

</html>