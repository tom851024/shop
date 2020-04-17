<!DOCTYPE html>
<html>
	<head>
		<title>Create Merchandise Page</title>	
	</head>


	<body>
		<form action="/admin/warehouseInsert" method="POST">
			{{ csrf_field() }}
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.mername') }}</th>
					<td><input type="text" name="name" maxlength="20" id="name" required="required" /></td>
				</tr>

				<tr>
					<th>{{ trans('messages.shortdes') }}</th>
					<td><input type="text" name="sdes" id="sdes" maxlength="50" required="required" /></td>
				</tr>

				<tr>
					<th>{{ trans('messages.description') }}</th>
					<!-- <td><input type="text" name="des" id="des" maxlength="150" required="required" /></td> -->
					<td><textarea cols="50" rows="5" name="des" id="des" maxlength="150" required="required" /></textarea></td>
				</tr>

				<tr>
					<th>{{ trans('messages.price') }}</th>
					<td><input type="text" name="price" id="price" maxlength="25" onkeyup="value=value.replace(/[^\d]/g, '')"  required="required"/></td>
				</tr>

				<tr>
					<th>{{ trans('messages.qty') }}</th>
					<td><input type="text" name="qty" id="qty" maxlength="9" onkeyup="value=value.replace(/[^\d]/g, '')" required="required" /></td>
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
			
			<input type="submit" name="" value="{{ trans('messages.confirm') }}" />

		</form>

		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
					{{ trans('messages.illegel') }}
			@endif
		@endif
		<br />


		<a href="/admin/omain">{{ trans('messages.home') }}</a>
	</body>

</html>