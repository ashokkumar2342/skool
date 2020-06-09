<div class="col-lg-3 form-group">
	<label>Section</label>
	<select name="section_id" id="section_id" class="form-control">
		@foreach ($sections as $section)
		<option value="{{ $section->id }}"{{ $section->id==$StudentDefaultValue->section_id?'selected':'' }}>{{ $section->name }}</option> 
		@endforeach
	</select> 
</div>
<div class="col-lg-3 form-group">
	<label>Subject</label>
	<select name="subject" id="subject" class="form-control">
		@foreach ($subjects as $subject)
		<option value="{{ $subject->id }}">{{ $subject->subjectTypes->name or ''}}</option> 
		@endforeach
	</select> 
</div> 
 
 