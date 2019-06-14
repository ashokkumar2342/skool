              
                 
 @php 

 if (!empty($optionSubjectGroup->subject_id)) {
     $arraySubjectId =explode(',', $optionSubjectGroup->subject_id);
 }else{
    $arraySubjectId=[];
 }
    
  
 @endphp
                	
<select class='pre-selected-options' name="subject_id[]" multiple='multiple'>
	@foreach($classSubjects as $classSubject)
		  <option value='{{ $classSubject->subjectType_id }}'{{ in_array($classSubject->subjectType_id,$arraySubjectId)?'selected':'' }}>{{ $classSubject->subjectTypes->name or '' }}</option> 
		@endforeach
   
</select>
  <div class="col-lg-3 text-center"> 
   <input type="submit" class="btn btn-success" style="margin :20px">
  </div>
                




