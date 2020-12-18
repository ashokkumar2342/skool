<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
<title></title>
<style>
@media print {
.ic_card_header {
background-color: red !important;
-webkit-print-color-adjust: exact; 
}
}

@media print {
.vendorListHeading .ic_card_header {
color: red !important;
}
}
@page { margin:0px; }
#footer {
position:absolute;
bottom:0;
width:100%;
height:50px;


}
#front{
width: 100%;
height: 350px;
}
span.a {

-ms-transform: rotate(-90deg); /* IE 9 */
-webkit-transform: rotate(-90deg); /* Safari 3-8 */
transform: rotate(-90deg);
}
.ddd{
    text-align:middle;display:inline-block;
    padding-left: 30px;
 }
 #Avatar {
  border-radius: 100%;
}

</style>
@php
$backgroundImg =storage_path('app/student/idcard/logo.jpg');
@endphp
</head> 
@foreach ($students as $student) 
<body style="margin: 0px; padding:0px; background-color:#f8f9ce"> 
<div  id="front"> 
<div style="background-color:green;text-align:center;color: white;"> 
<b class="ddd"><span><img src="{{ $backgroundImg }}" style="width: 15%;margin-top: 5px"><span class="ddd" style="font-size: 15px;margin-top: 5px"> VAISH MODEL SENIOR SECONDARY SCHOOL </span></span></b><br>
{{-- <span style="font-size: 12px"><b>(Affilation to CBSC. bhiwani School Code 2001) </b></span> --}} 
</div> 
<div style="height:30px;margin-left:30px;margin-right: 30px">
<div  style="font-size: 22px;text-align:center">2020-2021</div> 
<div align="center">
@php
$path =storage_path('app/student/profile/'.$student->picture);
$paths =storage_path('app/student/profile/'.''); 
@endphp
@php
$data =storage_path('app/student/barcode/'.$student->registration_no.'.'.'png');
@endphp
@if ($path==$paths)
<img  src="''" alt="" id="Avatar" width="103px" height="103px" style="border:solid 2px Black;margin-top: 10px"> 
@else
<img  src="{{ $path }}" alt="" id="Avatar" width="103px" height="103px" style="border:solid 2px Black;margin-top: 10px">  
@endif 
</div>
<div style="padding-top: 25px">
<span class="a">
<img  src="{{ $data }}" width="130px" height="45px" style="float:left;">
</span> 
</div>
<div  style="font-size: 15px;text-align:center"><b>{{ $student->name }} {{ $student->last_name }}</b></div> 
<div  style="font-size: 15px;text-align:center">Parent's Name</div> 
<div  style="font-size: 15px;text-align:center"><b>{{ $student->parents[0]->parentInfo->name or ''}}</b></div> 
<div  style="font-size: 15px;text-align:center">Date Of Birth : <b>{{  $student->dob!=null?date('d-m-Y', strtotime($student->dob)):'' }}</b></div>  
<div  style="font-size: 15px;text-align:center">Contact No : <b>{{ $student->addressDetails->address->primary_mobile or ''}}</b></div> 
<div  style="font-size: 15px;text-align:center">Address</div> 
<div  style="font-size: 15px;text-align:center;"><b>{{ $student->addressDetails->address->p_address or ''}}</b></div> 
</div> 
<div id="footer" style="background-color:green;color: white">
<h3 style="text-align:center;padding-bottom:7px">Contact : 8210228581</h3>
</div> 
</div>  
<div  style="font-size: 20px;text-align:center">
<h4 style="padding-top: 7px;text-align:center">IN CASE OF EMERGENCY PLEASE CALL
</h4>
<h4 style="text-align:center;color:red">99999999999</h4>  
<b>RESIDENTIAL Address</b>
</div> 
<div  style="font-size: 15px;text-align:center;"><b> {{ $student->c_address }}</b></div> 
<p align="center">Cafeteria</p>
<div  style="font-size: 20px;text-align:center;"><b>SCHOOL COMPUS</b></div> 
<div  style="font-size: 15px;text-align:center;"><b> 93, Green Road Rohtak 93, Green Road Rohtak - 1200001 (HR)</b></div>
</div> 
@if ($student->gender_id==1)
<div id="footer" style="background-color:green">
<h3 style="text-align:center;padding-bottom:7px">{{ $student->classes->name or '' }} - {{ $student->sectionTypes->name or '' }}</h3>
</div>
@else 
<div id="footer" style="background-color:green">
<h3 style="text-align:center;padding-bottom:7px">{{ $student->classes->name or '' }} - {{ $student->sectionTypes->name or '' }}</h3>
</div> 
@endif
</div> 
</div>
</body>
@endforeach
</html>