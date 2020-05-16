	 
	<button type="button" class="btn btn-sm btn-primary pull-right" style="margin:5px">Reminder</button>
	<button type="submit" class="btn btn-sm btn-info pull-right" style="margin:5px">Send Sms</button>

<table class="table table-striped table-bordered table-condensed table-responsive table-hover" id="send_sms_table">
	<thead>  
		<tr>
			<th>Sr.No.</th>
			<th>Class/Section</th>
			<th>Attendance Mark By</th>
			<th>Attendance Virified By</th>
			<th>Attendance SMS Send By</th>
			 
		</tr>
	</thead>
	<tbody>
		 @php
			$classId=1;
		  @endphp
		@foreach ($sections as $section)
		  
		  @php
		      $atteClass=App\Model\StudentAttendanceClass::where('class_id',$section->class_id)
		                                                  ->where('section_id',$section->section_id)
		                                                  ->whereDate('date',$date)->get();

		      $atteMark=App\Model\StudentAttendanceClass::where('last_updated_by','!=',0)->whereDate('date',$date)->count(); 
		      $atteVerified=App\Model\StudentAttendanceClass::where('verified',1)->whereDate('date',$date)->count(); 
		      $attesend=App\Model\StudentAttendanceClass::where('sms_sent',1)->whereDate('date',$date)->count();                                            

		  @endphp 

				<tr @if (!empty($atteClass->first()->sms_sent_by)) style="background-color: #61e66b @endif" @if (!empty($atteClass->first()->verified_by)) style="background-color: #f8af3b @endif" @if (!empty($atteClass->first()->last_updated_by)) style="background-color: #747ddd @endif" style="background-color: #f64d56"> 
					 
				
					<td>{{ $classId++ }}</td>
					<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td>
					<input type="hidden" name="class_id[]" value=" {{ $section->class_id }} ">
					<input type="hidden" name="section_id[]" value="{{ $section->section_id }}">
					<td>{{ $atteClass->first()->admins->first_name or ''}}</td>
					<td>{{ $atteClass->first()->verifieds->first_name or ''}}</td>
					<td>{{ $atteClass->first()->sendBy->first_name or ''}}</td>
					 
					 
				</tr>
		@endforeach
				    
				<div class="panel panel-success">
				<div class="panel-heading">Send's Details</div>
				<div class="panel-body">
				    <div class="row">
				    <div class="col-lg-3" style="margin-top: 12px">
				    Total Class : <b>{{ $classId++-1 }}</b>
				    </div> 
				    <div class="col-lg-3"> 
				    Attendance Mark : <b>{{ $atteMark }}</b> 
				    </div> 
				    <div class="col-lg-3">
				    Attendance Verified : <b>{{ $atteVerified}}</b>
				    </div> 
				    <div class="col-lg-3">
				    SMS Send : <b>{{ $attesend }}</b>
				    </div>
				    </div>
				    <div class="row" style="margin-bottom:  10px">
				    <div class="col-lg-3">
				    <input type="hidden" name="">
				    </div> 
				    <div class="col-lg-3"> 
				    Attendance Not Mark : <b>{{$classId++-1- $atteMark-1 }}</b> 
				    </div> 
				    <div class="col-lg-3">
				    Attendance Not Verified : <b>{{$classId++-1- $atteVerified-2  }}</b>
				    </div> 
				    <div class="col-lg-3">
				    SMS Not Send : <b>{{$classId++-1- $attesend-3 }}</b>
				    </div>  
				    </div> 
				</div>
				</div>
</tbody>
</table> 
 