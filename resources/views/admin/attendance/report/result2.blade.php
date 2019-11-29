 	 
	 
<table class="table table-striped table-bordered table-condensed table-responsive table-hover" id="attendance_result_table">
	<thead>
		<tr>
			<th>Class/Section</th>
			<th>Attendance Mark By</th>
			<th>Attendance Virified By</th>
			<th>Attendance SMS Send By</th>
			 
		</tr>
	</thead>
	<tbody>
		@foreach ($sections as $section)
		  @php
		      $atteClass=App\Model\StudentAttendanceClass::where('class_id',$section->class_id)
		                                                  ->where('section_id',$section->section_id)
		                                                  ->whereDate('date',$date)->get();

		  @endphp
		  @if ($report_for==1) 
              @if (empty($atteClass->first()->last_updated_by)) 
				<tr @if (!empty($atteClass->first()->sms_sent_by)) style="background-color: #61e66b @endif" @if (!empty($atteClass->first()->verified_by)) style="background-color: #f8af3b @endif" @if (!empty($atteClass->first()->last_updated_by)) style="background-color: #747ddd @endif" style="background-color: #f64d56"> 
					<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
					<td>{{ $atteClass->first()->admins->first_name or ''}}</td>
					<td>{{ $atteClass->first()->verifieds->first_name or ''}}</td>
					<td>{{ $atteClass->first()->sendBy->first_name or ''}}</td> 
				</tr>
		     @endif
		   @endif
		   @if ($report_for==2) 
              @if (empty($atteClass->first()->verified_by)) 
				<tr @if (!empty($atteClass->first()->sms_sent_by)) style="background-color: #61e66b @endif" @if (!empty($atteClass->first()->verified_by)) style="background-color: #f8af3b @endif" @if (!empty($atteClass->first()->last_updated_by)) style="background-color: #747ddd @endif" style="background-color: #f64d56"> 
					<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
					<td>{{ $atteClass->first()->admins->first_name or ''}}</td>
					<td>{{ $atteClass->first()->verifieds->first_name or ''}}</td>
					<td>{{ $atteClass->first()->sendBy->first_name or ''}}</td> 
				</tr>
		     @endif
		   @endif
		   @if ($report_for==3) 
              @if (empty($atteClass->first()->sms_sent_by)) 
				<tr @if (!empty($atteClass->first()->sms_sent_by)) style="background-color: #61e66b @endif" @if (!empty($atteClass->first()->verified_by)) style="background-color: #f8af3b @endif" @if (!empty($atteClass->first()->last_updated_by)) style="background-color: #747ddd @endif" style="background-color: #f64d56"> 
					<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
					<td>{{ $atteClass->first()->admins->first_name or ''}}</td>
					<td>{{ $atteClass->first()->verifieds->first_name or ''}}</td>
					<td>{{ $atteClass->first()->sendBy->first_name or ''}}</td> 
				</tr>
		     @endif
		   @endif    
		   @if ($report_for==4) 
              @if (!empty($atteClass->first()->last_updated_by)) 
				<tr @if (!empty($atteClass->first()->sms_sent_by)) style="background-color: #61e66b @endif" @if (!empty($atteClass->first()->verified_by)) style="background-color: #f8af3b @endif" @if (!empty($atteClass->first()->last_updated_by)) style="background-color: #747ddd @endif" style="background-color: #f64d56"> 
					<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
					<td>{{ $atteClass->first()->admins->first_name or ''}}</td>
					<td>{{ $atteClass->first()->verifieds->first_name or ''}}</td>
					<td>{{ $atteClass->first()->sendBy->first_name or ''}}</td> 
				</tr>
		     @endif
		   @endif     
		   @if ($report_for==5) 
              @if (!empty($atteClass->first()->verified_by)) 
				<tr @if (!empty($atteClass->first()->sms_sent_by)) style="background-color: #61e66b @endif" @if (!empty($atteClass->first()->verified_by)) style="background-color: #f8af3b @endif" @if (!empty($atteClass->first()->last_updated_by)) style="background-color: #747ddd @endif" style="background-color: #f64d56"> 
					<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
					<td>{{ $atteClass->first()->admins->first_name or ''}}</td>
					<td>{{ $atteClass->first()->verifieds->first_name or ''}}</td>
					<td>{{ $atteClass->first()->sendBy->first_name or ''}}</td> 
				</tr>
		     @endif
		   @endif   
		   @if ($report_for==6) 
              @if (!empty($atteClass->first()->sms_sent_by)) 
				<tr @if (!empty($atteClass->first()->sms_sent_by)) style="background-color: #61e66b @endif" @if (!empty($atteClass->first()->verified_by)) style="background-color: #f8af3b @endif" @if (!empty($atteClass->first()->last_updated_by)) style="background-color: #747ddd @endif" style="background-color: #f64d56"> 
					<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
					<td>{{ $atteClass->first()->admins->first_name or ''}}</td>
					<td>{{ $atteClass->first()->verifieds->first_name or ''}}</td>
					<td>{{ $atteClass->first()->sendBy->first_name or ''}}</td> 
				</tr>
		     @endif
		   @endif    		 
		@endforeach
	</tbody>
</table> 
 