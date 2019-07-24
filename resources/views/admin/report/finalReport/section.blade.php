 
    <select name="section_id" class="form-control">
    	<option disabled selected>Select Section</option>
    	 @foreach ($classWiseSections as $classWiseSection)
    	  <option value="{{ $classWiseSection->section_id }}">{{ $classWiseSection->sectionTypes->name }}</option>
    	 @endforeach
   