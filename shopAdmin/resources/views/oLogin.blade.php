<!DOCTYPE html>
<html>
	<head>
		<title>Owner Login</title>
	</head>

	<body>
		<form action="/admin/postOLogin" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.userName') }}</text>
			<input type="text" name="userName" maxlength="20" id="userName" required="required" /><br />
			<text>{{ trans('messages.password') }}</text>
			<input type="password" name="passWd" maxlength="20" id="passWd" required="required" /><br />
			<input type="submit" value="{{ trans('messages.login') }}" />

		</form>

		<a href="/admin/chinese">中文</a>&nbsp;
		<a href="/admin/english">English</a>

		@if(session() -> has('lerr'))

			@if(session()->get('lerr') == '1')
				<text style = "color:red;">{{ trans('messages.userNex') }}</text>
			@elseif(session()->get('lerr') == '2')
				<text style = "color:red;">{{ trans('messages.passErr') }}</text>
			@elseif(session()->get('lerr') == '3')
				<text style = "color:red;">{{ trans('messages.illegel') }}</text>
			@endif


		@endif
	</body>

</html>