
<table class="table border table-striped table-bordered">
	 
	<thead>
		<tr>
			<th>name</th>
			<th>Registration No</th>
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Mobile No</th>
			<th>E-mail ID</th>
			<th>Address</th>
			 
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $students->name }}</td>
			<td>{{ $students->registration_no }}</td>
			<td>{{ $students->parents[0]->parentInfo->name or '' }}</td>
			<td>{{ $students->parents[1]->parentInfo->name or '' }}</td>
			<td>{{ $students->addressDetails->address->primary_mobile or '' }}</td>
			<td>{{ $students->addressDetails->address->primary_email or '' }}</td>
			<td>{{ $students->addressDetails->address->p_address or ''}}</td>
		</tr>
	</tbody>
</table>
<form class="form-inline" id="show_fee_detail_form">
  {{ csrf_field() }}  
  <div class="form-group">
    <input type="hidden" name="student_id" value="{{ $student->id }}">
    <label for="email">Fee Paid Upto:</label> 
    
  {{--   <select name="month" class="form-control">
    	<option value="" selected disabled>Select Month</option>
    	@foreach ($months as $month)
    	 <option value="{{ $month->id }}" {{ $month->id==$defultDate->month }}>{{ $month->name }}</option>
    	@endforeach
     
    </select>   --}} 
    <select name="StudentFeeDetailMonthYear" class="form-control">    	
    	@foreach ($StudentFeeDetailMonthYears as $StudentFeeDetailMonthYear)
    	 <option value="{{ $StudentFeeDetailMonthYear }}"> {{date("M-Y",strtotime($StudentFeeDetailMonthYear)) }} </option>
    	@endforeach
     
    </select>
    
      
     
  </div> 
  <button type="button" id="fee_collection_details_btn" class="btn btn-warning" onclick="callAjax()">Show</button>
</form>
 
 