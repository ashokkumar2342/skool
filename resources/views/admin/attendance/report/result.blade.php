<table class="table table-striped table-bordered table-hover" id="attendance_result_table">
	<thead>
		<tr>
			<th>Class</th>
			<th>Section</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($sections as $section)
		    
		        <tr> 
					<td>{{ $section->classes->name or '' }}</td>
					<td>{{ $section->sectionTypes->name or '' }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>