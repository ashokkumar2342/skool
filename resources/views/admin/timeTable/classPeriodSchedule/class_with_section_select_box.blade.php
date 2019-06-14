
<div class="col-lg-3">
  <label>Class</label></br>
   <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.class.period.schedule.class.wise.section') }}','select_section')"> 
   	<option selected disabled>Select Class</option>
    @foreach ($classTypes as $classType) 
      <option value="{{ $classType->id }}">{{ $classType->name }}</option>
    @endforeach 
    </select> 
</div>
<div class="col-lg-3">
<label>Section</label>
<select name="section_id" class="form-control" id="select_section"> 
	<option selected disabled>Select Section</option>}
	option
</select>
</div>