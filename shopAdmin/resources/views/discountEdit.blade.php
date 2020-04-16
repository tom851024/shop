<!DOCTYPE html>
<html>
	<head>
		<title>Discount Management</title>
	</head>


	<body>
		<form action="/admin/disCountEditPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.reachMoney') }}</text>
			<input type="text" name="reachMon" required="required" maxlength="20" value="{{ $discount -> ReachGold }}" /><br />
			<text>{{ trans('messages.discountMon') }}</text>
			<input type="text" name="discount" required="required" maxlength="20" value="{{ $discount -> Discount }}" /><br />
			<text>{{ trans('messages.needLevel') }}</text>
			<input type="text" name="level" required="required" maxlength="2" value="{{ $discount -> Level }}" /><br />
			<input type="hidden" name="id" value="{{ $discount -> id }}" />


			<input type="submit" value="{{ trans('messages.confirm') }}" />
		</form>


		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
				{{ trans('messages.illegel') }}
			@elseif(session()->get('mes') == '2')
				{{ trans('messages.levelEx') }}
			@elseif(session()->get('mes') == '3')
				{{ trans('messages.levelNotExist') }}
			@endif
		@endif
		<br />

		<a href="/admin/omain">{{ trans('messages.home') }}</a>
	</body>

</html>