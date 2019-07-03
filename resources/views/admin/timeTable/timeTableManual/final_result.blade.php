
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
            
                @php
                         
                        $manualTimeTabl=App\Model\TimeTable\ManualTimeTabl::where('time_table_type_id',$time_table_type_id)->where('class_id',$class_id)->where('period_id',$periodTiming->id)->where('day_id',$daysType->id)->where('section_id',$sectionId)->first();
                         
                       
                       @endphp
                       @if (!empty($manualTimeTabl))
                           {{ $manualTimeTabl->subjectType->name or '' }}  

                        @else
                          
                             @foreach ($periodTypes  as $key=>$periodType) 
                                  @php
                                   $selectedValue=App\Model\TimeTable\ClassPeriodSchedule::where('time_table_type_id',$time_table_type_id)->where('class_id',$class_id)->where('days_id',$daysType->id)->where('period_timeing_id',$periodTiming->id)->first();
                                   $manualTimeTabl=App\Model\TimeTable\ManualTimeTabl::where('time_table_type_id',$time_table_type_id)->where('class_id',$class_id)->where('period_id',$periodTiming->id)->where('day_id',$daysType->id)->where('section_id',$sectionId)->first();
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
                                    

                                  @if ($periodType->id==$selectedValueId)
                               			@if ($selectedValueId==1)
                               				<span class="{{ $className }}">Work</span>
                               			@endif
                               			@if ($selectedValueId==2)
                               				<span class="{{ $className }}">Break</span>
                               			@endif
                               			@if ($selectedValueId==3)
                               				<span class="{{ $className }}">Off</span>
                               			@endif
                                    {{-- <option class="{{ $periodType->color }}" value="{{ $periodType->id }}" {{ $periodType->id==$selectedValueId?'selected':'' }}>{{ $periodType->name }} </option>    --}}
                                    
                                  @endif
                                
                                
                               
                             @endforeach 
                         
                       @endif
               
                
                       @php
                         
                        $manualTimeTabl=App\Model\TimeTable\ManualTimeTabl::where('time_table_type_id',$time_table_type_id)->where('class_id',$class_id)->where('period_id',$periodTiming->id)->where('day_id',$daysType->id)->where('section_id',$sectionId)->first();
                         
                       
                       @endphp
                         

                       @if (!empty($manualTimeTabl))
                           <a href="#" id="delete_button" onclick="callAjax(this,'{{ route('admin.time.table.manual.delete',$manualTimeTabl->id) }}')" title="Delete"><i class="fa fa-trash text-danger"></i></a>

                        @else
                         
                       @endif
                     
                     
                    
                
            </th>
            @php
            $keyloop++
        @endphp
            @endforeach
        </tr>  
        @endforeach
        
    </tbody>
</table>
   