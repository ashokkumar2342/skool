<table class="table" id="sms_list">
	<thead>
		<tr>
			<th>User Name</th>
			<th>Password</th>
			<th>Sender Name</th>
			<th>Url</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($smsApis as $smsApi)
				<tr>
					<td>{{ $smsApi->user_id }}</td>
					<td>{{ $smsApi->password }}</td>
					<td>{{ $smsApi->sender_id }}</td>
					<td>{{ $smsApi->url }}</td>
					<td>
						@if ($smsApi->status==1 )
						<a class="btn btn-success btn-xs" success-popup="true" button-click="btn_outhor_table_show" onclick="callAjax(this,'{{ route('admin.api.status',[$smsApi->id,1]) }}')">Active</i></a>
						@else	 
						<a class="btn btn-default btn-xs" success-popup="true" button-click="btn_outhor_table_show" onclick="callAjax(this,'{{ route('admin.api.status',[$smsApi->id,1]) }}')">In Active</i></a>
						@endif
						<button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.api.smsApiAdd',$smsApi->id) }}')" title="Edit"><i class="fa fa-edit"></i></button>
						<a success-popup="true" button-click="btn_outhor_table_show" onclick="callAjax(this,'{{ route('admin.api.smsApidelete',$smsApi->id) }}')" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
					</td>
				</tr> 
		@endforeach
	</tbody>
</table>
