<option selected disabled>Select Section</option> 
@foreach ($sections as $section)
<option value="{{ $section->section_id }}">{{ $section->sectionTypes->name }}</option> 	 
@endforeach