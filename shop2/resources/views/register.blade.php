<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>
	</head>

	<body>
		<form action="/postReg" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.userName') }}: </text> <input type="text" name="userName" id="userName" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.password') }}: </text> <input type="password" name="passWord" id="passWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.confirmPass') }}: </text> <input type="password" name="repassWord" id="repassWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.name') }}: </text>
			<input type="text" name="name" id="name" required="required" /><br />
			<text>{{ trans('messages.phone') }}: </text>
			<input type="text" name="tel" id="tel" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />

			<text>{{ trans('messages.address') }}: </text>
			<input type="text" name="address" id="address" required="required" /><br />
			
			<input type="submit"  value="{{ trans('messages.confirm') }}" /><br />
			@if(isset($err))
				@if($err == '1')
					<text style = "color:red;">{{ trans('messages.conPassErr') }}</text>
				@elseif($err == '2')
					<text style = "color:red;">{{ trans('messages.userEx') }}</text>
				@endif

			
			@endif
		</form>	

		<a href="/">{{ trans('messages.lastPage') }}</a>
	</body>


</html>