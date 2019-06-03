 
 	
 
<div class="panel panel-default">
  <div class="panel-heading">Member Request History</div>
  <div class="panel-body">
  	<table class="table "> 
	<thead>
		<tr>
			<th class="text-nowrap">Accession No</th>
			<th>BooK Name</th>
			<th class="text-nowrap">Request Date</th>
			<th class="text-nowrap">Reserve Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($bookReserves as $bookReserve) 
			<tr>
				<td>{{ $bookReserve->bookAccession->accession_no or ''}}</td>
				<td>{{ $bookReserve->booktype->name or ''}}</td>
				<td>{{ date('d-m-Y',strtotime($bookReserve->request_date)) }}</td>
				<td>{{ $bookReserve->reserve_date }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
  </div>

</div>
 

