<!DOCTYPE html>
<html>
	<head>
		<title>Warehouse Page</title>	
	</head>


	<body>
		<p>
			<a href="/admin/warehouseCreate">{{ trans('messages.createMer') }}</a>

		</p>
		<form action="/admin/merDel" method="POST">
			{{ csrf_field() }}
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.merId') }}</th>
					<th>{{ trans('messages.mername') }}</th>
					<th>{{ trans('messages.shortdes') }}</th>
					<th>{{ trans('messages.description') }}</th>
					<th>{{ trans('messages.price') }}</th>
					<th>{{ trans('messages.qty') }}</th>
					<th>{{ trans('messages.postOrNot') }}</th>
					<th></th>
					<th>{{ trans('messages.delete') }}</th>
				</tr>

				@foreach($merchandise as $mer)
					<tr>
						<td>{{ $mer->id }}</td>
						<td>{{ $mer->Name }}</td>
						<td>{{ $mer->ShortDes }}</td>
						<td>{{ $mer->Description }}</td>
						<td>{{ $mer->Price }}</td>
						<td>{{ $mer->Qty }}</td>
						<td>
							@if($mer->Status == '0')
								{{ trans('messages.enable') }}
							@elseif($mer->Status == '1')
								{{ trans('messages.disable') }}
							@endif
						</td>
						<td>
							<form action="/admin/warehouseDetail/<?php echo $mer->id ?>" method="get">	
											
								
								<input type="submit" value="{{ trans('messages.edit') }}" />
							</form>
							

						</td>
						<td>
							<input type="checkbox" name="del[]" value="<?php echo $mer->id ?>" />

						</td>
					</tr>
				@endforeach

			</table>
			@if($count > 0)
				<input type="submit" value="{{ trans('messages.delete') }}">
			@endif
		</form>

		<a href="/admin/omain">{{ trans('messages.home') }}</a>

	</body>


</html>