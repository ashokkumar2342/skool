<table class="table" id="quotes_dataTable"> 
	<thead>
		<tr>
			<th>Date</th>
			<th>Quotes</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($Quotes as $Quote)
			 
		<tr>
			<td>{{ date('d-m-Y',strtotime($Quote->date )) }}</td>
			<td>{{ $Quote->discription }}</td>
			<td>
				<a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.school.details.quotes.edit',$Quote->id) }}')"><i class="fa fa-edit"></i></a> 

				<a href="{{ route('admin.school.details.quotes.delete',$Quote->id) }}" title="Edit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>