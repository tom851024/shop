<!DOCTYPE html>
<html>
	<head>
		<title>Order Page</title>
	</head>


	<body>
		
		<form action="/admin/warehouseUpdate" method="POST">
			{{ csrf_field() }}
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.mername') }}</th>
					<td><input type="text" name="name" id="name" value="{{ $mer->Name }}" required="required" /></td>
				</tr>

				<tr>
					<th>{{ trans('messages.shortdes') }}</th>
					<td><input type="text" name="sdes" id="sdes" value="{{ $mer->ShortDes }}" required="required" /></td>
				</tr>

				<tr>
					<th>{{ trans('messages.description') }}</th>
					<td><input type="text" name="des" id="des" value="{{ $mer->Description }}" required="required" /></td>
				</tr>

				<tr>
					<th>{{ trans('messages.price') }}</th>
					<td><input type="text" name="price" id="price" value="{{ $mer->Price }}" onkeyup="value=value.replace(/[^\d]/g, '')"  required="required"/></td>
				</tr>

				<tr>
					<th>{{ trans('messages.qty') }}</th>
					<td><input type="text" name="qty" id="qty" value="{{ $mer->Qty }}" onkeyup="value=value.replace(/[^\d]/g, '')" required="required" /></td>
				</tr>

				<tr>
					<th>{{ trans('messages.postOrNot') }}</th>
					<td>
						<select name="status" id="status">
							<option value="0">{{ trans('messages.enable') }}</option>
							<option value="1">{{ trans('messages.disable') }}</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="hidden" name="id" id="id" value="<?php echo $mer->id ?>">
			<input type="submit" name="" value="{{ trans('messages.edit') }}" />

		</form>
		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
					{{ trans('messages.illegel') }}
			@endif
		@endif
		<br />

		<a href="/admin/warehouse">{{ trans('messages.lastPage') }}</a>
		<a href="/admin/omain">{{ trans('messages.home') }}</a>

	</body>



</html>