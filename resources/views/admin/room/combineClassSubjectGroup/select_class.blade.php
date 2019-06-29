<div class="col-lg-4">
	<label>Class</label>
	<select name="class" class="form-control" id="class_id" multiselect="true" onchange="callAjax(this,'{{ route('admin.combine.class.select.class.wise.section') }}'+'?subject_id='+$('#subject_id').val()+'&class_id='+$('#class_id').val(),'select_class_wise_section')">
		<option  disabled selected>Select Class</option>
		 @foreach ($classTypes as $classType)
		 <option value="{{ $classType->classType_id }}">{{ $classType->classTypes->name }}</option>
		 
		 	 
		 @endforeach
	</select>
	
</div>