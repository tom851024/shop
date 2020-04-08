<!DOCTYPE html>
<html>
	<head>
		<title>Owner Page</title>
	</head>



	<body>
		@if(isset($oUId))
			<a href="/admin/ologout">{{ trans('messages.logout') }}</a>
			<a href="/admin/ownerOrderView">{{ trans('messages.orderSearch') }}</a>
			<a href="/">{{ trans('messages.warehouse') }}</a>
			<a href="/">{{ trans('messages.cusReport') }}</a>
			@if($oUserAuth == '1')
				<a href="/admin/memberEdit">{{ trans('messages.memberOEdit') }}</a>
				<a href="/">{{ trans('messages.discount') }}</a>
			@endif
			<text>{{ trans('messages.welcome') }} {{ $oUName }}</text>
		@else
			<a href="/admin/ologin">{{ trans('messages.loginFirst') }}</a>
		@endif

	</body>




</html>