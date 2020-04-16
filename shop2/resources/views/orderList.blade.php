<!DOCTYPE html>
<html>
	<head>
		<title>Order View</title>
	</head>


	<body>
		@if($count > 0)
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.orderNo') }}</th>
					<th>{{ trans('messages.totalprice') }}</th>
					<th>{{ trans('messages.realPay') }}</th>
					<th>{{ trans('messages.plateBuy') }}</th>
					<th>{{ trans('messages.orderMan') }}</th>
				</tr>

				@foreach($order as $ord)
					<tr>
						<td><a href="/orderView/{{ $ord->OrderId }}">{{ $ord->OrderId }}</a></td>
						<td>{{ $ord->Total }}</td>
						<td>{{ $ord->RealPay }}</td>
						<td>{{ $ord->Plate }}</td>
						<td><a href="/userView/{{ $ord->OrderId }}/{{ $user->id }}">{{ $ord->UserName }}</a></td>
					</tr>

				@endforeach
			</table>
		@else
			<text>{{ trans('messages.noBuy') }}</text>
		@endif

		<a href="/">{{ trans('messages.home') }}</a>
	</body>

</html>