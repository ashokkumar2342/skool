

  

 
	
<select class='pre-selected-options' name="section[]" multiple='multiple'> 
  @foreach ($sections as $section)
  @if (in_array($section->section_id,$combineClassSubjectSaveId))
    
  @else
  <option value="{{ $section->section_id }}">{{ $section->sectionTypes->name or '' }}</option>
  @endif
  @endforeach 
</select>

 <div class="form-group col-lg-3">
 	<label>Room No</label>
 	<select name="room_no" class="form-control">
 		<option  selected disabled>Select Room No</option>
 		 @foreach ($roomTypes as $roomType)
 		 <option value="{{ $roomType->id }}">{{ $roomType->name }}</option> 
 		 	 
 		 @endforeach
 	</select>
 	
 </div>
<div class="col-lg-1 text-center" >

	<input type="submit" class="btn btn-success" style="margin-top: 24px">
	
  </div>
  <button type="button" class="btn btn-default hidden" id="btn_table_show" onclick="callAjax(this,'{{ route('admin.combine.class.select.class.wise.table.show') }}'+'?subject_id='+$('#subject_id').val()+'&class_id='+$('#class_id').val(),'table_show')"></button>
  
<div id="table_show">
  
</div>



 <script type="text/javascript">
     

     $('#btn_table_show').click();
  </script>