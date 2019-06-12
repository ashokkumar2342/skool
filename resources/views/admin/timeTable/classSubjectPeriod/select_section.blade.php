<div class="col-lg-4" > 
	<label>Select Section</label></br>
	<select name="section_id[]" class="form-control multiselect" multiple> 
	 
	@foreach ($sections as $section) 
		<option value="{{ $section->id }}">{{ $section->sectionTypes->name }}</option>
		@endforeach
	</select>
</div>
 <div class="col-lg-4">
    <label>Subject</label></br>
    <select name="subject_id[]" class="form-control multiselect"  multiple="multiple">
  
      @foreach($subjects as $subject)
      <option value="{{ $subject->subjectType_id }}">{{ $subject->subjectTypes->name }}</option> 
      @endforeach 
    </select> 
  </div>