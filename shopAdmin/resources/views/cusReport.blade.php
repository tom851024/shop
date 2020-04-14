<!DOCTYPE html>
<html>
	<head>
		<title>Report Page</title>
	</head>

	<body>
		<p>
			<a href="/admin/omain">{{ trans('messages.home') }}</a>
		</p>
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.oUsername') }}</th>
				<th>{{ trans('messages.date') }}</th>
				<th>{{ trans('messages.reply') }}</th>
			</tr>

			@foreach($report as $rep)
				<tr>
					<td>{{ $rep->UserName }}</td>
					<td>{{ $rep->Date }}</td>
					<td><a href="/admin/reply/{{ $rep->RoomId }}">{{ trans('messages.reply') }}</a></td>
				</tr>

			@endforeach
		</table>


	</body>


</html>