 <div class="col-md-4"> 
 {{ Form::label('sub_menu','Class Assign',['class'=>' control-label']) }} <br>
<select class="form-control"   id="class_id"  multiselect-form="true" name="class_id"  onchange="callAjax(this,'{{route('admin.account.classAccess')}}'+'?id='+this.value+'&class_id='+$('#class_id').val()+'&user_id='+$('#user_id').val(),'class_list')" > 
		<option value="" selected="" disabled="">Select Class</option> 
		 
      @foreach ($classes as $class)   
        <option value="{{ $class->id }}">{{ $class->name or '' }}</option>  
      @endforeach 
</select>
</div>
 <div class="col-md-4" id="class_list"> 
</div>
<br>
  <a href="{{ route('admin.account.class.user.assign.report.generate',$user_id) }}" class="btn btn-primary btn-sm pull-right" style="margin: 10px" target="blank">PDF Report</a>
<table class="table  table-bordered table-striped" id="class_section_list">
	<thead>
		<tr>
			<th>Class</th>
			<th>Section</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($userClassTypes as $userClassType)
					<tr>
						<td>{{ $userClassType->classes->name or ''}}</td>
						<td>{{ $userClassType->sectionTypes->name or ''}}</td>
						 
					</tr> 
		@endforeach
	</tbody>
</table> 
 
