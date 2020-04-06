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
				<th>{{ trans('messages.action') }}</th>
			</tr>
			<?php $priceSum=0; ?>
			@foreach($cartTmp as $car)
				<tr>
					<td>{{ $car->MerName }}</td>
					<td>{{ $car->Price }}</td>
					<td>{{ $car->Qty }}</td>
					<td><a href="/delTmp?merId=<?php echo $car->id ?>">{{ trans('messages.delete') }}</a></td>
					<!-- <button type="button" id="del">刪除</button> -->
				</tr>
				<?php 
					$priceSum += ($car->Price * $car->Qty);
				?>
			@endforeach
			

		</table>
		<p>
			{{ trans('messages.totalprice') }}: {{ $priceSum }}
			<a href="/commitBuy">{{ trans('messages.commitbuy') }}</a>
		</p>
		<a href="/delAll">{{ trans('messages.delall') }}</a>
		<a href="/">{{ trans('messages.keepbuy') }}</a>

	</body>

	

</html>