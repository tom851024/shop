<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
	</head>


	<body>
		<form action="/reportPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.reportTitle') }}：</text>
			<input type="text" name="reTitle" maxlength="20" required="required" /><br /><br />
			<text>{{ trans('messages.report') }}：</text>
			<textarea cols="50" rows="5" name="report" id="report" maxlength="150" required="required"></textarea><br /><br />
			<input type="submit" value="{{ trans('messages.reporting') }}">
		</form>

		
		<a href="/reportView">{{ trans('messages.lastPage') }}</a>
	</body>

</html>