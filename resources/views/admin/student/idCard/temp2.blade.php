<!DOCTYPE html>
<html>
<head>
<title>temp3</title>
</head>
<style> 
@page { margin:0px; }
#footer {
position:absolute;
bottom:0;
width:100%;
height:30px; 
}
 #Avatar {
  border-radius: 100%;
}
.ddd{
    text-align:middle;display:inline-block;
    padding-left: 30px;
 }
 span,b{
    font-size: 12px
 }
</style>
@php
$backgroundImg =storage_path('app/student/idcard/download.jpg');
@endphp
@include('admin.include.boostrap')
@foreach ($students as $student)
<body style="margin: 0px; padding:0px; background-color: #eca8ea">  
<div  id="front"> 
<div style="background-color:#d60aac;text-align:center;color: #fff"> 
<b class="ddd"><span><img src="{{ $backgroundImg }}" style="width: 10%;margin-top: 5px"><span class="ddd" style="font-size: 14px"> VAISH MODEL SENIOR SECONDARY SCHOOL </span></span></b><br>
{{-- <span style="font-size: 12px"><b>(Affilation to CBSC. bhiwani School Code 2001) </b></span> --}} 
</div>  
<div class="col-lg-2" style="padding-top: 50px">
@php
$path =storage_path('app/student/profile/'.$student->picture);
$paths =storage_path('app/student/profile/'.''); 
$data =storage_path('app/student/barcode/'.$student->registration_no.'.'.'png');
@endphp  
<img  src="{{ $data }}" width="120px" height="30px" style="float:center;margin-top: -45px;margin-left: 140px"> 
@if ($path==$paths)
<img  src="''" alt="" id="Avatar"  width="110px" height="130px" style="border:solid 2px #d60aac"> 
@else
<img  src="{{ $path }}" alt="" id="Avatar"  width="110px" height="130px" style="border:solid 2px #d60aac"> 
@endif
</div>
<div class="col-lg-9" style="padding-top: 45px;margin-left:30px">  
<span><b>Registration No</b> : <b style="color: #d60aac">{{ $student->registration_no }}</b></span><br>
<span><b>Student Name</b> &nbsp;&nbsp; : <b style="color: #d60aac">{{ $student->name }}</b></span><br> 
<span><b>Father/Guardian</b>: <b style="color: #d60aac">{{ $student->parents[0]->parentInfo->name or ''}}</b></span><br>
<span><b>Class</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b style="color: #d60aac">{{ $student->classes->name or ''}}-{{ $student->sectionTypes->name or '' }}</b></span><br> 
<span><b>Address</b> : <b style="color: #d60aac">{{ $student->addressDetails->address->p_address or ''}}</b></span><br> 
</div>
 
</div>
<div id="footer" style="background-color:#d60aac;text-align:center ">
    <h1></h1>
 </div>
</div>
<span style="float:center;padding-top: 215px;font-size: 14px;color: white;text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;Contact : <b>{{ $student->addressDetails->address->primary_mobile or ''}}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Year : <b>2020-2021</b></span>  
<span style="float: right;padding-top: 180px;margin:10px">Principal</span> 
</body>
@endforeach
</html>