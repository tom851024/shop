<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>
	</head>

	<body>
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.reply') }}</th>
			</tr>
			@foreach($reply as $r)
				<tr>
					<td>{{ $r->Reply }}</td>
				</tr>
			@endforeach
		</table>

		<a href="/">{{ trans('messages.lastPage') }}</a>
	</body>

</html>