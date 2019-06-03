 
	<label class="text-nowrap">Accession No</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) 
	<option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->accession_no }}</option>
	@endforeach
	  
 
<label>Status</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) 
	<option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->libraryStatus->name }}</option>
	@endforeach
	 
	
</div>