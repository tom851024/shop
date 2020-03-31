<!DOCTYPE html>
<html>
	<head>
		<title>Cart Page</title>
	</head>


	<body>
		<table width="80%" border="1">
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Action</th>
			</tr>
			<?php $priceSum=0; ?>
			@foreach($cartTmp as $car)
				<tr>
					<td>{{ $car->MerName }}</td>
					<td>{{ $car->Price }}</td>
					<td>{{ $car->Qty }}</td>
					<td><a href="/shop2/public/index.php/delTmp?merId=<?php echo $car->id ?>">Delete</a></td>
				</tr>
				<?php 
					$priceSum += ($car->Price * $car->Qty);
				?>
			@endforeach
			

		</table>
		<p>
			Total Price: {{ $priceSum }}
			<a href="/shop2/public/index.php/commitBuy">Buy!!!</a>
		</p>

		<a href="/shop2/public/">Keep shopping</a>

	</body>

</html>