<!DOCTYPE html>
<html>
	<head>
		<title>Order View</title>
	</head>


	<body>
		@if($cartCou > 0)
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.merName') }}</th>
					<th>{{ trans('messages.price') }}</th>
					<th>{{ trans('messages.qty') }}</th>
					<th>{{ trans('messages.progress') }}</th>
					<th>{{ trans('messages.check') }}</th>
				</tr>

				@foreach($cart as $c)
					<tr>
						<td>{{ $c->MerName }}</td>
						<td>{{ $c->Price }}</td>
						<td>{{ $c->Qty }}</td>
						<td>
							<?php
								if($c->Progress == 0){
									echo trans('messages.prepare');
								}else if($c->Progress == 1){
									echo trans('messages.send');
								}else if($c->Progress == 2){
									echo trans('messages.checkout');
								}else if($c->Progress == 3){
									echo trans('messages.noMer');
								}else if($c->Progress == 4){
									echo trans('messages.back');
								}else if($c->Progress == 5){
									echo trans('messages.backing');
								}else if($c->Progress == 6){
									echo trans('messages.backingFail');
								}
							 ?>
						</td>
						<td>
						@if($c->Progress == '1')
							<!--<a href="/orderOk?id=<?php echo $c->id ?>">已領貨</a>-->
							<form action="/orderOk" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="id" id="id" value="<?php echo $c->id ?>" />
								<input type="hidden" name="orderId" id="orderId" value="<?php echo $c->OrderId ?>" />
								<input type="submit" value="{{ trans('messages.checkout') }}" />
							</form>
						@elseif($c->Progress == '0')
							<form action="/orderCancel" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="id" id="id" value="<?php echo $c->id ?>" />
								<input type="hidden" name="orderId" id="orderId" value="<?php echo $c->OrderId ?>" />
								<input type="submit" value="{{ trans('messages.back') }}" />
							</form>
						@elseif($c->Progress == '2')
							<form action="/backView/{{ $c->id }}">
								<!--{{ csrf_field() }}
								<input type="hidden" name="id" id="id" value="<?php echo $c->id ?>" />
								<input type="hidden" name="orderId" id="orderId" value="<?php echo $c->OrderId ?>" />
								<input type="hidden" name="MerId" id="MerId" value="<?php echo $c->MerId ?>" />-->

								<input type="submit" value="{{ trans('messages.back') }}" />
							</form>
						
						@endif
						</td>
					</tr>
				@endforeach
		@else
			<text>{{ trans('messages.noBuy') }}</text>
		@endif
		<a href="/order">{{ trans('messages.lastPage') }}</a>
		</table>
	</body>

</html>