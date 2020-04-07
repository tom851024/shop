<!DOCTYPE html>
<html>
	<head>
		<title>Order Page</title>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta name="_token" content="{{ csrf_token() }}" />
		<script type="text/javascript">
			function sendForm(id){

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					},
					url: "/merGo",
					//data: $('#form').serialize(),
					data:{
						ordId: id
					},
					type: "POST",
					dataType: "text",
					error: function(){
					
					},
					async: false,
					cache: true
				});

				window.location.href = 'http://localhost/ownerOrderView';
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
									<input type="hidden" name="ordId" id="ordId" value="" />
									<input type="button" name="pos" id="pos" value="出貨" onclick="sendForm(<?php echo $ord->id ?>)" />
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