<div class="col-lg-6"> 

<label class="text-nowrap">Accession No</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) 
	<option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->accession_no }}</option>
	@endforeach
	 
 
</div>
<label>Status</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) </br>
	<span class="{{ $bookAccessionWiseName->libraryStatus->color or ''  }}">{{ $bookAccessionWiseName->libraryStatus->name or '' }}</span>
	{{-- <option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->libraryStatus->name }}</option> --}}
	@endforeach
	 
 
</div>
