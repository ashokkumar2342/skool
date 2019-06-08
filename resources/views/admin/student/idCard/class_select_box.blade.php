 <div class="col-lg-3" style="text-align:left"> 

 <label>Class</label><br>
 <select name="class_id[]" class="multiselect" multiple="multiple" > 
 	@foreach ($classTypes as $classType) 
 	<option value="{{ $classType->id }}">{{ $classType->name }}</option>
 	@endforeach
 	 
 </select>
 </div>