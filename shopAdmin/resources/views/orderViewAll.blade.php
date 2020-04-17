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
				<input type="text" name="search" maxlength="50" id="search" required="required" />
				<input type="submit" value="{{ trans('messages.search') }}" />
			</form>
			

			<form action="/admin/orderSearchNum" method="POST">
				{{ csrf_field() }}
				<text>{{ trans('messages.searchFromOrder') }}</text>
				<input type="text" name="search" maxlength="50" id="search" required="required" onkeyup="value=value.replace(/[^\d]/g, '')" />
				<input type="submit" value="{{ trans('messages.search') }}" />
				@if(session() -> has('mes'))
					@if(session()->get('mes') == '1')
						{{ trans('messages.illegel') }}
					@endif
				@endif
			</form>


			<form action="/admin/orderSearchMer" method="POST">
				{{ csrf_field() }}
				<text>{{ trans('messages.searchFromMer') }}</text>
				<input type="text" name="search" maxlength="50" id="search" required="required" />
				<input type="submit" value="{{ trans('messages.search') }}" />
			</form>

		</p>


		<p>
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
							<td><a href="/admin/ownerOrderList/{{ $ord->OrderId }}">{{ $ord->OrderId }}</a></td>
							<td>{{ $ord->Total }}</td>
							<td>{{ $ord->RealPay }}</td>
							<td>{{ $ord->Plate }}</td>
							<td><a href="/admin/userDetail/<?php echo $ord->OrderId ?>/<?php echo $ord->UserId ?>">{{ $ord->UserName }}</a></td>
						</tr>
					@endforeach

				</table>
				@if(!$order->onFirstPage())
					<a href="<?php echo $order->previousPageUrl(); ?>">{{ trans('messages.previous') }}</a>
				@endif
				@if($order->hasMorePages())
					<a href="<?php echo $order->nextPageUrl(); ?>">{{ trans('messages.next') }}</a>
				@endif		
			</p>

			<a href="/admin/omain">{{ trans('messages.home') }}</a>
			@if(isset($search))
				<a href="/admin/ownerOrderView">{{ trans('messages.lastPage') }}</a>
			@endif
	</body>

</html>