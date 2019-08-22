@if ($reportWise==5)
<div class="col-lg-3">
	<label>Date</label> 
	<input type="text" name="dates" class="form-control">
</div>
@endif
@if ($reportWise==2)
<div class="col-lg-3">
	<label>Registration No</label>
	<select name="registration_no"  id="registration_no" class="form-control select2">
	   <option disabled selected>Select Class</option>
	   @foreach ($registrations as $registration)
	    <option value="{{ $registration->id }}">{{ $registration->registration_no }}</option>
	   @endforeach
	 </select> 
	</div>     
@endif
@if ($reportWise==3)
 <div class="col-lg-3"> 
  <label>Class</label>
    <select name="class_id" class="form-control">
       <option disabled selected>Select Class</option>
       @foreach ($classTypes as $classType)
        <option value="{{ $classType->id }}">{{ $classType->name }}</option>
       @endforeach
     </select> 
  </div>
  @endif 
  @if ($reportWise==4)
 <div class="col-lg-3"> 
  <label>Class</label>
    <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
       <option disabled selected>Select Class</option>
       @foreach ($classTypes as $classType)
        <option value="{{ $classType->id }}">{{ $classType->name }}</option>
       @endforeach
     </select> 
  </div> 
  <div class="col-lg-3">
    <label>Section</label>
     <select name="section_id" class="form-control" id="section_div"> 
     </select> 
  </div>
  @endif
   