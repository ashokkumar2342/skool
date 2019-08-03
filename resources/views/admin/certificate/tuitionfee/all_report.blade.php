 
@if ($reportWise==2)
<div class="col-lg-4">
	<label>Registration No</label>
	<select name="registration_no" class="form-control select2">
		<option selected disabled>Select Option</option>
		@foreach ($registrationNOs as $registrationNO)
		<option  value="{{ $registrationNO->id }}">{{ $registrationNO->registration_no }}</option> 
		@endforeach
	</select> 
</div>
@endif
@if ($reportWise==3)
<div class="col-lg-4">
	<label>class</label>
	<select name="class_id" class="form-control select2">
		<option selected disabled>Select Option</option>
		@foreach ($classTypes as $classType)
		<option  value="{{ $classType->id }}">{{ $classType->name }}</option> 
		@endforeach
	</select> 
</div>
@endif
@if ($reportWise==4)
<div class="col-lg-3">
	<label>Class</label>
	<select name="class_id" class="form-control select2" onchange="callAjax(this,'{{ route('admin.student.certificateIssu.report.class.with.section') }}','section_div_page')">
		<option selected disabled>Select Option</option>
		@foreach ($classTypes as $classType)
		<option  value="{{ $classType->id }}">{{ $classType->name }}</option> 
		@endforeach
	</select> 
</div>
<div class="col-lg-3">
	<label>Section</label>
	<select name="section_id" class="form-control select2" id="section_div_page">
		 
	</select> 
</div>
@endif