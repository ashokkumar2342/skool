 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
	<thead>
		<tr>
			<th>Sr.No.</th>
			<th>House Name</th>
			<th>House Code</th>
			<th>Action</th>
			 
		</tr>
	</thead>
	<tbody>
		@php
			$arryId=1;
		@endphp
		@foreach ($houses as $house)
				<tr>
					<td>{{ $arryId ++ }}</td>
					<td>{{ $house->name }}</td>
					<td>{{ $house->code }}</td>
					<td>

						<button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.house.edit',$house->id) }}')" title="Edit"><i class="fa fa-edit"></i></button>
						 <a href="{{ route('admin.house.delete',$house->id) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					</td>
				</tr> 
		@endforeach
	</tbody>
</table>