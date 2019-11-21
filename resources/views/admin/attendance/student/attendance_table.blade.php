
<table class="table table-bordered">
 <thead>                  
     <tr>
        <td><b>Regisration No.</b></td>
        <td><b>Student Name</b> </td>
         @foreach ($attendancesTypes as $attendancesType)
         <th><button type="button" data-click="{{ $attendancesType->name }}" class="btn btn-{{ $attendancesType->color }} btn-xs"><i class="fa fa-check"></i>{{ $attendancesType->name }}</button> </th> 
         @endforeach  
    </tr>
 </thead>
 <tbody> 
 @foreach ($students as $student)
    
        <tr>
          <td>{{ $student->registration_no }}</td>
          
          <input type="hidden" name="class_id" value="{{ $student->class_id }}">
          <input type="hidden" name="section_id" value="{{ $student->section_id }}">
          <td>{{ $student->name }}</td>
            @foreach($attendancesTypes as $attendancesType)
            @php
            $checked = (\App\Model\StudentAttendance::where(['student_id'=>$student->id,'attendance_type_id'=>$attendancesType->id,'date'=>date('Y-m-d',strtotime(date('d-m-Y')))])->count())?'checked':'';
            @endphp  
                    <td>
                    <label class="radio-inline">
                      <input type="radio" {{ $checked }} id="{{ $attendancesType->name }}{{ $student->id }}" onclick="$('#subject{{ $student->id }}').prop('checked', true)" class="{{ str_replace(' ', '_', strtolower($attendancesType->name)) }}" name="attendenceType_id[{{ $student->id }}]"  value="{{ $attendancesType->id }}">{{ $attendancesType->name }}</label>
                    </td>  
                     
          @endforeach
      </tr>
  @php
    $studentattendancesclass=App\Model\StudentAttendanceClass::where('class_id',$student->class_id)->where('section_id',$student->section_id)->where('date',date('Y-m-d',strtotime(date('d-m-Y'))))->first();
  @endphp 
 @endforeach                     
 </tbody>
<tfoot> 
  @if (empty($studentattendancesclass))
  <tr>
    <td colspan="5">                                 
      <div class="row">                              
       <div class="col-md-12 text-center">
        <button class="btn btn-success " id="subjectBtn">Save Attendance</button>
       </div>
      </div>  
    </td>
 </tr> 
  @endif
</tfoot>
</tbody>
</table>



 