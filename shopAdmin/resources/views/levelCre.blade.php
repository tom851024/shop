<!DOCTYPE html>
<html>
	<head>
		<title>Level Management</title>
	</head>

	<body>
		<form action="/admin/levelPost" method="POST">
			{{ csrf_field() }}
			{{ trans('messages.reachMoney') }}:
			<input type="text" name="reachMoney" required="required" maxlength="10" /><br />

			{{ trans('messages.levelNow') }}:
			<input type="text" name="levelNow" required="required" maxlength="2" /><br />

			<input type="submit" value="{{ trans('messages.confirm') }}" />
		</form>


		<br />
		@if(session() -> has('mes'))

			@if(session()->get('mes') == '1')
				<text style = "color:red;">{{ trans('messages.illegel') }}</text>
			@elseif(session()->get('mes') == '2')
				<text style = "color:red;">{{ trans('messages.levelEx') }}</text>
			@endif


		@endif

	</body>

</html>