<table class="table" id="sms_list">
	<thead>
		<tr>
			<th>User Name</th>
			<th>Password</th>
			<th>Sender Name</th>
			<th>Url</th>
			<th>Enable Auto Send</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($smsApis as $smsApi)
				<tr style="{{ $smsApi->status==1?'background-color: #95e49b':'' }}">
					<td>{{ $smsApi->user_id }}</td>
					<td>{{ $smsApi->password }}</td>
					<td>{{ $smsApi->sender_id }}</td>
					<td>{{ $smsApi->url }}</td>
					<td>{{ $smsApi->enableautosend==1?'Yes' : 'No'}}</td>
					<td>
						@if ($smsApi->status==1 )
						<a class="btn btn-success btn-xs" success-popup="true" button-click="btn_outhor_table_show" style="width:60px" onclick="callAjax(this,'{{ route('admin.api.status',[$smsApi->id,1]) }}')">Active</i></a>
						@else	 
						<a class="btn btn-default btn-xs" success-popup="true" button-click="btn_outhor_table_show" style="width:60px" onclick="callAjax(this,'{{ route('admin.api.status',[$smsApi->id,1]) }}')">Inactive</i></a>
						@endif
						<a href="#" onclick="callPopupLarge(this,'{{ route('admin.api.test.message',1) }}')" title="Test Message" class="btn btn-warning btn-xs">Test Message</a>
						<button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.api.smsApiAdd',Crypt::encrypt($smsApi->id)) }}')" title="Edit"><i class="fa fa-edit"></i></button> 
						{{-- @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)  --}}
                          <a  href="#" success-popup="true" button-click="btn_outhor_table_show" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.api.smsApidelete',Crypt::encrypt($smsApi->id)) }}') } else{console_Log('cancel') }"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
                         {{-- @endif --}}
						
					</td>
				</tr> 
		@endforeach
	</tbody>
</table>
