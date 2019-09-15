<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
	<style>
		 @page { margin:0px; }
     .GFG{ 
         height: 120px; 
         width: 50%; 
         border: 5px solid black; 
         font-size:42px; 
         font-weight:bold; 
         color:green; 
         margin-left:50px; 
         margin-top:50px; 
         } 
	</style>
 @include('admin.include.boostrap')
</head>
    
 
 @foreach ($students as $student)
<body style="background-color:#fff">
<div class="row"> 
        <div class="col-lg-2 pull-left" style="margin-right: 30px">
          @php
            $path =storage_path('app/public/logo/Logo_vaish_Model1.jpg');
          @endphp
          <img  src="{{ $path }}" alt="" width="128%" style="margin: 30px ;"> 
        </div>
        <div class="col-lg-10" style="margin-left:110px ">
          <h2 style="color:#7f2809;"><b>VAISH MODEL SR.SEC.SCHOOL</b></h2><h6>(Affiliated to C.B.S.E, New Delhi)</h6><h6>Affiliation No 3456789 | School Code 47789</h6><h5><b>Loharu Road Bhiwani - 123456 (Hr.)</b></h5> 
        </div>
       </div>
 <div class="row">  
   <div class="col-lg-4 text-center" style="margin-top: 40px">
   	<span>Serial.No.CB</span> <span><b>123455</b></span> 
   </div> 
   <div class="col-lg-4 text-center" style="float: right;">
   	 
    @php
	   $paths =storage_path('app/student/profile/'.$student->picture);
    @endphp
    
    <img  src="{{ $paths }}" alt="" width="40%" style="margin-top:5px"> 
   </div>
</div> 
<div class="row" style="margin-top:-70px">  
   <div class="col-lg-12" style="float: left; margin-left: 70px;">
   	<span>Name of Student</span> &nbsp;&nbsp;&nbsp;<span style="font-size: 14px"><b><em>{{ $student->name }}</em></b></span>  
   </div>
</div>
<div class="row">
   <div class="col-lg-12" style="float: left; margin-left: 70px">
   	<span>Father's Name</span> &nbsp;&nbsp;&nbsp;<span style="font-size: 14px"><b><em>{{ $student->father_name }}</em></b></span>  
   </div>
</div>
<div class="row">
   <div class="col-lg-12" style="float: left; margin-left: 70px">
   	<span>Mother's Name</span> &nbsp;&nbsp;&nbsp;<span style="font-size: 14px"><b><em>Nandi Devi </em></b></span>  
   </div>
</div> 
<div class="row" style="margin-top: 20px">
   <div class="col-lg-6" style="float: left; margin-left: 70px">
   	<span>Roll No</span> &nbsp;&nbsp;&nbsp;<span style="font-size: 14px"><b><em>{{ $student->roll_no }}</em></b></span>  
   </div>
   <div class="col-lg-6" style="float: right; margin-left: 70px">
   	<span>Registration No</span> &nbsp;&nbsp;&nbsp;<span><b>{{ $student->registration_no }}</b></span>  
   </div>
</div>   
<div class="row">   
   <div class="col-lg-6" style="float: left; margin-left: 70px">
   	<span>Admissino No</span> &nbsp;&nbsp;&nbsp;<span><b>{{ $student->admissino_no }}</b></span>  
   </div>
   <div class="col-lg-6" style="float: right; margin-left: 70px">
   	<span>Date of Birth</span> &nbsp;&nbsp;&nbsp;<span><b>{{ date('d-m-Y',strtotime($student->dob)) }}</b></span>  
   </div>
</div>
<div class="row" style=" margin-left: 70px;margin-top: 20px">  
  <table style="height: 50px; width: 670px;" border="1">
<tbody>
<tr>
<td style="width: 32px;" align="center">Sr.No.</td>
<td style="width: 185px;" align="center">Subject</td>
<td style="width: 99px; " align="center">Max/Min</td>
<td style="width: 99px; " align="center">Marks Obt</td>
 
<td style="width: 102px;" align="center">Percentage</td>
<td style="width: 102px;" align="center">Rank</td>
<td style="width: 102px;" align="center">Total</td>
</tr>
 
@foreach ($markDetails as $markDetail)
  @foreach ($markDetail as $markDetai)
    @if ($student->id==$markDetai->student_id) 
    <tr>
    <td style="width: 32px;" align="center">{{ $loop->iteration  }}</td>
    <td style="width: 185px;" align="center">{{ $markDetai->subjects->name or ''}}</td>
    <td style="width: 99px;" align="center">{{ $markDetai->max_marks }}/{{ $markDetai->pass_marks }}</td>
    <td style="width: 99px;" align="center">{{ $markDetai->marksobt }}</td>
    
    <td style="width: 102px;" align="center">{{ $markDetai->percentile }}</td>
    <td style="width: 102px;" align="center">{{ $markDetai->rank }}</td>
    <td style="width: 102px;" align="center">{{ $markDetai->marksobt }}</td>
    </tr>
    @endif 
   @endforeach 
 @endforeach 
</tbody>
</table>  
 </div>  	
   
</body>
@endforeach 
</html>