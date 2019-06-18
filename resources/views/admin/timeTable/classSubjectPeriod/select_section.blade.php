<div class="col-lg-4" > 
	<label> Section</label></br>
	<select name="section[]" class="form-control multiselect" multiple="multiple">
	{{-- <option selected disabled>Select Section</option>  --}}
	 
	@foreach ($sections as $section) 
		<option value="{{ $section->section_id }}">{{ $section->sectionTypes->name }}</option>
		@endforeach
	</select>
</div>

 <div class="col-lg-4">
    <label>Subject</label></br>
    <select name="subject[]" class="form-control multiselect" multiple="multiple">
   {{--  <option selected disabled>Select Subject</option> --}}
      @foreach($subjects as $subject)
      <option value="{{ $subject->subjectType_id }}">{{ $subject->subjectTypes->name }}</option> 
      @endforeach 
    </select> 
  </div>