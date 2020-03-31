<!DOCTYPE html>

<html>
	<head>
		<title>Detail Page</title>
	</head>
	<script type="text/javascript">
		function last()
		{
			document.location.href = "/";
		}

		function buy()
		{
			document.location.href = "/buy?merId="+<?php $merdetail->id ?>;
		}
	</script>

	<body>
		<table width="80%" border="1">
			<tr>
				<th>Name</th>
				<td>{{ $merdetail -> Name }}</td>
			</tr>
			<tr>
				<th>Short Description</th>
				<td>{{ $merdetail -> ShortDes }}</td>
			</tr>
			<tr>
				<th>Description</th>
				<td>{{ $merdetail -> Description }}</td>
			</tr>
			<tr>
				<th>Price</th>
				<td>{{ $merdetail -> Price }}</td>
			</tr>
			<tr>
				@if($user>0)
					<td>
					<!--	<a href="/shop2/public/index.php/buy?merId=<?php echo $merdetail->id ?>&merName=<?php echo $merdetail->Name ?>&price=<?php echo $merdetail->Price ?>">Buy!!</a>-->
					<form action="/buy" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="merId" id="merId" value="<?php echo $merdetail->id ?>">
						<input type="hidden" name="merName" id="merName" value="<?php echo $merdetail->Name ?>">
						<input type="hidden" name="price" id="price" value="<?php echo $merdetail->Price?>">
						<text>How much you want to buy: </text>
						<input type="text" name="Qty" id="Qty" required="required" />
						<input type="submit" value="Buy!!" name="" />
					</form>
					</td>
				@else
					<td><a href="/login">Buy!!</a></td>
				@endif
			</tr>

		</table>
			<a href="/">Last Page</a>


	</body>


</html>