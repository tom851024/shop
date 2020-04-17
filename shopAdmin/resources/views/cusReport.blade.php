<!DOCTYPE html>
<html>
	<head>
		<title>Report Page</title>
	</head>

	<body>
		<?php $i = 0; ?>
		<p>
			<a href="/admin/omain">{{ trans('messages.home') }}</a>
		</p>
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.oUsername') }}</th>
				<th>{{ trans('messages.reportTitle') }}</th>
				<th>{{ trans('messages.date') }}</th>
				<th>{{ trans('messages.reply') }}</th>
			</tr>

			@foreach($report as $rep)
				<tr>
					<td>{{ $userName[$i] }}</td>
					<td>{{ $title[$i] }}</td>
					<td>{{ $date[$i] }}</td>					
					<td><a href="/admin/reply/{{ $rep->RoomId }}">{{ trans('messages.reply') }}</a></td>
				</tr>
				<?php $i++; ?>
			@endforeach
		</table>


	</body>


</html>