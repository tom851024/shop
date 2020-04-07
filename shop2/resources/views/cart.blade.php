<!DOCTYPE html>
<html>
	<head>
		<title>Cart Page</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta name="_token" content="{{ csrf_token() }}" />
		<script type="text/javascript">
			function sendForm(id){

				
				
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					},
					url: "/delTmp",
					data: {
						id: id
					},
					//data: $('#getForm').serialize(),
					type: "POST",
					dataType: 'json',
					error: function(){
					
					},
					async: false,
					cache: true
				});

				window.location.href = 'http://localhost/cart'
			}

	</script>
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
					<!--<td><a href="/delTmp?merId=<?php echo $car->id ?>">{{ trans('messages.delete') }}</a></td>-->
					<td>
						<form id="getForm" method="GET" action="/delTmp">
						
							<input type="button" name="del" id="del" value="刪除" onclick="sendForm(<?php echo $car->id ?>)" />
						</form>
					</td>
					 
				</tr>
				<?php 
					$priceSum += ($car->Price * $car->Qty);
				?>
			@endforeach
			

		</table>
		<p>
			@if($count > 0)
				{{ trans('messages.totalprice') }}: {{ $priceSum }}
				<a href="/commitBuy">{{ trans('messages.commitbuy') }}</a>
			@endif
		</p>
		<a href="/delAll">{{ trans('messages.delall') }}</a>
		<a href="/">{{ trans('messages.keepbuy') }}</a>

	</body>

	

</html>