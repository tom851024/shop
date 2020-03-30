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
					<th>Price</th>
				</tr>
				@foreach($merchandise as $mer)
					<tr>
						<td><a href="/shop2/public/index.php/detail?merId={{ $mer->id }}"> {{ $mer->Name }} </a></td>
						<td>{{ $mer->ShortDes }}</td>
						<td>{{ $mer->Price }}</td>
					</tr>
				@endforeach
			</table>
		</p>

		
	</body>


</html>