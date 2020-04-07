<!DOCTYPE html>
<html>
	<head>
		<title>Order View</title>
	</head>


	<body>
		@if($cartCou > 0)
			<table width="80%" border="1">
				<tr>
					<th>商品名稱</th>
					<th>價錢</th>
					<th>數量</th>
					<th>進度</th>
					<th>收貨簽到</th>
				</tr>

				@foreach($cart as $c)
					<tr>
						<td>{{ $c->MerName }}</td>
						<td>{{ $c->Price }}</td>
						<td>{{ $c->Qty }}</td>
						<td>
							<?php
								if($c->Progress == 0){
									echo '出貨中';
								}else if($c->Progress == 1){
									echo '已出貨';
								}else if($c->Progress == 2){
									echo '已領貨';
								}else if($c->Progress == 3){
									echo '缺貨';
								}else if($c->Progress == 4){
									echo '已退貨';
								}
							 ?>
						</td>
						<td>
						@if($c->Progress == '1')
							<!--<a href="/orderOk?id=<?php echo $c->id ?>">已領貨</a>-->
							<form action="/orderOk" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="id" id="id" value="<?php echo $c->id ?>" />
								<input type="submit" value="已領貨" />
							</form>
						@elseif($c->Progress == '0')
							<form action="/orderCancel" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="id" id="id" value="<?php echo $c->id ?>" />
								<input type="submit" value="退貨" />
							</form>
						@endif
						</td>
					</tr>
				@endforeach
		@else
			<text>你還沒有買過任何東西</text>
		@endif
		<a href="/">回到首頁</a>
		</table>
	</body>

</html>