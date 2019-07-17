

<table class="table"> 
	<thead>
		<tr>
			<th>Teacher Name</th>
			<th>From Period</th>
			<th>To period</th>
			<th>Action</th>
			 
		</tr>
	</thead>
	<tbody>
		 
		@foreach ($teacherAbsents as $teacherAbsent)
		 <input type="hidden" name="teacher_id[]" value="{{ $teacherAbsent->teacher_id }}">
				<tr>
					<td>{{ $teacherAbsent->teacherFaculty->name or '' }}</td>
					<td>{{ $teacherAbsent->periodTiming->from_time or '' }}</td>
					<td>{{ $teacherAbsent->periodTimings->from_time or '' }}</td>
					 <td><a href="#" id="btn_teacher_adjust_view"  onclick="callPopupLarge(this,'{{ route('admin.teacher.adjustment.view',$teacherAbsent->teacher_id) }}','','')" class="btn btn-info btn-xs" title="View"><i class="fa fa-eye"></i></a>

					 	<a href="#" button-click="teacher_absent_show" onclick="callAjax(this,'{{ route('admin.teacher.absent.dalete',$teacherAbsent->id) }}','','')" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>
					 </td>
				</tr> 

		@endforeach 
	</tbody>
</table>
<div class="col-lg-10 text-center">
	     @php
          $TeacherAdjustment=App\Model\TimeTable\TeacherAdjustment::where('teacher_absent_id',$teacherAbsent->teacher_id)->first(); 
        @endphp
         @if (empty($TeacherAdjustment))
       <button type="submit"class="btn  btn-primary" id="btn_make_adjustment" style="margin-right: 25px">Make Adjustment</button> 
       @endif 
           
           
</div>
</form>