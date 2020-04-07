<!DOCTYPE html>
<html>
	<head>
		<title>Owner Page</title>
	</head>



	<body>
		@if(isset($oUId))
			<a href="/ologout">登出</a>
			<a href="/ownerOrderView">訂單查詢</a>
			<a href="/">庫存管理</a>
			<a href="/">退貨管理</a>
			<a href="/">客戶回報</a>
			@if($oUserAuth == '1')
				<a href="/memberEdit">會員帳號管理</a>
				<a href="/">優惠管理</a>
			@endif
			<text>歡迎{{ $oUName }}</text>
		@else
			<a href="/ologin">請先登入</a>
		@endif

	</body>




</html>