<!DOCTYPE html>
<html>
	<head>
		<title>Cart Page</title>
	</head>


	<body>
		
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.mername') }}</th>
					<th>{{ trans('messages.price') }}</th>
					<th>{{ trans('messages.qty') }}</th>
					
				</tr>
				<?php $priceSum=0; ?>
				
					{{ csrf_field() }}
					@foreach($cartTmp as $car)
						<tr>
							<td>{{ $car->MerName }}</td>
							<td>{{ $car->Price }}</td>
							<td>{{ $car->Qty }}</td>
							<!--<td><a href="/delTmp?merId=<?php echo $car->id ?>">{{ trans('messages.delete') }}</a></td>-->
							
							 
						</tr>
						<?php 
							$priceSum += ($car->Price * $car->Qty);
						?>
					@endforeach

					
				

			</table>
		@if($count > 0)
			<form action="buyWithPlate" method="POST">
				{{ csrf_field() }}
				<text>{{ trans('messages.insertPlate') }}:</text>
				<input type="text" name="plate" required="required" />
				<input type="submit" value="{{ trans('messages.confirm') }}">
			</form>
			@if(session()->has('mes'))
				@if(session()->get('mes') == '1')
					<text>{{ trans('messages.illegel') }}</text>
				@elseif(session()->get('mes') == '2')
					<text>{{ trans('messages.plateNotEnough') }}</text>
				@endif
			@endif
		@endif
		
		@if($count > 0)
			<p>
				{{ trans('messages.totalprice') }}: {{ $priceSum }}
				
				<a href="/buyWithPlateFirst">{{ trans('messages.buyWithPlateFirst') }}</a>		
			</p>
		
		@endif
		<a href="/">{{ trans('messages.home') }}</a>
		<br />
		
	</body>

	

</html>