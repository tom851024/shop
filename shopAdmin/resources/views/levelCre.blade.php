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

			{{ trans('messages.status') }}:
			<select name="rStatus">
				<option value="1">{{ trans('messages.start') }}</option>
				<option value="0">{{ trans('messages.stop') }}</option>
			</select>
			<br />

			
			{{ trans('messages.totalMoney') }}:
			<input type="text" name="totalMoney" required="required" maxlength="10" /><br />

			

			{{ trans('messages.status') }}:
			<select name="tStatus">
				<option value="1">{{ trans('messages.start') }}</option>
				<option value="0">{{ trans('messages.stop') }}</option>
			</select>
			<br />


			{{ trans('messages.levelNow') }}:
			<input type="text" name="levelNow" required="required" maxlength="2" /><br />

			<input type="submit" value="{{ trans('messages.confirm') }}" />
		</form>


		<br />
		@if(session()->has('mes'))

			@if(session()->get('mes') == '1')
				<text style = "color:red;">{{ trans('messages.illegel') }}</text>
			@elseif(session()->get('mes') == '2')
				<text style = "color:red;">{{ trans('messages.levelEx') }}</text>
			@elseif(session()->get('mes') == '3')
				<text style = "color:red;">{{ trans('messages.levelNotEx') }}</text>
			@endif


		@endif

		<br />
		<a href="/admin/level">{{ trans('messages.lastPage') }}</a>

	</body>

</html>