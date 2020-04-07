<!DOCTYPE html>
<html>
	<head>
		<title>Order Page</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript">
			function sendForm(){

				//var id = $('ordId').val();
				//var url = getForm.prop('action');
				
				$.ajax({
					url: "/merGo",
					//data: id,
					data: $('#form').serialize(),
					type: "POST",
					dataType: 'json',
					error: function(){
					
					},
					async: false,
					cache: true
				});

				window.location.href = 'http://localhost/orderView';
			}

	</script>
	</head>

	<body>

		<p>
			<form action="/orderSearch" method="POST">
				{{ csrf_field() }}
				<input type="text" name="search" id="search" required="required" />
				<input type="submit" value="搜尋" />
			</form>

		</p>



		<p>
			<table width="80%" border="1">
				
				<tr>
					<th>訂單編號</th>
					<th>商品名稱</th>
					<th>價格</th>
					<th>數量</th>
					<th>出貨狀態</th>
					<th>訂貨人</th>
					<th>出貨</th>
				</tr>

				@foreach($order as $ord)
					<tr>
						<td>{{ $ord->id }}</td>
						<td>{{ $ord->MerName }}</td>
						<td>{{ $ord->Price }}</td>
						<td>{{ $ord->Qty }}</td>
						<td>
							@if($ord->Progress == '0')
								出貨中
							@elseif($ord->Progress == '1')
								已出貨
							@elseif($ord->Progress == '2')
								已收到
							@elseif($ord->Progress == '3')
								缺貨中
							@elseif($ord->Progress == '4')
								已退貨
							@endif
						</td>
						<td><a href="/userDetail?UId=<?php echo $ord->UId ?>">{{ $ord->Name }}</a></td>
						<td>
							@if($ord->Progress == '0')
								<form id="form" action="/merGo" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="ordId" id="ordId" value="<?php echo $ord->id ?>" />
									<input type="submit" name="pos" id="pos" value="出貨"  />
								</form>
							@endif
						</td>
					</tr>
			
				

				@endforeach

			</table>

		</p>

		<a href="/omain">回首頁</a>
		

	</body>


</html>