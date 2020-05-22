
  <label>Subject</label>
  <select name="subject" class="form-control" id="subject_id" danger-popup="true" onchange="callAjax(this,'{{ route('admin.teacher.subject.wise.period') }}'+'?class_id='+$('#class_id').val()+'&section_id='+$('#section_id').val(),'no_of_period')">
  	<option selected disabled>Select Subject</option> 
    @foreach ($subjects as $subject)
    <option value="{{ $subject->subjectType_id }}">{{ $subject->subjectTypes->name or ''}}</option> 
    @endforeach 
  </select>
  