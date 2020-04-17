<!DOCTYPE html>
<html>
	<head>
		<title>Report Page</title>
	</head>

	<body>

		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.reportMan') }}</th>
				<th>{{ trans('messages.report') }}</th>
				<th>{{ trans('messages.date') }}</th>
			</tr>

			@foreach($report as $r)
				<tr>
					<td>
						@if($r->UserId == 0)
							{{ trans('messages.admin') }}
						@else
							{{ trans('messages.user') }}
						@endif
					</td>
					<td>{{ $r->Report }}</td>
					<td>{{ $r->Date }}</td>
				</tr>
			@endforeach
		</table>

		<br />



		<form action="/admin/replyPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.reply') }}: </text>
			<textarea cols="50" rows="5" name="reply" maxlength="150" id="reply" required="required"></textarea>
			<input type="hidden" name="roomId" value="{{ $r->RoomId }}" />
			<input type="submit" value="{{ trans('messages.confirm') }}">
		</form>



		<a href="/admin/viewReport">{{ trans('messages.lastPage') }}</a>
	</body>

</html>