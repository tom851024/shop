<!DOCTYPE html>
<html>
	<head>
		<title>Level Management</title>
	</head>


	<body>
		<form action="/admin/levelDel" method="POST">
			{{ csrf_field() }}
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.reachMoney') }}</th>
					<th>{{ trans('messages.levelNow') }}</th>
					<th>{{ trans('messages.delete') }}</th>
				</tr>
				@foreach($level as $lev)
					<tr>
						<td>{{ $lev->ReachGold }}</td>
						<td>{{ $lev->Level }}</td>
						<td><input type="checkbox" name="del[]" value="{{ $lev->id }}" /></td>
					</tr>
				@endforeach
			</table>

			<input type="submit" value="{{ trans('messages.delete') }}" />
		</form>

		<a href="/admin/omain">{{ trans('messages.home') }}</a>
		<a href="/admin/levelCre">{{ trans('messages.levelCreate') }}</a>

	</body>


</html>