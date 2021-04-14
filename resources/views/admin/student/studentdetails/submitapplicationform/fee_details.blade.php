<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Date of birth</th>
			<th>Class</th>
			<th>Aadhaar No.</th>
			<th>Gender</th> 
		</tr>
	</thead>
	<tbody>
		 
			<tr>
				<td>{{ $student->name }}</td>
				 <input type="hidden" name="student_id" value="{{ $student->id }}">
				<td>{{ date('d-m-Y',strtotime($student->dob)) }}</td>
				<td>{{ $student->classes->name or '' }}</td>
				<td>{{ $student->adhar_no or '' }}</td>
				<td>{{ $student->genders->genders or '' }}</td>
			</tr>
		 
	</tbody>
</table>
</div>
<div class="col-lg-4">
	<label>Fee</label>
	<input type="text" name="fee" readonly="" class="form-control" value="{{ $AdmissionSeat->form_fee }}">
	
</div>
<div class="col-lg-2">
	<label>Payment Mode</label>
	<select name="payment_mode" class="form-control">
		@foreach ($paymentModes as $paymentMode)
		    <option value="{{ $paymentMode->id }}">{{ $paymentMode->name }}</option> 
		@endforeach
	</select>
	
</div>
@php
	$admissionApplication=App\Model\AdmissionApplication::where('student_id',$student->id)->first();
@endphp

  @if ($admissionApplication->status==2)
		<div class="col-lg-12 text-center" style="margin-top: 20px"> 
			<input type="submit" hidden class="btn btn-warning" value="Receipt"> 
		</div>
  @endif