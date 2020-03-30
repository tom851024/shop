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
			</tr>

			@foreach($cartTmp as $car)
				<tr>
					<td>{{ $car->MerName }}</td>
					<td>{{ $car->Price }}</td>
				</tr>
			@endforeach

		</table>

	</body>

</html>