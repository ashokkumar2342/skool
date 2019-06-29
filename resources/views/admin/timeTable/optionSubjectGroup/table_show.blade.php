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
	  			 
	  			 <td>{{ $optionSubjectGroup->subjectType->name  or ''}} </td>
           
                          
                         
            
	  			<td>Group No : {{$optionSubjectGroup->group_no }}</td>
	  			

	  			<td><a href="{{ route('admin.optional.subject.group.delete',$optionSubjectGroup->id) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
	  		</tr>
  			 
  		@endforeach
  	</tbody>
  </table>