
 @php
 if (!empty($classPeriodSchedule->class_id)) {
     $arrayClassId =explode(',', $classPeriodSchedule->class_id);
 }else{
    $arrayClassId=[];
 }
     
 @endphp
 
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
             
             if (!empty($classPeriodSchedule->period_type)) {
               $savePeriodId=explode(',', $classPeriodSchedule->period_type);  
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
