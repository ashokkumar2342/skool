@if ($routesDetail != null)
@php 

$data = explode(',',$routesDetail->boarding_point_id); 
@endphp
@foreach ($boardingPoints as $boardingPoint)
<tr style="{{ in_array($boardingPoint->id, $data)?'display: none':'' }}" >
	<td>{{ ++$loop->index }}</td>
	<td><input type="checkbox" class="checkbox" name="boarding_point_id[]"   {{ in_array($boardingPoint->id, $data)?'checked':'' }} value="{{ $boardingPoint->id }}"></td>

	<td>{{ $boardingPoint->name }}</td> 
	<td><input type="time" value="09:00" name="morning_time[]"></td> 
	<td><input type="time" value="14:30" name="evening_time[]"></td> 
</tr>
@endforeach
 
@else
 @foreach ($boardingPoints as $boardingPoint)

 <tr>
 	<td>{{ ++$loop->index }}</td>
 	<td><input type="checkbox" class="checkbox" name="boarding_point_id[]" value="{{ $boardingPoint->id }}"></td>

 	<td>{{ $boardingPoint->name }}</td> 
 	<td><input type="time" value="09:00" name="morning_time[]"></td> 
 	<td><input type="time" value="14:30" name="evening_time[]"></td>
 </tr>
 @endforeach
  
@endif


