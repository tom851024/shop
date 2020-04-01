<!DOCTYPE html>
<html>
	<head>
		<title>Owner Page</title>
	</head>



	<body>
		@if(isset($oUId))
			<text>歡迎{{ $oUId }}</text>
		@else
			<a href="/ologin">請先登入</a>
		@endif

	</body>




</html>