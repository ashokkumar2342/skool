
  <style type="text/css" media="screen">

     .greenText{ background-color:#45770b;color:#ffffff; }

      .yellowText{ background-color:#FFC107;color:#ffffff; }

      .redText{ background-color:#d82b1e;color:#fff; }

  </style>
 
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
                @php
                    if ($saveCheckPeriodId==1) {
                      $className='greenText';
                    }elseif ($saveCheckPeriodId==2) {
                      $className='yellowText';
                    }elseif ($saveCheckPeriodId==3) {
                      $className='redText';
                    }else{
                      $className='greenText';
                    }
                @endphp
                <select name="period_type[]" onchange="this.className=this.options[this.selectedIndex].className" class="{{ $className }}"> 
                  @foreach ($periodTypes  as $key=>$periodType)   
                  <option class="{{ $periodType->color }}" value="{{ $periodType->id }}" {{ $periodType->id==$saveCheckPeriodId?'selected':'' }}>{{ $periodType->name }}</option>
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
