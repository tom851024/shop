<!DOCTYPE html>
<html>
	<head>
		<title>Discount Management</title>
	</head>


	<body>
		<form action="/admin/allDisCountEditPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.reachMoney') }}</text>
			<input type="text" name="reachMon" required="required" maxlength="20" value="{{ $discount -> ReachGold }}" /><br />
			<text>{{ trans('messages.discountMon') }}</text>
			<input type="text" name="discount" required="required" maxlength="20" value="{{ $discount -> Discount }}" /><br />
			
			
			<input type="hidden" name="id" value="{{ $discount -> id }}" />


			<input type="submit" value="{{ trans('messages.confirm') }}" />
		</form>


		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
					{{ trans('messages.illegel') }}
			@endif
		@endif
		<br />

		<a href="/admin/omain">{{ trans('messages.home') }}</a>
	</body>

</html>