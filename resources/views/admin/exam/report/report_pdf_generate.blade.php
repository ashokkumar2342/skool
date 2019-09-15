<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
@include('admin.include.boostrap') 
 @foreach ($classTestDetails as $classTestDetail)
<body>
           @foreach ($students as $student)
           <div style="width: 680px;" align="center"> 
                <span id="lblheader" style="font-family:Arial;font-size:20;  color:#7f2809"><b>VAISH MODEL SENIOR SECONDARY SCHOOL , Tele </b>: +91-8697068001</br> Class Test  Session : 2018-2019</span>
                <hr />
            </div>
        <div class="row"> 
           <div class="col-lg-6">
            Name of Studen : <span><b>{{ $student->name }}</b></span> 
           </div>
           <div class="col-lg-6" style="float: left;">
            Father's Name : <span><b>{{ $student->father_name }}</b></span> 
           </div>
        </div><div class="row"> 
           <div class="col-lg-6">
            Mother's Name : <span><b>{{ $student->mother_name }}</b></span> 
           </div>
           <div class="col-lg-6" style="float: left;">
            Mobile No : <span><b>{{ $student->father_mobile }}</b></span> 
           </div>
        </div><div class="row"> 
           <div class="col-lg-6">
            Class : <span><b>{{ $student->classes->name }}</b></span> 
           </div>
           <div class="col-lg-6" style="float: left;">
            Section : <span><b>{{ $student->sectionTypes->name }}</b></span> 
           </div>
        </div><div class="row"> 
           <div class="col-lg-6">
            Registration No : <span><b>{{ $student->registration_no }}</b></span> 
           </div>
           <div class="col-lg-6" style="float: left;">
            Roll No : <span><b>{{ $student->roll_no }}</b></span> 
           </div>
        </div><div class="row"> 
           <div class="col-lg-6">
            Admissino No : <span><b>{{ $student->admission_no }}</b></span> 
           </div>
           <div class="col-lg-6" style="float: left;">
            Date of Birth : <span><b>{{ $student->dob }}</b></span> 
           </div>
        </div>
        <hr> 
           
            <table class="table">
                <thead>
                    <tr> 
                        <th>Subject</th>
                        <th>Test Date</th>
                        <th>Max Marks</th>
                        <th>Marks Obt</th>
                        <th>Grade</th>
                        <th>Rank</th> 
                        <th>Percentile</th> 
                    </tr>
                </thead>
                <tbody>
            @foreach ($classTestDetail as $classTest)
                 @if ($student->id==$classTest->student_id)
                    
                 
                    <tr>
                        <td>{{ $classTest->subjects->name or '' }}</td>
                        <td>{{ date('d-m-Y',strtotime($classTest->test_date))}}</td>
                        <td>{{ $classTest->max_marks}}</td>
                        <td>{{ $classTest->marksobt}}</td>
                        <td>{{ $classTest->grade_short or ''}}</td>
                        <td>{{ $classTest->rank or ''}}</td>
                        <td>{{ $classTest->percentile or ''}}</td>
                        
                         
                    </tr>
                    @endif
            @endforeach
                </tbody>
            </table>
 @endforeach
</body>
 @endforeach 
</html>
 
  
  
