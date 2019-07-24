
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
            
            </td>
             @foreach($periodTimings as $periodTiming) 
         
            <th>
           {{--    @php
                    if ($TeacherSaveWorkingDays==1) {
                      $className='greenText';
                    }elseif ($TeacherSaveWorkingDays==2) {
                      $className='yellowText';
                    }elseif ($TeacherSaveWorkingDays==3) {
                      $className='redText';
                    }else{
                      $className='greenText';
                    }
                @endphp  --}}  
                   <input type="hidden" name="periodTiming[]" value="{{ $periodTiming->id }}">
                <input type="hidden" name="days[]" value="{{$daysType->id}}">
                <select name="period_type[]" id="period_type{{ $keyloop }}" onchange="this.className=this.options[this.selectedIndex].className" class=""> 

                  @foreach ($periodTypes  as $key=>$periodType) 
                       @php
                        $selectedValue=App\Model\TimeTable\ClassPeriodSchedule::where('time_table_type_id',$time_table_type_id)->where('class_id',$class_id)->where('days_id',$daysType->id)->where('period_timeing_id',$periodTiming->id)->first();
                        if (!empty($selectedValue)) {
                         $selectedValueId =$selectedValue->period_type;
                        }else{
                          $selectedValueId='';
                        }
                       @endphp
                        @php
                         if ( $selectedValueId==1) {
                           $className='greenText';
                         }elseif ( $selectedValueId==2) {
                           $className='yellowText';
                         }elseif ( $selectedValueId==3) {
                           $className='redText';
                         }else{
                           $className='greenText';
                         }
                       @endphp
                        <script>
                         $('#period_type{{ $keyloop }}').addClass('{{ $className }}'); 
                       </script>
                     <option class="{{ $periodType->color }}" value="{{ $periodType->id }}" {{ $periodType->id==$selectedValueId?'selected':'' }}>{{ $periodType->name }} </option>
                    
                  @endforeach 
                </select> 
             
            </th>
            @php
            $keyloop++
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









 