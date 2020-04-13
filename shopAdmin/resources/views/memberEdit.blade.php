<!DOCTYPE html>
<html>
	<head>
		<title>Member Edit Page</title>
	</head>


	<body>
		<form action="/admin/memberDel" method="POST">
			{{ csrf_field() }}
			<table width="80%" border="1">
				<tr>
					<th>{{ trans('messages.oUsername') }}</th>
					<th>{{ trans('messages.oName') }}</th>
					<th>{{ trans('messages.edit') }}</th>
					<th>{{ trans('messages.delete') }}</th>
				</tr>
				@foreach($member as $mem)
					<tr>
						<td>{{ $mem->UserName }}</td>
						<td>{{ $mem->Name }}</td>
						<td>
							<form action="/admin/memberDetailPost" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="UId" id="UId" value="<?php echo $mem->id ?>" />
								<input type="submit" value="{{ trans('messages.edit') }}">
							</form>
						</td>
						<td>
								<input type="checkbox" name="del[]" value="<?php echo $mem->id ?>">					
						</td>
					</tr>
				@endforeach


			</table>
			<input type="submit" value="{{ trans('messages.delete') }}">
		</form>

		<a href="/admin/omain">{{ trans('messages.lastPage') }}</a>
			

	</body>

</html>