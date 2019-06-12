
 @php
 if (!empty($TeacherWorkingDays->teacher_id)) {
     $arrayTeacherId =explode(',', $TeacherWorkingDays->teacher_id);
 }else{
    $arrayTeacherId=[];
 }
     
 @endphp
 <div class="col-lg-4"> 
 <label>Teacher Name</label>
 <select name="teacher_name" class="form-control">
 <option selected disabled>Select Name</option> 
   @foreach ($teacherFacultys as $teacherFaculty) 
   <option value="{{ $teacherFaculty->id }}" {{ in_array($teacherFaculty->id,$arrayTeacherId)?'selected':'' }}>{{ $teacherFaculty->name }}</option> 
    @endforeach 
 </select> 
 </div>
<table class="table">
    <thead>
        <tr> 
          <td> <h4> Week</h4></td>
            @foreach($periodTimings as $periodTiming)

            <th>{{ $periodTiming->from_time }}</th>
            @endforeach
             
        </tr>
    </thead>
    <tbody>
        @php
            $keyloop=0;
        @endphp
        @foreach ($daysTypes as $daysType)
        <tr>
            <td>{{ $daysType->name }}
            <input type="hidden"  name="day[]" value="{{$daysType->id}}">
            </td>
             @foreach($periodTimings as $periodTiming) 
             @php 
             
             if (!empty($TeacherWorkingDays->period_type)) {
               $savePeriodId=explode(',', $TeacherWorkingDays->period_type);  
               $saveCheckPeriodId=$savePeriodId[$keyloop];
             }else{
                $saveCheckPeriodId='';
             }
          
             @endphp
            <th>
              
                <select name="period_type[]"> 
                  @foreach ($periodTypes  as $key=>$periodType)  
                  <option value="{{ $periodType->id }}" {{ $periodType->id==$saveCheckPeriodId?'selected':'' }}>{{ $periodType->name }}</option>
                  @endforeach 
                </select> 
                <input type="hidden" name="periodTiming[]" value="{{ $periodTiming->id }}">
            </th>
            @php
               $keyloop++;
            @endphp
            @endforeach
        </tr>  
        @endforeach
        
    </tbody>
</table>
   

 
  <div class="col-lg-12 text-center"> 
    <input type="submit" class="btn btn-success" value="Save" style="margin-top: 10px">
  </div>     
</div> 
