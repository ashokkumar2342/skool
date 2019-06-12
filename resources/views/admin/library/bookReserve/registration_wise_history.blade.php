 
 	
 
<div class="panel panel-default">
  <div class="panel-heading">Member Request History</div>
  <div class="panel-body">
  	<table class="table "> 
	<thead>
		<tr>
			<th>BooK Name</th>
			<th class="text-nowrap">Accession No</th>
			
			<th class="text-nowrap">Request Date</th>
			<th class="text-nowrap">Reserve Date</th>
			<th class="text-nowrap">Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($bookReserves as $bookReserve) 
			<tr>
				<td>{{ $bookReserve->booktype->name or ''}}</td>
				<td>{{ $bookReserve->bookAccession->accession_no or ''}}</td>
				
				<td>{{ date('d-m-Y',strtotime($bookReserve->request_date)) }}</td>
				<td>{{ $bookReserve->reserve_date }}</td>
				<td>  <span class="{{ $bookReserve->bookReserveStatus->admin_color or ''  }}">{{ $bookReserve->bookReserveStatus->name }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
  </div>

</div>
 

