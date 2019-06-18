
                	
<select class='pre-selected-options' name="subject_id[]" multiple='multiple'>
	@foreach($classSubjects as $classSubject)
  @if (in_array($classSubject->subjectType_id,$optionSubjectArrayId))
  
     @else
        <option value='{{ $classSubject->subjectType_id }}'>{{ $classSubject->subjectTypes->name or '' }}</option>  
   @endif 
 
      
		@endforeach
   
</select>
  <div class="col-lg-3 text-center"> 
   <input type="submit" class="btn btn-success" style="margin :20px">
  </div>
  <button type="button"  class="btn btn-default hidden" id="btn_table_show" onclick="callAjax(this,'{{ route('admin.option.table.show') }}'+'?class_id='+$('#class_id').val()+'&group_id='+$('#group_id').val(),'table_show')"></button>
                
<div id="table_show">
  
</div>


 <script type="text/javascript">
     

     $('#btn_table_show').click();
  </script>
