<div class="col-lg-4">
                  <label>Group No</label>
                  <select name="group_no" class="form-control">
                    <option selected disabled>Select Group</option>
                    <option value="1">Group No 1</option>
                    <option value="2">Group No 2</option>
                    <option value="3">Group No 3</option>
                    
                  </select>
                  
                </div>
                <div class="col-lg-12" style="margin-top: 10px">
                	
<select class='pre-selected-options' name="subject_id[]" multiple='multiple'>
	@foreach($classSubjects as $classSubject)
		  <option value='{{ $classSubject->id }}'>{{ $classSubject->subjectTypes->name or '' }}</option> 
		@endforeach
   
</select>
  <div class="col-lg-3 text-center"> 
   <input type="submit" class="btn btn-success" style="margin :20px">
  </div>
                </div>




