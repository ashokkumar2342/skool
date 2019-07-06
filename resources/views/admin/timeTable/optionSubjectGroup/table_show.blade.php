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
	  			

	  			<td> 
            <a href="#" {{-- button-click="btn_table_show" --}} success-popup="true" onclick="return confirm('Are you sure to delete this data ?')?callAjax(this,'{{ route('admin.optional.subject.group.delete',$optionSubjectGroup->id) }}','',hideDiv):''" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
	  		</tr>
  			 
  		@endforeach
  	</tbody>
  </table>

  <script>
  function hideDiv(){
    $('#class_id').trigger('change')
  }
</script>  