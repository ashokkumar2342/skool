<table class="table" id="sms_list">
	<thead>
		<tr>
			<th>Host</th>
			<th>Port</th>
			<th>Username</th>
			<th>Password</th>
			<th>Encryption</th>
			<th>From</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($smsApis as $smsApi)
				<tr style="{{ $smsApi->status==1?'background-color: #95e49b':'' }}">
					<td>{{ $smsApi->host }}</td>
					<td>{{ $smsApi->port }}</td>
					<td>{{ $smsApi->username }}</td>
					<td>{{ $smsApi->password }}</td>
					<td>{{ $smsApi->encryption }}</td>
					<td>{{ $smsApi->mail_from }}</td>
					<td>
						@if ($smsApi->status==1 )
						<button class="btn btn-success btn-xs" success-popup="true" button-click="btn_homework_table_show" onclick="callAjax(this,'{{ route('admin.api.status',[$smsApi->id,2]) }}')">Active</i></button>
						@else	 
						<button class="btn btn-default btn-xs" success-popup="true" button-click="btn_homework_table_show" onclick="callAjax(this,'{{ route('admin.api.status',[$smsApi->id,2]) }}')">Inactive</i></button>
						@endif


						<button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.api.emailApiAdd',$smsApi->id) }}')" title="Edit"><i class="fa fa-edit"></i></button>
						<a success-popup="true" button-click="btn_homework_table_show" onclick="callAjax(this,'{{ route('admin.api.emailApidelete',$smsApi->id) }}')" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
					</td>
				</tr> 
		@endforeach
	</tbody>
</table>
