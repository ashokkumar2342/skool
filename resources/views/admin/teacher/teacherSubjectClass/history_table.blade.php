<div class="col-lg-12 text-center">
<table class="table text-center" id="data_table"> 
	<thead>
		<tr>
			 
			<th>Class</th>
			<th>Section</th>
			<th>Subject</th>
			<th>No of Period</th>
			 
			 
		</tr>
	</thead>
	<tbody>
    
		@foreach ($teacherSubjectClasss as $teacherSubjectClass) 
				<tr>
					{{-- <td>{{ $teacherSubjectClass->teacherFaculty->name or '' }}</td> --}}
					<td>{{ $teacherSubjectClass->classTypes->name or '' }}</td>
					<td>{{ $teacherSubjectClass->sectionTypes->name or '' }}</td>
					<td>{{ $teacherSubjectClass->subjectType->name or '' }}</td>
					<td>{{ $teacherSubjectClass->no_of_period or ''}}</td>
					 
					 
				</tr>
				
		@endforeach
		<tr>
			  <td> </td>
			  <td> </td>
			  <td> </td>
   
		 <td><h4><b>Total : {{ $teacherSubjectClasss->sum('no_of_period') }}</b></h4></td>
		</tr>

	</tbody>
</table>
 
</div>