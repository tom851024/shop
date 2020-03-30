<!DOCTYPE html>

<html>
	<head>
		<title>Detail Page</title>
	</head>
	<script type="text/javascript">
		function last()
		{
			document.location.href = "/shop2/public/";
		}

		function buy()
		{
			document.location.href = "/shop2/public/index.php/buy?merId="+<?php $merdetail->id ?>;
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
					<td><a href="/shop2/public/index.php/buy?merId=<?php echo $merdetail->id ?>&merName=<?php echo $merdetail->Name ?>&price=<?php echo $merdetail->Price ?>">Buy!!</a></td>
				@else
					<td><a href="/shop2/public/index.php/login">Buy!!</a></td>
				@endif
			</tr>

		</table>
			<a href="/shop2/public/">Last Page</a>


	</body>


</html>