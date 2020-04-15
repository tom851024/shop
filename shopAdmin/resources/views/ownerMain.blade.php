<!DOCTYPE html>
<html>
	<head>
		<title>Owner Page</title>
	</head>



	<body>
		@if(isset($oUId))
			<a href="/admin/ologout">{{ trans('messages.logout') }}</a>
			<a href="/admin/ownerOrderView">{{ trans('messages.orderSearch') }}</a>
			<a href="/admin/warehouse">{{ trans('messages.warehouse') }}</a>
			<a href="/admin/viewReport">{{ trans('messages.cusReport') }}</a>
			<a href="/admin/backView">{{ trans('messages.applyBack') }}</a>
			@if($oUserAuth == '1')
				<a href="/admin/memberEdit">{{ trans('messages.memberOEdit') }}</a>
				<a href="/admin/discountMan">{{ trans('messages.discount') }}</a>
				<a href="/admin/oRegister">{{ trans('messages.oregister') }}</a>
				<a href="/admin/level">{{ trans('messages.levelMan') }}</a>
			@endif
			<text>{{ trans('messages.welcome') }} {{ $oUName }}</text>
			<a href="/admin/ochinese">中文</a>&nbsp;
			<a href="/admin/oenglish">English</a>
		@else
			<a href="/admin/ologin">{{ trans('messages.loginFirst') }}</a>
		@endif

	</body>




</html>