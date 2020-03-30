<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Main Page</title>
	</head>

	<body>
		@if(isset($user))
			<a href="/shop2/public/index.php/logout">Logout</a>
			<a href="/shop2/public/index.php/register">Register</a>
			<text>welcome {{ $user }}</text>
		@else
			<a href="/shop2/public/index.php/login">Login</a>
			<a href="/shop2/public/index.php/register">Register</a>
		@endif
		<p>
			<table width="300" border="1">
				<tr>
					<th>Name</th>
					<th>short Description</th>
				</tr>
				@foreach($merchandise as $mer)
					<tr>
						<td>{{ $mer->Name }}</td>
						<td>{{ $mer->ShortDes }}</td>
					</tr>
				@endforeach
			</table>
		</p>

		
	</body>


</html>