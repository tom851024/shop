<!DOCTYPE html>
<html>
	<head>
		<title>Order Page</title>
	</head>


	<body>
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.mername') }}</th>
				<th>{{ trans('messages.qty') }}</th>
				<th>{{ trans('messages.orderNo') }}</th>
				<th>{{ trans('messages.orderMan') }}</th>
			</tr>

			@foreach($order as $ord)
				<tr>
					<td>{{ $ord->MerName }}</td>
					<td>{{ $ord->Qty }}</td>
					<td><a href="/admin/ownerOrderList/{{ $ord->OrderId }}">{{ $ord->OrderId }}</a></td>
					<td><a href="/admin/userDetail/{{ $ord->OrderId }}/{{ $ord->UserId }}">{{ $ord->Name }}</a></td>
				</tr>
			@endforeach
		</table>

		<a href="/admin/ownerOrderView">{{ trans('messages.lastPage') }}</a>
	</body>

</html>