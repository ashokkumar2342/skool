 
	

 <div class="col-lg-4"> 
 
	<label class="text-nowrap">Accession No</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) 
	<option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->accession_no }}</option>
	@endforeach
	  
 </div>
 <div class="col-lg-4">
    <label>Status</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) </br>
	<span class="{{ $bookAccessionWiseName->libraryStatus->student_color or ''  }}">{{ $bookAccessionWiseName->libraryStatus->name or '' }}</span>
	{{-- <option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->libraryStatus->name }}</option> --}}
	@endforeach
	 
	
</div>
</div>
<table class="table"> 
	<thead>
		<tr> 
			<th class="text-nowrap">Registration No</th>
			<th class="text-nowrap">Request Date</th>
			<th class="text-nowrap">Reserve Date</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($bookReserveHis as $bookReserveHi) 
			<tr>
				 
				<td>{{  $bookReserveHi->memberShipDetails->member_ship_registration_no or ''}}</td>
				<td>{{date('d-m-Y',strtotime( $bookReserveHi->request_date)) }}</td>
				<td>{{ $bookReserveHi->reserve_date==null? '' : date('d-m-Y',strtotime($bookReserveHi->reserve_date)) }}</td>
				<td> <span class="{{ $bookReserveHi->bookReserveStatus->color or ''  }}">{{ $bookReserveHi->bookReserveStatus->name or ''}}</span></td>
			</tr>
		@endforeach
	</tbody>
</table>