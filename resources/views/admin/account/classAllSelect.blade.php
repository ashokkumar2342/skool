 {{ Form::label('sub_menu','Class Assign',['class'=>' control-label']) }} <br>
<select class="form-control"   id="class_id"  multiselect-form="true" name="class_id"  onchange="callAjax(this,'{{route('admin.account.classAccess')}}'+'?id='+this.value+'&class_id='+$('#class_id').val()+'&user_id='+$('#user_id').val(),'class_list')" > 
		<option value="" selected="" disabled="">Select Class</option> 
		 
      @foreach ($classes as $class)   
        <option value="{{ $class->id }}">{{ $class->name or '' }}</option>  
      @endforeach 
</select>
