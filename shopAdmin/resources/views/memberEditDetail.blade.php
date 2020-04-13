<!DOCTYPE html>
<html>
	<head>
		<title>Member Edit Page</title>
	</head>

	<body>
		<text>{{ trans('messages.editdata') }}</text><br />
		<text>{{ trans('messages.userName') }}： {{ $member->UserName }}</text><br />
		
		<form action="/admin/memberEditPost" method="POST">
			{{ csrf_field() }}
			<!-- <text>{{ trans('messages.password') }}: </text>
			<input type="text" name="passWd" id="passWd" value="" required="required" /><br /> -->
			<text>{{ trans('messages.name') }}: </text>
			<input type="text" name="name" id="name" value="{{ $member->Name }}" required="required" /><br />
			<text>{{ trans('messages.phone') }}: </text>
			<input type="text" name="phone" id="phone" value="{{ $member->Phone }}" required="required" /><br />
			<text>{{ trans('messages.address') }}: </text>
			<input type="text" name="address" id="address" value="{{ $member->Address }}" required="required" /><br />
			<text>{{ trans('messages.level') }}: </text>
			<input type="text" name="level" id="level" value="{{ $member->Level }}" required="required" /><br />
			<text>{{ trans('messages.plate') }}: </text>
			<input type="text" name="gold" id="gold" value="{{ $member->Gold }}" required="required" /><br />

			<input type="hidden" name="id" id="id" value="{{ $member->id }}" required="required" /><br />

			<input type="submit" value="{{ trans('messages.edit') }}" />
					
		</form>
		@if(session() -> has('mes'))
			@if(session()->get('mes') == '1')
					{{ trans('messages.illegel') }}
			@endif
		@endif

		<br />
		<a href="/admin/editPasswd/{{ $member->id }}">{{ trans('messages.editPass') }}</a>

		<a href="/admin/omain">{{ trans('messages.home') }}</a>

	</body>

</html>