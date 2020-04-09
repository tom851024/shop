<!DOCTYPE html>
<html>
	<head>
		<title>Edit Ok</title>
	</head>

	<body>
		@if(isset($err))
			<text>{{ trans('messages.editFail') }}</text>
		@else
			<text>{{ trans('messages.editOk') }}</text>
		@endif
		<a href="/admin/omain">{{ trans('messages.home') }}</a>
	</body>

</html>