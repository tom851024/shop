<!DOCTYPE html>
<html>
	<head>
		<title>Back View</title>
	</head>


	<body>
		<table width="80%" border="1">
			<form action="/orderBack" method="POST">
				{{ csrf_field() }}
				<tr>
					<th>{{ trans('messages.orderNo') }}</th>
					<td>{{ $back->OrderId }}</td>			
				</tr>
				<tr>
					<th>{{ trans('messages.merName') }}</th>
					<td>{{ $back->MerName }}</td>	
				</tr>
				<tr>
					<th>{{ trans('messages.price') }}</th>
					<td>{{ $back->Price }}</td>	
				</tr>

				<tr>		
					<th>{{ trans('messages.qty') }}</th>
					<td>{{ $back->Qty }}</td>	
					
				</tr>
				<tr>
					<th>{{ trans('messages.backQty') }}</th>
					<td><input type="text" name="qty" /></td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="orderId" value="{{ $back->OrderId }}">
						<input type="hidden" name="merId" value="{{ $back->MerId }}">
						<input type="hidden" name="id" value="{{ $back->id }}">
						<input type="submit" value="{{ trans('messages.back') }}" />
					</td>
				</tr>
			</form>
		</table>

		@if(session() -> has('mes'))

			@if(session()->get('mes') == '1')
				<text style = "color:red;">{{ trans('messages.illegel') }}</text>
			@elseif(session()->get('mes') == '2')
				<text style = "color:red;">{{ trans('messages.overQty') }}</text>
				
			@endif


		@endif
		<br />

		<a href="/">{{ trans('messages.home') }}</a>

	</body>


</html>