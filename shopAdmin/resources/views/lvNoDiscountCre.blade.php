<!DOCTYPE html>
<html>
	<head>
		<title>Discount Management</title>
	</head>


	<body>
		<form action="/admin/allDiscountPost" method="POST">
			{{ csrf_field() }}
			<text>{{ trans('messages.reachMoney') }}</text>
			<input type="text" name="reachMon" maxlength="20" required="required" /><br />
			<text>{{ trans('messages.discountMon') }}</text>
			<input type="text" name="discount" maxlength="20" required="required" /><br />
			
			<input type="hidden" name="level" value="0" /><br />


			<input type="submit" value="{{ trans('messages.confirm') }}" />
		</form>


		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
				{{ trans('messages.illegel') }}
			@elseif(session()->get('mes') == '2')
				{{ trans('messages.levelEx') }}
			@endif
		@endif
		<br />

		<a href="/admin/omain">{{ trans('messages.home') }}</a>
	</body>

</html>