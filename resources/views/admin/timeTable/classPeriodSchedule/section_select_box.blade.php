<option selected disabled>Select Section</option> 
@foreach ($sections as $section) 
	<option value="{{ $section->id }}">{{ $section->sectionTypes->name }}</option>
	@endforeach