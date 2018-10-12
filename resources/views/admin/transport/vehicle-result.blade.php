@if ($routesVehicle != null)
@php 

$data = explode(',',$routesVehicle->vehicle_id); 
@endphp
@foreach ($vehicles as $vehicle)

<tr>
	<td>{{ ++$loop->index }}</td>
	<td><input type="checkbox" class="checkbox" name="vehicle_id[]"   {{ in_array($vehicle->id, $data)?'checked':'' }} value="{{ $vehicle->id }}"></td>

	<td>{{ $vehicle->vehicleType->vehicle_type or ''}}</td> 
	<td>{{ $vehicle->registration_no }}</td> 
</tr>
@endforeach
<tr>
	<td>
		<td colspan="2" class="text-left">   
	     <div class="checkbox">
	     	<label><input type="checkbox" name="morning" {{ $routesVehicle->morning_time=='morning'?'checked':'' }} value="morning">Morning</label>
	     	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  <label><input type="checkbox" name="evening" {{ $routesVehicle->evening_time=='evening'?'checked':'' }} value="evening">Evening</label>
		  
		</div>
		 
		</td>
		 
	</td>
</tr> 
@else
 @foreach ($vehicles as $vehicle)

 <tr>
 	<td>{{ ++$loop->index }}</td>
 	<td><input type="checkbox" class="checkbox" name="vehicle_id[]" value="{{ $vehicle->id }}"></td>

 	<td>{{ $vehicle->name }}</td> 
 </tr>
 @endforeach
 <tr>
 	<td>
 		<td colspan="2" class="text-left">   
 	     <div class="checkbox">
 	     	<label><input type="checkbox" name="morning" value="morning">Morning</label>
 	     	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 		  <label><input type="checkbox" name="evening" value="evening">Evening</label>
 		  
 		</div>
 		 
 		</td>
 		 
 	</td>
 </tr>
@endif

