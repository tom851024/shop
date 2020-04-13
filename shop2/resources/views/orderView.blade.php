<!DOCTYPE html>
<html>
	<head>
		<title>Order View</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){

				$("#chkokall").click(function(){
					if($("#chkokall").prop("checked")){
						$("input[name = 'checkok[]']").each(function(){
								$(this).prop("checked", true);
							})
					}else{
						$("input[name = 'checkok[]']").each(function(){
								$(this).prop("checked", false);
							})
					}
				});



				$("#chkbackall").click(function(){
					if($("#chkbackall").prop("checked")){
						$("input[name = 'cancel[]']").each(function(){
								$(this).prop("checked", true);
							})
						$("input[name = 'back[]']").each(function(){
								$(this).prop("checked", true);
							})
					}else{
						$("input[name = 'cancel[]']").each(function(){
								$(this).prop("checked", false);
							})
						$("input[name = 'back[]']").each(function(){
								$(this).prop("checked", false);
							})
					}
				});
					
			});
		</script>
	</head>


	<body>
		@if($cartCou > 0)
		<form action="/orderCheck" method="POST">
			{{ csrf_field() }}
			<table width="80%" border="1">
				<tr>
					<th align="center" width="30%">{{ trans('messages.merName') }}</th>
					<th align="center" width="30%">{{ trans('messages.price') }}</th>
					<th align="center" width="30%">{{ trans('messages.qty') }}</th>
					<th align="center" width="30%">{{ trans('messages.progress') }}</th>
					<th align="center" width="30%">{{ trans('messages.check') }}</th>
					<th align="center" width="30%">{{ trans('messages.back') }}</th>
				</tr>

				<tr>
					<td align="center" width="30%"></td>
					<td align="center" width="30%"></td>
					<td align="center" width="30%"></td>
					<td align="center" width="30%"></td>
					<td align="center" width="30%"><input type="checkbox" id="chkokall"  /></td>
					<td align="center" width="30%"><input type="checkbox" id="chkbackall" /></td>
				</tr>

				@foreach($cart as $c)
					<tr>
						<td align="center" width="30%">{{ $c->MerName }}</td>
						<td align="center" width="30%">{{ $c->Price }}</td>
						<td align="center" width="30%">{{ $c->Qty }}</td>
						<td align="center" width="30%">
							<?php
								if($c->Progress == 0){
									echo trans('messages.prepare');
								}else if($c->Progress == 1){
									echo trans('messages.send');
								}else if($c->Progress == 2){
									echo trans('messages.checkout');
								}else if($c->Progress == 3){
									echo trans('messages.noMer');
								}else if($c->Progress == 4){
									echo trans('messages.back');
								}else if($c->Progress == 5){
									echo trans('messages.backing');
								}else if($c->Progress == 6){
									echo trans('messages.backingFail');
								}
							 ?>
						</td>
						<td align="center" width="30%">
							@if($c->Progress == '1')
								<input type="checkbox" name="checkok[]" value="<?php echo $c->id ?>" />
							@endif
						</td>
						<td align="center" width="30%"> 
							@if($c->Progress == '0' || $c->Progress == '1')
								<input type="checkbox" name="cancel[]" value="<?php echo $c->id ?>" />
							@elseif($c->Progress == '2')
								<input type="checkbox" name="back[]" value="<?php echo $c->id ?>" />
								<input type="hidden" name="qty[]" value="<?php echo $c->Qty ?>" />
								<input type="hidden" name="mer[]" value="<?php echo $c->MerId ?>" />
							@endif
						</td>
						
					</tr>
				@endforeach
			@else
				<text>{{ trans('messages.noBuy') }}</text>
			@endif
			<a href="/order">{{ trans('messages.lastPage') }}</a>
			</table>
			<input type="hidden" name="orderId" id="orderId" value="<?php echo $c->OrderId ?>" />
			<input type="submit" value="{{ trans('messages.confirm') }}" />
		</form>

	</body>

</html>