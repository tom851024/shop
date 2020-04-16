<!DOCTYPE html>
<html>
	<head>
		<title>Member View Page</title>
	</head>


	<body>
		
		<table width="80%" border="1">
			<tr>
				<th width="30%">{{ trans('messages.orderMan') }}</th>
				<td width="70%">{{ $member2->UserName }}</td>
			</tr>

			<tr>
				<th width="30%">{{ trans('messages.phone') }}</th>
				<td width="70%">{{ $member2->Phone }}</td>
			</tr>

			<tr>
				<th width="30%">{{ trans('messages.address') }}</th>
				<td width="70%">{{ $member2->Address }}</td>
			</tr>
		</table>



	</body>

	<a href="/admin/ownerOrderView">{{ trans('messages.lastPage') }}</a>

</html>