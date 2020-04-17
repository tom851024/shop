<!DOCTYPE html>
<html>
	<head>
		<title>Owner Register</title>
	</head>

	<body>
		<form action="/admin/oRegisterPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.userName') }}</text>
			<input type="text" name="userName" maxlength="20" id="userName" required="required" /><br />
			<text>{{ trans('messages.password') }}</text>
			<input type="password" name="password" maxlength="20" id="password" required="required" /><br />
			<text>{{ trans('messages.confirmPass') }}</text>
			<input type="password" name="repassword" maxlength="20" id="repassword" required="required" /><br />

			<text>{{ trans('messages.auth') }}</text>
			<select name="auth" id="auth">
				<option value="1">{{ trans('messages.boss') }}</option>
				<option value="2">{{ trans('messages.employee') }}</option>
			</select><br />

			<input type="submit" value="{{ trans('messages.confirm') }}" />

		</form>

		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
				{{ trans('messages.illegel') }}
			@elseif(session()->get('mes') == '2')
				{{ trans('messages.conPassErr') }}
			@elseif(session()->get('mes') == '3')
				{{ trans('messages.regOk') }}
			@elseif(session()->get('mes') == '4')
				{{ trans('messages.userEx') }}
			@endif
		@endif
	</body>
	<br />
	<a href="/admin/omain">{{ trans('messages.home') }}</a>


</html>