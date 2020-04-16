<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Main Page</title>
	</head>

	<body>
		@if(isset($user))
			<a href="logout">{{ trans('messages.logout') }}</a>
			<text>welcome {{ $user }}</text>
			<text>{{ trans('messages.level') }} {{ $level }}</text>
			<a href="/editPage">{{ trans('messages.memberData') }}</a>
			<a href="/cart">{{ trans('messages.cart') }}</a>
			<a href="/order">{{ trans('messages.orderview') }}</a>
			<a href="/reportView">{{ trans('messages.report') }}</a>
			<a href="/plate">{{ trans('messages.plateLook') }}</a>
		@else
			<a href="/login">{{ trans('messages.login') }}</a>
			<a href="/register">{{ trans('messages.register') }}</a>
		@endif

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/chinese">中文</a>&nbsp;
		<a href="/english">English</a>

		<form method="POST" action="/search">
			{{ csrf_field() }}
			<input type="text" name="search" id="search" />
			<input type="submit" value="{{ trans('messages.search') }}" />
		</form>

		<p>
			<table width="70%" border="1">
				<tr>
					<th>{{ trans('messages.mername') }}</th>
					<th>{{ trans('messages.shortdes') }}</th>
					<th>{{ trans('messages.price') }}</th>
				</tr>
				@foreach($merchandise as $mer)
					<tr>
						<td><a href="/detail/{{ $mer->id }}"> {{ $mer->Name }} </a></td>
						<td>{{ $mer->ShortDes }}</td>
						<td>{{ $mer->Price }}</td>
					</tr>
				@endforeach
			</table>

			@if(!$merchandise->onFirstPage())
				<a href="<?php echo $merchandise->previousPageUrl(); ?>">{{ trans('messages.previous') }}</a>
			@endif

			@if($merchandise->hasMorePages())
				<a href="<?php echo $merchandise->nextPageUrl(); ?>">{{ trans('messages.next') }}</a>
			@endif
		</p>

		<a href="/">{{ trans('messages.home') }}</a>

		
	</body>


</html>