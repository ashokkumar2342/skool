@php
           $userIdBySibling=new App\Helper\MyFuncs();    
           $siblings= $userIdBySibling->getSiblingById(); 
           $students=App\Student::whereIn('id',$siblings)->get();
@endphp
@foreach ($students as $student)
<div class="panel panel-danger">
     <div class="panel-body">
        <div class="row">
            <div class="col-lg-3">
            Name : <b>{{ $student->name }}</b>
            </div> 
            <div class="col-lg-3"> 
            Registration No. : <b>{{ $student->registration_no }}</b> 
            </div> 
            <div class="col-lg-3">
            Class : <b>{{ $student->classes->name or '' }}</b>
            </div>
            <div class="col-lg-3">
            Section : <b>{{ $student->sectionTypes->name or '' }}</b>
            </div>  
        </div>
<div class="table-responsive">         
 <table id="route_table" class="display table">                     
    <thead>
        <tr>
            <th class="text-nowrap">Sr.No.</th>
           
            <th class="text-nowrap">Academic Year</th> 
            <th class="text-nowrap">Class</th> 
            <th class="text-nowrap">Section</th> 
            <th class="text-nowrap">Subject</th>                                             
            <th class="text-nowrap">Test Date</th>                                          
            <th class="text-nowrap">Max marks</th>                                            
            <th class="text-nowrap">Highest Marks</th>                      
            <th class="text-nowrap">Avg Marks</th>                                            
            <th class="text-nowrap">Discription</th>                                                             
            <th class="text-nowrap">Action</th>                                                            
        </tr>
    </thead>
    <tbody>
    @foreach ($classtests as $classTest)
    @if ($student->class_id==$classTest->class_id&&$student->section_id==$classTest->section_id)
      <tr>
        <td class="text-nowrap">{{ ++$loop->index }}</td>
        <td class="text-nowrap">{{ $classTest->academicYear->name or ''}}</td>
        <td class="text-nowrap">{{ $classTest->classes->name or ''}}</td>
        <td class="text-nowrap">{{ $classTest->sectionTypes->name or '' }}</td>
        <td class="text-nowrap">{{ $classTest->subjects->name or '' }}</td>
        <td class="text-nowrap">{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
        <td class="text-nowrap">{{ $classTest->max_marks }}</td> 
        <td class="text-nowrap">{{ $classTest->highest_marks }}</td> 
        <td class="text-nowrap">{{ $classTest->avg_marks }}</td> 
        <td class="text-nowrap">{{ $classTest->discription or ''}}</td> 
        <td> 
          @if ($classTest->sylabus==null)
            <a   class="btn btn-success btn-xs " disabled><i class="fa fa-download"></i></a>
            @else
            <a href="{{ route('admin.exam.classtest.download.syllabus',$classTest->sylabus) }}" target="_blank"  class="btn btn-success btn-xs"    ><i class="fa fa-download"></i></a>  
          @endif
           
           
        </td>
      </tr>
    @endif    
    @endforeach 
       
    </tbody>
         

</table>
</div>
</div>
</div>
@endforeach