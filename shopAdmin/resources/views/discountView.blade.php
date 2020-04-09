<!DOCTYPE html>
<html>
	<head>
		<title>Discount Management</title>
	</head>



	<body>

		<p>
			<a href="/admin/discountCre">{{ trans('messages.disCreate') }}</a>
		</p>

		<table width="80%" border="1">
			<tr>
				<th>{{ trans('messages.reachMoney') }}</th>
				<th>{{ trans('messages.discountMon') }}</th>
				<th>{{ trans('messages.needLevel') }}</th>
				<th></th>
			</tr>


			@foreach($discount as $dis)
				<tr>
					<td>{{ $dis->ReachGold }}</td>
					<td>{{ $dis->Discount }}</td>
					<td>{{ $dis->Level }}</td>
					<td>
						<form action="/admin/discountEdit" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="<?php echo $dis->id ?>">
							<input type="submit" value="{{ trans('messages.edit') }}" />
						</form>
						<form action="/admin/discountDel" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="<?php echo $dis->id ?>">
							<input type="submit" value="{{ trans('messages.delete') }}" />
						</form>
					</td>
				</tr>

			@endforeach

		</table>

		<a href="/admin/omain">{{ trans('messages.home') }}</a>

	</body>

</html>