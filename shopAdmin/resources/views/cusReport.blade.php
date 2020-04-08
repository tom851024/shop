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
				<th>{{ trans('messages.oName') }}</th>
				<th>{{ trans('messages.reporting') }}</th>
			</tr>

			@foreach($report as $rep)
				<tr>
					<td>{{ $rep->UserName }}</td>
					<td>{{ $rep->Name }}</td>
					<td>{{ $rep->Report }}</td>
				</tr>

			@endforeach
		</table>


	</body>


</html>