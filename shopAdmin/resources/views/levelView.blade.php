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
					<th>{{ trans('messages.reachMoney') }} / {{ trans('messages.status') }}</th>
					<th>{{ trans('messages.totalMoney') }} / {{ trans('messages.status') }}</th>
					<th>{{ trans('messages.levelNow') }}</th>
					<th>{{ trans('messages.delete') }}</th>
					<th>{{ trans('messages.edit') }}</th>
				</tr>
				@foreach($level as $lev)
					<tr>
						<td>
							{{ $lev->ReachGold }} / 
							@if($lev->RStatus == '1')
								{{ trans('messages.start') }}
							@else
								{{ trans('messages.stop') }}
							@endif
						</td>
						<td>
							{{ $lev->TotalGold }} / 
							@if($lev->TStatus == '1')
								{{ trans('messages.start') }}
							@else
								{{ trans('messages.stop') }}
							@endif
						</td>
						<td>{{ $lev->Level }}</td>
						<td><input type="checkbox" name="del[]" value="{{ $lev->id }}" /></td>
						<td><a href="/admin/editLevel/{{ $lev->id }}">{{ trans('messages.edit') }}</a></td>
					</tr>
				@endforeach
			</table>

			<input type="submit" value="{{ trans('messages.delete') }}" />
		</form>

		<a href="/admin/omain">{{ trans('messages.home') }}</a>
		<a href="/admin/levelCre">{{ trans('messages.levelCreate') }}</a>

	</body>


</html>