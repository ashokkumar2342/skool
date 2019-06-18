<div class="col-lg-4"> 
<label>Section</label></br>
<select name="section" class="form-control" onchange="callAjax(this,'{{ route('admin.teacher.subject.wise.period') }}'+'?class_id='+$('#class_id').val(),'no_of_period')"> 
 <option selected disabled>Select Section</option> 
@foreach ($sections as $section) 
	<option value="{{ $section->section_id }}">{{ $section->sectionTypes->name }}</option>
	@endforeach
</select>
</div>
<div class="col-lg-4">
  <label>Subject</label>
  <select name="subject" class="form-control" success-popup="true">
  	<option selected disabled>Select Subject</option> 
    @foreach ($subjects as $subject)
    <option value="{{ $subject->subjectType_id }}">{{ $subject->subjectTypes->name }}</option> 
    @endforeach 
  </select> 
