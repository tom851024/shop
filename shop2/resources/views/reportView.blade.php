<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
	</head>


	<body>
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.report') }}</th>
			</tr>

			@foreach($report as $r)
				<tr>
					<td><a href="/reportChat/{{ $r->RoomId }}">{{ $r->Date }}</a></td>
				</tr>
			@endforeach
		</table>

		<br />
		<a href="/report">{{ trans('messages.reportCreate') }}</a>
		<a href="/">{{ trans('messages.home') }}</a>
	</body>

</html>