<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Main Page</title>
	</head>

	<body>
		@if(isset($user))
			<a href="logout">登出</a>
			<a href="/register">註冊</a>
			<text>welcome {{ $user }}</text>
			<a href="/editPage">編輯資料</a>
			<a href="/cart">購物車</a>
			<a href="/orderView">瀏覽訂單</a>
			<a href="/report">回報問題</a>
		@else
			<a href="/login">登入</a>
			<a href="/register">註冊</a>
		@endif

		<form method="POST" action="/search">
			{{ csrf_field() }}
			<input type="text" name="search" id="search" />
			<input type="submit" value="Search" />
		</form>

		<p>
			<table width="300" border="1">
				<tr>
					<th>商品名稱</th>
					<th>簡介</th>
					<th>價格</th>
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

		<a href="/">回到首頁</a>

		
	</body>


</html>