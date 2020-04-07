<!DOCTYPE html>
<html>
	<head>
		<title>Member Edit Page</title>
	</head>

	<body>
		<text>{{ trans('messages.editData') }}</text><br />
		<text>{{ trans('messages.userName') }}： {{ $member->UserName }}</text><br />
		
		<form action="/memberEditPost" method="POST">
			{{ csrf_field() }}
			<text>密碼: </text>
			<input type="text" name="passWd" id="passWd" value="{{ $member->Passwd }}" required="required" /><br />
			<text>姓名: </text>
			<input type="text" name="name" id="name" value="{{ $member->Name }}" required="required" /><br />
			<text>電話: </text>
			<input type="text" name="phone" id="phone" value="{{ $member->Phone }}" required="required" /><br />
			<text>住址: </text>
			<input type="text" name="address" id="address" value="{{ $member->Address }}" required="required" /><br />
			<text>等級: </text>
			<input type="text" name="level" id="level" value="{{ $member->Level }}" required="required" /><br />
			<text>盤子: </text>
			<input type="text" name="gold" id="gold" value="{{ $member->Gold }}" required="required" /><br />

			<input type="hidden" name="id" id="id" value="{{ $member->id }}" required="required" /><br />

			<input type="submit" value="修改" />
					
		</form>

	</body>

</html>