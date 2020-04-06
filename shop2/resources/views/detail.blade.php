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
				<th align="center" width="30%">{{ trans('messages.mername') }}</th>
				<td align="center" width="70%">{{ $merdetail -> Name }}</td>
			</tr>
			<tr>
				<th align="center" width="30%">{{ trans('messages.shortdes') }}</th>
				<td align="center" width="70%">{{ $merdetail -> ShortDes }}</td>
			</tr>
			<tr>
				<th align="center" width="30%">{{ trans('messages.description') }}</th>
				<td align="center" width="70%">{{ $merdetail -> Description }}</td>
			</tr>
			<tr>
				<th align="center" width="30%">{{ trans('messages.price') }}</th>
				<td align="center" width="70%">{{ $merdetail -> Price }}</td>
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
						<text>{{ trans('messages.qty') }}: </text>
						<input type="text" name="Qty" id="Qty" required="required" />
						<input type="submit" value="{{ trans('messages.buy') }}!!" name="" />
					</form>
					</td>
				@else
					<td><a href="/login">{{ trans('messages.commitbuy') }}!!</a></td>
				@endif
			</tr>

		</table>
			<a href="/">{{ trans('messages.home') }}</a>


	</body>


</html>