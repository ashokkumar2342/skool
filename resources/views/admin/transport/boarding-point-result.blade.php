@if ($routesDetail != null)
@php 

$data = explode(',',$routesDetail->boarding_point_id); 
@endphp
@foreach ($boardingPoints as $boardingPoint)

<tr>
	<td>{{ ++$loop->index }}</td>
	<td><input type="checkbox" class="checkbox" name="boarding_point_id[]"   {{ in_array($boardingPoint->id, $data)?'checked':'' }} value="{{ $boardingPoint->id }}"></td>

	<td>{{ $boardingPoint->name }}</td> 
</tr>
@endforeach
<tr>
	<td>
		<td colspan="2" class="text-left">   
	     <div class="checkbox">
	     	<label><input type="checkbox" name="morning" {{ $routesDetail->morning_time=='morning'?'checked':'' }} value="morning">Morning</label>
	     	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  <label><input type="checkbox" name="evening" {{ $routesDetail->evening_time=='evening'?'checked':'' }} value="evening">Evening</label>
		  
		</div>
		 
		</td>
		 
	</td>
</tr> 
@else
 @foreach ($boardingPoints as $boardingPoint)

 <tr>
 	<td>{{ ++$loop->index }}</td>
 	<td><input type="checkbox" class="checkbox" name="boarding_point_id[]" value="{{ $boardingPoint->id }}"></td>

 	<td>{{ $boardingPoint->name }}</td> 
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

