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
			<input type="Password" name="passwd" required="required" /><br />
			
			<text>{{ trans('messages.newPass') }}</text> 
			<input type="Password" name="newPasswd" required="required" /><br />

			<text>{{ trans('messages.confirmPass') }}</text>
			<input type="Password" name="reNewPasswd" required="required" /><br />

			

			<input type="submit" value="確定">
		</form>
		@if(isset($err))
			@if($err == '1')
				<text>{{ trans('messages.passErr') }}</text>
			@elseif($err == '2')
				<text>{{ trans('messages.conPassErr') }}</text>
			@endif
		@endif
	</body>

	<a href="/">{{ trans('messages.home') }}</a>

</html>