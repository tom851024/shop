<!DOCTYPE html>
<html>
	<head>
		<title>Cart Page</title>
	</head>


	<body>
		<table width="80%" border="1">
			<tr>
				<th>商品名稱</th>
				<th>價錢</th>
				<th>數量</th>
				<th>動作</th>
			</tr>
			<?php $priceSum=0; ?>
			@foreach($cartTmp as $car)
				<tr>
					<td>{{ $car->MerName }}</td>
					<td>{{ $car->Price }}</td>
					<td>{{ $car->Qty }}</td>
					<td><a href="/delTmp?merId=<?php echo $car->id ?>">刪除</a></td>
					<!-- <button type="button" id="del">刪除</button> -->
				</tr>
				<?php 
					$priceSum += ($car->Price * $car->Qty);
				?>
			@endforeach
			

		</table>
		<p>
			總價錢: {{ $priceSum }}
			<a href="/commitBuy">確定購買</a>
		</p>
		<a href="/delAll">全部刪除</a>
		<a href="/">繼續購買</a>

	</body>

	

</html>