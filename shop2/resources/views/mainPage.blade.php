<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Main Page</title>
	</head>

	<body>
		@if(isset($user))
			<a href="logout">Logout</a>
			<a href="/register">Register</a>
			<text>welcome {{ $user }}</text>
			<a href="/editPage">Edit Data</a>
			<a href="/cart">See cart</a>
		@else
			<a href="/login">Login</a>
			<a href="/register">Register</a>
		@endif

		<form method="POST" action="/search">
			{{ csrf_field() }}
			<input type="text" name="search" id="search" />
			<input type="submit" value="Search" />
		</form>

		<p>
			<table width="300" border="1">
				<tr>
					<th>Name</th>
					<th>short Description</th>
					<th>Price</th>
				</tr>
				@foreach($merchandise as $mer)
					<tr>
						<td><a href="/detail?merId={{ $mer->id }}"> {{ $mer->Name }} </a></td>
						<td>{{ $mer->ShortDes }}</td>
						<td>{{ $mer->Price }}</td>
					</tr>
				@endforeach
			</table>
		</p>

		
	</body>


</html>