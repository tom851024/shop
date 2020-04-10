<!DOCTYPE html>
<html>
	<head>
		<title>Back Page</title>
	</head>


	<body>
		<form action="/admin/backDo" method="POST">
			{{ csrf_field() }}
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.mername') }}</th>
					<th>{{ trans('messages.orderNo') }}</th>
					<th>{{ trans('messages.orderMan') }}</th>
					<th>{{ trans('messages.price') }}</th>
					<th>{{ trans('messages.qty') }}</th>
					<th>{{ trans('messages.agree') }}</th>
					<th>{{ trans('messages.disagree') }}</th>
				</tr>

				@foreach($back as $b)
					<tr>
						<td>{{ $b->MerName }}</td>
						<td>{{ $b->OrderId }}</td>
						<td>{{ $b->Name }}</td>
						<td>{{ $b->Price }}</td>
						<td>{{ $b->Qty }}</td>
						<td>
							<input type="checkbox" name="agree[]" value="<?php echo $b->id ?>">
						</td>
						<td>
							<input type="checkbox" name="disagree[]" value="<?php echo $b->id ?>">
						</td>
					</tr>
				@endforeach
			</table>


			@if($count > 0)
				<input type="submit" value="{{ trans('messages.confirm') }}">
			@endif
		</form>
		<a href="/admin/omain">{{ trans('messages.lastPage') }}</a>
	</body>

</html>