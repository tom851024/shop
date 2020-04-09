<!DOCTYPE html>
<html>
	<head>
		<title>Discount Management</title>
	</head>


	<body>
		<form action="/admin/disCountEditPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.reachMoney') }}</text>
			<input type="text" name="reachMon" required="required" value="{{ $discount -> ReachGold }}" /><br />
			<text>{{ trans('messages.discountMon') }}</text>
			<input type="text" name="discount" required="required" value="{{ $discount -> Discount }}" /><br />
			<text>{{ trans('messages.needLevel') }}</text>
			<input type="text" name="level" required="required" value="{{ $discount -> Level }}" /><br />
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