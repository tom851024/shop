<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
	</head>
	<?php $i = 0; ?>

	<body>
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.reportTitle') }}</th>
				<th>{{ trans('messages.date') }}</th>
			</tr>

			@foreach($report as $r)
				<tr>
					<td><a href="/reportChat/{{ $r->RoomId }}">{{ $title[$i] }}</a></td>
					<td>{{ $date[$i] }}</td>
				</tr>
			<?php $i++; ?>
			@endforeach
		</table>

		<br />
		<a href="/report">{{ trans('messages.reportCreate') }}</a>
		<a href="/">{{ trans('messages.home') }}</a>
	</body>

</html>