<!DOCTYPE html>
<html>
	<head>
		<title>Member View Page</title>
	</head>


	<body>
		
		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.orderMan') }}</th>
				<td>{{ $member->Name }}</td>
			</tr>

			<tr>
				<th>{{ trans('messages.phone') }}</th>
				<td>{{ $member->Phone }}</td>
			</tr>

			<tr>
				<th>{{ trans('messages.address') }}</th>
				<td>{{ $member->Address }}</td>
			</tr>
		</table>



	</body>

	<a href="/admin/ownerOrderView">{{ trans('messages.lastPage') }}</a>

</html>