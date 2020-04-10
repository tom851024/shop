<!DOCTYPE html>
<html>
	<head>
		<title>Order Page</title>
	</head>


	<body>
		
		<p>
			
			<form action="/admin/orderSearch" method="POST">
				{{ csrf_field() }}
				<text>{{ trans('messages.searchFromName') }}</text>
				<input type="text" name="search" id="search" required="required" />
				<input type="submit" value="{{ trans('messages.search') }}" />
			</form>
			

			<form action="/admin/orderSearchNum" method="POST">
				{{ csrf_field() }}
				<text>{{ trans('messages.searchFromOrder') }}</text>
				<input type="text" name="search" id="search" required="required" onkeyup="value=value.replace(/[^\d]/g, '')" />
				<input type="submit" value="{{ trans('messages.search') }}" />
				@if(session() -> has('mes'))
					@if(session()->get('mes') == '1')
						{{ trans('messages.illegel') }}
					@endif
				@endif
			</form>

		</p>


		<p>
			<table width="80%" border="1">
					
					<tr>
						<th>{{ trans('messages.orderNo') }}</th>
						<th>{{ trans('messages.totalprice') }}</th>
						<th>{{ trans('messages.realPay') }}</th>
						<th>{{ trans('messages.orderMan') }}</th>
					</tr>

					@foreach($order as $ord)
						<tr>
							<td><a href="/admin/ownerOrderList/{{ $ord->OrderId }}">{{ $ord->OrderId }}</a></td>
							<td>{{ $ord->Total }}</td>
							<td>{{ $ord->RealPay }}</td>
							<td><a href="/admin/userDetail?UId=<?php echo $ord->UId ?>">{{ $ord->Name }}</a></td>
						</tr>
					@endforeach

				</table>
			</p>

			<a href="/admin/omain">{{ trans('messages.home') }}</a>
			@if(isset($search))
				<a href="/admin/ownerOrderView">{{ trans('messages.lastPage') }}</a>
			@endif
	</body>

</html>