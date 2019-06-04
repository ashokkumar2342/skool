 
	

 <div class="col-lg-4"> 
 
	<label class="text-nowrap">Accession No</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) 
	<option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->accession_no }}</option>
	@endforeach
	  
 </div>
 <div class="col-lg-4">
    <label>Status</label>
 
	@foreach ($bookAccessionWiseNames as $bookAccessionWiseName) </br>
	<span class="{{ $bookAccessionWiseName->libraryStatus->student_color or ''  }}">{{ $bookAccessionWiseName->libraryStatus->name or '' }}</span>
	{{-- <option value="{{ $bookAccessionWiseName->id }}">{{ $bookAccessionWiseName->libraryStatus->name }}</option> --}}
	@endforeach
	 
	
</div>
</div>