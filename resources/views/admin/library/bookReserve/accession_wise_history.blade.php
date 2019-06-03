 
	 
{{-- <div class="panel panel-default">
  <div class="panel-heading">Book Request History</div>
  <div class="panel-body">
  	<table class="table"> 
	<thead>
		<tr>
			  
			<th style="white-space: nowrap;">Registration No</th>
			<th>BooK Name</th>
			<th style="white-space: nowrap;">Request Date</th>
			<th style="white-space: nowrap;">Reserve Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($bookReserves as $bookReserve) 
			<tr>
				 
				<td>{{ $bookReserve->memberShipDetails->member_ship_registration_no or ''}}</td>
				<td>{{ $bookReserve->booktype->name or ''}}</td>
				<td>{{date('d-m-Y',strtotime( $bookReserve->request_date)) }}</td>
				<td>{{ $bookReserve->reserve_date }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
  </div>
</div> --}}
