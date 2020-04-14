<!DOCTYPE html>
<html>
	<head>
		<title>Order Page</title>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta name="_token" content="{{ csrf_token() }}" />
		<script type="text/javascript">
			function sendForm(id, orderId){

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					},
					url: "/admin/merGo",
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

				window.location.href = 'http://localhostadmin/admin/ownerOrderList/'+orderId;
			}

			/*$(function(){
				$("#chkAll").click(function(){
					if(this.checked){
						$("input[type = checkbox]".prop("checked", "true"));
					}else{
						$("input[type = checkbox]".prop("checked", "false"));
					}
				});
			});*/

			$(document).ready(function(){
				$("#chkAll").click(function(){
					if($("#chkAll").prop("checked")){
						$("input[name = 'mergo[]']").each(function(){
							$(this).prop("checked", true);
						})
					}else{
						$("input[name = 'mergo[]']").each(function(){
							$(this).prop("checked", false);
						})
					}
				});
				
			});

	</script>
	</head>

	<body>

		



		<p>
			<form id="form" action="/admin/merGo" method="POST">
			{{ csrf_field() }}

				<table width="80%" border="1">
					
					<tr>
						<th>{{ trans('messages.orderNo') }}</th>
						<th>{{ trans('messages.merName') }}</th>
						<th>{{ trans('messages.price') }}</th>
						<th>{{ trans('messages.qty') }}</th>
						<th>{{ trans('messages.progress') }}</th>
						<th>{{ trans('messages.orderMan') }}</th>
						<th>{{ trans('messages.sending') }}</th>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><input type="checkbox" id="chkAll" /></td>			
					</tr>

					@foreach($order as $ord)
						<tr>
							<td>{{ $ord->OrderId }}</td>
							<td>{{ $ord->MerName }}</td>
							<td>{{ $ord->Price }}</td>
							<td>{{ $ord->Qty }}</td>
							<td>
								@if($ord->Progress == '0')
									{{ trans('messages.prepare') }}
								@elseif($ord->Progress == '1')
									{{ trans('messages.send') }}
								@elseif($ord->Progress == '2')
									{{ trans('messages.checkout') }}
								@elseif($ord->Progress == '3')
									{{ trans('messages.noMer') }}
								@elseif($ord->Progress == '4')
									{{ trans('messages.back') }}
								@elseif($ord->Progress == '5')
									{{ trans('messages.backing') }}
								@elseif($ord->Progress == '6')
									{{ trans('messages.backingFail') }}
								@endif
							</td>
							<td><a href="/admin/userDetail?UId=<?php echo $ord->UId ?>">{{ $ord->Name }}</a></td>
							<td>
								@if($ord->Progress == '0')
									
										<!--<input type="hidden" name="ordId" id="ordId" value="" />
										<input type="button" name="pos" id="pos" value="{{ trans('messages.sending') }}" onclick="sendForm(<?php echo $ord->id ?>, <?php echo $ord->OrderId ?>)" />-->

									<input type="checkbox" name="mergo[]" id="Checkbox" value="<?php echo $ord->id ?>" />
									
								@endif
							</td>
						</tr>
				
					
					<input type="hidden" name="orderId" value="{{ $ord->OrderId }}" />
					@endforeach

				</table>

				<text>{{ trans('messages.plateBuy') }} : {{ $plate->Plate }}</text>
				<br />

				<input type="submit" value="{{ trans('messages.confirm') }}">
			</form>
		</p>

		<a href="/admin/ownerOrderView">{{ trans('messages.lastPage') }}</a>
		

		

	</body>


</html>