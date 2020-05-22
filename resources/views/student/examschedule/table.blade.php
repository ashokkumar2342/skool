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
            <th>Sr.No.</th>                               
            <th>Academic Year</th> 
            <th class="text-center">Exam Term</th> 
            <th>Class</th>  
            <th>Subject</th>                                                            
            <th>On Date</th>                                                            
            <th>Max marks</th>                                                             
            <th>Pass marks</th>                                                             
            <th>Fail marks</th>                                       
        </tr>
    </thead>
    <tbody>
        @foreach ($examSchedules as $examSchedule)
        @if ($student->class_id==$examSchedule->class_id)
        <tr>
            <td>{{ ++$loop->index }}</td>
            <td>{{ $examSchedule->academicYear->name or ''}}</td>
            <td>{{ date('d-m-Y',strtotime($examSchedule->examTerms->from_date))}}-To-{{ date('d-m-Y',strtotime($examSchedule->examTerms->to_date))}}</td>
            <td>{{ $examSchedule->classes->name or ''}}</td> 
            <td>{{ $examSchedule->subjects->name }}</td>
            <td>{{ date('d-m-Y',strtotime($examSchedule->on_date))}}</td>
            <td>{{ $examSchedule->max_marks }}</td> 
            <td>{{ $examSchedule->pass_marks }}</td> 
            <td>{{ $examSchedule->fail_marks }}</td> 
        </tr> 
        @endif   
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endforeach