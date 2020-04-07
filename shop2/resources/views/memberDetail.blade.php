<!DOCTYPE html>
<html>
	<head>
		<title>Member View Page</title>
	</head>


	<body>
		
		<table width="80%" border="1">
			<tr>
				<th>訂貨人姓名</th>
				<td>{{ $member->Name }}</td>
			</tr>

			<tr>
				<th>電話</th>
				<td>{{ $member->Phone }}</td>
			</tr>

			<tr>
				<th>住址</th>
				<td>{{ $member->Address }}</td>
			</tr>
		</table>



	</body>

	<a href="/orderView">上一頁</a>

</html>