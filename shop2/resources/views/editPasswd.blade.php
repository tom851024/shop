<!DOCTYPE html>
<html>
	<head>
		<title>Edit Password</title>
	</head>


	<body>

		<text>{{ trans('messages.editPass') }}</text><br />
		<form method="POST" action="/edPassPost">
			{{ csrf_field() }}
			<text>{{ trans('messages.oldPass') }}</text>
			<input type="Password" name="passwd" maxlength="20" required="required" /><br />
			
			<text>{{ trans('messages.newPass') }}</text> 
			<input type="Password" name="newPasswd" maxlength="20" required="required" /><br />

			<text>{{ trans('messages.confirmPass') }}</text>
			<input type="Password" name="reNewPasswd" maxlength="20" required="required" /><br />

			

			<input type="submit" value="{{ trans('messages.confirm') }}">
		</form>
		@if(isset($err))
			@if($err == '1')
				<text>{{ trans('messages.passErr') }}</text>
			@elseif($err == '2')
				<text>{{ trans('messages.conPassErr') }}</text>
			@endif
		@endif



		@if(session() -> has('err'))

			@if(session()->get('err') == '1')
				<text style = "color:red;">{{ trans('messages.passErr') }}</text>
			@elseif(session()->get('err') == '2')
				<text style = "color:red;">{{ trans('messages.conPassErr') }}</text>
			@elseif(session()->get('err') == '3')
				<text style = "color:red;">{{ trans('messages.illegel') }}</text>
			@endif
		@endif
	</body>

	<a href="/">{{ trans('messages.home') }}</a>

</html>