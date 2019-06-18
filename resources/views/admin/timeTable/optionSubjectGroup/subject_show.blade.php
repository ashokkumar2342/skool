
                	
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
  <table class="table" id="table_history"> 
  	<thead>
  		<tr>
  			 
  			<th>Subject</th>
  			<th>Group</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach ($optionSubjectGroups as $optionSubjectGroup)
	  		<tr>
	  			 
	  			 <td> 
                           @foreach (explode(',', $optionSubjectGroup->subject_id) as $sub_id)
                           {{ App\Model\SubjectType::find($sub_id)->name }},
                          @endforeach
                         
                        </td>
	  			<td>Group No : {{$optionSubjectGroup->group_no }}</td>
	  			

	  			<td><a href="{{ route('admin.optional.subject.group.delete',$optionSubjectGroup->id) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
	  		</tr>
  			 
  		@endforeach
  	</tbody>
  </table>
                




