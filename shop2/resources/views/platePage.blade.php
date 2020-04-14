<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Plate Page</title>
	</head>


	<body>
		<a href="/">{{ trans('messages.home') }}</a>
		<br />
		<text>{{ trans('messages.plate') }}: {{ $user->Gold }}</text><br />
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.plateChange') }}</th>
				<th>{{ trans('messages.date') }}</th>
			</tr>

			@foreach($plate as $p)
				<tr>
					<td>{{ $p->ChangeGold }}</td>
					<td>{{ $p->Date }}</td>
				</tr>
			@endforeach
		</table>
	</body>

</html>