<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Page</title>
	</head>

	<body>
		<form action="/postReg" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.userName') }}: </text> 
			<input type="text" name="userName" maxlength="20" id="userName" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.password') }}: </text> 
			<input type="password" name="passWord" id="passWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.confirmPass') }}: </text> 
			<input type="password" name="repassWord" id="repassWord" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />
			<text>{{ trans('messages.name') }}: </text>
			<input type="text" name="name" id="name" maxlength="20" required="required" /><br />
			<text>{{ trans('messages.phone') }}: </text>
			<input type="text" name="tel" id="tel" required="required" onkeyup="value=value.replace(/[\W]/g, '')" /><br />

			<text>{{ trans('messages.address') }}: </text>
			<input type="text" name="address" id="address" required="required" /><br />
			
			<input type="submit"  value="{{ trans('messages.confirm') }}" /><br />
		
			@if(session() -> has('err'))

				@if(session()->get('err') == '1')
					<text style = "color:red;">{{ trans('messages.conPassErr') }}</text>
				@elseif(session()->get('err') == '2')
					<text style = "color:red;">{{ trans('messages.userEx') }}</text>
				@elseif(session()->get('err') == '3')
					<text style = "color:red;">{{ trans('messages.illegel') }}</text>
				@endif
			@endif

			
		
		</form>	

		<a href="/">{{ trans('messages.lastPage') }}</a>
	</body>


</html>