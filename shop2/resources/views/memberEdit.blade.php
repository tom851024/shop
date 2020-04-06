<!DOCTYPE html>
<html>
	<head>
		<title>Member Edit Page</title>
	</head>


	<body>
		<table width="80%" border="1">
			<tr>
				<th>使用者帳號</th>
				<th>使用者名稱</th>
				<th></th>
			</tr>
			@foreach($member as $mem)
				<tr>
					<td>{{ $mem->UserName }}</td>
					<td>{{ $mem->Name }}</td>
					<td>
						<form action="/memberDetailPost" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="UId" id="UId" value="<?php echo $mem->id ?>" />
							<input type="submit" value="修改">
						</form>
					</td>
				</tr>
			@endforeach


		</table>

		<a href="/omain">回上一頁</a>
			

	</body>

</html>