<table id="route_table" class="display table">                     
    <thead>
        <tr>
            <th>Sr.No.</th> 
            <th>Year</th> 
            <th>Class/Section</th>  
            <th>Subject</th>                                             
            <th>Date</th>                                          
            <th>M marks</th>                                            
            <th>H Marks</th>                      
            <th>A Marks</th>                                            
            <th>Description</th>                                          
            <th class="text-center">Action</th>                                             
        </tr>
    </thead>
    <tbody>
        @foreach ($classTests as $classTest)
        <tr>
            <td class="text-nowrap">{{ ++$loop->index }}</td> 
            <td class="text-nowrap">{{ $classTest->academicYear->name or ''}}</td>
            <td class="text-nowrap">{{ $classTest->classes->name or ''}}/{{ $classTest->sectionTypes->name or '' }}</td>
             
            <td class="text-nowrap">{{ $classTest->subjects->subjectTypes->name or '' }}</td>
            <td class="text-nowrap">{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
            <td class="text-nowrap">{{ $classTest->max_marks }}</td> 
            <td class="text-nowrap">{{ $classTest->highest_marks }}</td> 
            <td class="text-nowrap">{{ $classTest->avg_marks }}</td> 
            <td class="text-nowrap">{{ $classTest->discription or ''}}</td> 
            <td class="text-nowrap">
            @php 
             $classTestStatuss=Illuminate\Support\Facades\DB::select(DB::raw("call up_check_classtest_status ('$classTest->id')"));

             @endphp
             @foreach ($classTestStatuss as $classTestStatus)
             @php
                $status1=substr($classTestStatus->TestStatus,0,1);
                $status2=substr($classTestStatus->TestStatus,2,1);
                $status3=substr($classTestStatus->TestStatus,4,1);
                $status4=substr($classTestStatus->TestStatus,6,1);
                $status5=substr($classTestStatus->TestStatus,8,1);
                $status6=substr($classTestStatus->TestStatus,10,1);
                $status7=substr($classTestStatus->TestStatus,12,1);
                $status8=substr($classTestStatus->TestStatus,14,1);
                $status9=substr($classTestStatus->TestStatus,16,1);
             @endphp
             
                @if ($classTest->sylabus==null)
                 @else
                  <a class="btn btn-xs btn-success" href="{{ route('admin.exam.classtest.download.syllabus',$classTest->sylabus) }}" target="blank"><i class="fa fa-download"></i></a>
                  @endif
             
             @if ($status1==1)
                  <a href="#" class="btn btn-xs btn-info" onclick="callPopupLarge(this,'{{ route('admin.exam.test.edit.form',$classTest->id) }}')">Edit</a>
             @endif
             @if ($status2==1)
                  <a href="#" id="btn_add_marks{{ $classTest->id }}" success-popup="true" class="btn btn-xs btn-success" onclick="callPopupLarge(this,'{{ route('admin.exam.classtest.add.marks',$classTest->id) }}')">Add Marks</a>
             @endif
             @if ($status3==1)
                  <a href="#" id="btn_verify_marks{{$classTest->id }}" class="btn btn-xs btn-success" onclick="callPopupLarge(this,'{{ route('admin.exam.classtest.marks.verify',$classTest->id) }}')">Marks Verify</a>
             @endif
             @if ($status4==1)
                  <a href="#" id="" class="btn btn-xs btn-success" success-popup="true" onclick="callAjax(this,'{{ route('admin.exam.classtest.compile',$classTest->id) }}')">Compile</a>
             @endif 
             
             @if ($status5==1)
                  <a href="#" id="" class="btn btn-xs btn-success" success-popup="true" onclick="callAjax(this,'{{ route('admin.exam.classtest.sens.sms.test',$classTest->id) }}')">SMS Send Test Info</a>
             @endif 
             @if ($status6==1)
                  <a href="#" id="" class="btn btn-xs btn-success" success-popup="true" onclick="callAjax(this,'{{ route('admin.mark.detail.send.sms.marks.test',$classTest->id) }}')">SMS Send Marks Info</a>
             @endif 
             @if ($status7==1)
                  <a href="" class="btn btn-xs btn-danger" title="">Cancel Test</a> 
             @endif
             @if ($status8==1) 
                  <a href="" class="btn btn-xs btn-warning" title="">Re Cancel Test</a> 
             @endif
              @if ($status9==1)
                  <a href="#" class="btn btn-xs btn-danger" button-click="btn_class_test_show" success-popup="true" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.exam.classtest.delete',Crypt::encrypt($classTest->id)) }}')} else{console_Log('cancel') }">Delete</a>
             @endif
             
              @endforeach 
           {{--  <i title="Delete" class="fa fa-trash text-danger" href="{{ route('admin.exam.classtest.delete',Crypt::encrypt($classTest->id)) }}"  onclick="return confirm('Are you sure you want to delete this item?');"></i> 
            @if ($classTest->sylabus==null)
            <i title="Download" class="fa fa-download text-success" ></i> 
            @else
            <i title="Download" class="fa fa-download text-success" href="{{ route('admin.exam.classtest.download.syllabus',$classTest->sylabus) }}" target="_blank" ></i>  
            @endif 
             <i title="Compile" class="fa fa-building text-warning" href="{{ route('admin.exam.classtest.compile',$classTest->id) }}"></i>
             <i title="Add Marks" class="fa fa-plus text-success" onclick="callPopupLarge(this,'{{ route('admin.exam.classtest.add.marks',$classTest->id) }}')"></i>
             <i title="Verify Marks" class="fa fa-check"></i> --}}
            </td>
        </tr>  	 
        @endforeach	 
    </tbody> 
</table>