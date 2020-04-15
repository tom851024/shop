<!DOCTYPE html>
<html>
	<head>
		<title>Level Management</title>
	</head>

	<body>
		<form action="/admin/editLevelPost" method="POST">
			{{ csrf_field() }}
			{{ trans('messages.reachMoney') }}:
			<input type="text" name="reachMoney" required="required" maxlength="10" value="{{ $level->ReachGold }}" /><br />

			{{ trans('messages.status') }}:
			<select name="rStatus">
				@if($level->RStatus == '0')
					<option value="1">{{ trans('messages.start') }}</option>
					<option value="0" selected="selected">{{ trans('messages.stop') }}</option>
				@elseif($level->RStatus == '1')
					<option value="1" selected="selected">{{ trans('messages.start') }}</option>
					<option value="0">{{ trans('messages.stop') }}</option>
				@endif
			</select>
			<br />

			
			{{ trans('messages.totalMoney') }}:
			<input type="text" name="totalMoney" required="required" maxlength="10" value="{{ $level->TotalGold }}" /><br />

			

			{{ trans('messages.status') }}:
			<select name="tStatus">
				@if($level->TStatus == '0')
					<option value="1">{{ trans('messages.start') }}</option>
					<option value="0" selected="selected">{{ trans('messages.stop') }}</option>
				@elseif($level->TStatus == '1')
					<option value="1" selected="selected">{{ trans('messages.start') }}</option>
					<option value="0">{{ trans('messages.stop') }}</option>
				@endif
			</select>
			<br />


			{{ trans('messages.levelNow') }}:
			<input type="text" name="levelNow" required="required" maxlength="2" value="{{ $level->Level }}" /><br />

			<input type="hidden" name="id" value="{{ $level->id }}" />

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

		<br />
		<a href="/admin/level">{{ trans('messages.lastPage') }}</a>
	</body>

</html>