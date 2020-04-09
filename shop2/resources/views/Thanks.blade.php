<!DOCTYPE html>
<html>
	<head>
		<title>Thank you</title>
	</head>

	<body>
		{{ trans('messages.thank') }}
		@if(isset($plate))
			{{ trans('messages.backMoney') }}:{{ $plate }}
		@endif
		<a href="/">回到首頁</a>
	</body>
</html>