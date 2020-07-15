<!DOCTYPE html>
<html>
<head>
<title>IdCard</title>
<style>
@include('admin.include.boostrap')
</style>
</head>
@foreach ($students as $student) 
<body>
<div class="row text-center"> 
<div class="col-lg-6">
 <div class="card" style="background-color: #fff;color: black"> 
	<div style="background-color:black;text-align:center;"> 
		<span style="color:red;padding-top: 7px;font-size:20px;"><b>Eageskool Sr Sec Loharu Road Bhiwani</b></span><br>
		<span style="color:#fff;font-size: 12px;"><b>CBSE Affilation Code 2020</b></span> 
	</div>  
@php
$path =storage_path('app/student/profile/'.$student->picture);
$paths =storage_path('app/student/profile/'.''); 
@endphp 
@if ($path==$paths)
	  <img  src="''" id="Avatar" width="120px" style="border:solid 2px Black;margin-top: 20px;text-align:center "> 
  @else
  <img  src="{{ $path }}" id="Avatar" width="120px" style="border:solid 2px Black;margin-top: 20px;"> 
  {{-- <b><button style="margin-left: 30px">Blood Group (A+)</button></b> --}}
@endif 
  <table style="height: 5px; width: 300px;">
  <tbody>
  <tr>
  <td style="width: 10px;">Name :</td>
  <td style="width: 100px;">Dilip Kumar chauhan</td>
  </tr>
  <tr>
  <td style="width: 10px;">Registartion No. :</td>
  <td style="width: 100px;">123456</td>
  </tr>
  <tr>
  <td style="width: 10px;">Father's Name</td>
  <td style="width: 100px;">Preman Chauhan</td>
  </tr>
  <tr>
  <td style="width: 10px;">Date of Birth</td>
  <td style="width: 100px;">10-02-1988</td>
  </tr><tr>
  <td style="width: 10px;">Class/Section</td>
  <td style="width: 100px;">First-section A</td>
  </tr><tr>
  <td style="width: 10px;">Date of Birth</td>
  <td style="width: 100px;">10-02-1988</td>
  </tr>
  </tbody>
  </table>
	<div style="background-color:black;text-align:center;height: 50px"> 
		<span style="color:#fff;font-size:18px;"><b>Contact : 8210228581</b></span> 
	</div>  
</div>
</div><div class="col-lg-5">
 <div class="card" style="background-color: #fff;color: black"> 
	<div style="background-color:black;text-align:center;"> 
		<span style="color:red;padding-top: 7px;font-size:20px;"><b>Eageskool Sr Sec Loharu Road Bhiwani</b></span><br>
		<span style="color:#fff;font-size: 12px;"><b>CBSE Affilation Code 2020</b></span> 
	</div>  
@php
$path =storage_path('app/student/profile/'.$student->picture);
$paths =storage_path('app/student/profile/'.''); 
@endphp 
@if ($path==$paths)
	  <img  src="''" id="Avatar" width="120px" style="border:solid 2px Black;margin-top: 20px;text-align:center "> 
  @else
  <img  src="{{ $path }}" id="Avatar" width="120px" style="border:solid 2px Black;margin-top: 20px;"> 
  {{-- <b><button style="margin-left: 30px">Blood Group (A+)</button></b> --}}
@endif 
  <table style="height: 5px; width: 300px;">
  <tbody>
  <tr>
  <td style="width: 10px;">Name :</td>
  <td style="width: 100px;">Dilip Kumar chauhan</td>
  </tr>
  <tr>
  <td style="width: 10px;">Registartion No. :</td>
  <td style="width: 100px;">123456</td>
  </tr>
  <tr>
  <td style="width: 10px;">Father's Name</td>
  <td style="width: 100px;">Preman Chauhan</td>
  </tr>
  <tr>
  <td style="width: 10px;">Date of Birth</td>
  <td style="width: 100px;">10-02-1988</td>
  </tr><tr>
  <td style="width: 10px;">Class/Section</td>
  <td style="width: 100px;">First-section A</td>
  </tr><tr>
  <td style="width: 10px;">Date of Birth</td>
  <td style="width: 100px;">10-02-1988</td>
  </tr>
  </tbody>
  </table>
	<div style="background-color:black;text-align:center;height: 50px"> 
		<span style="color:#fff;font-size:18px;"><b>Contact : 8210228581</b></span> 
	</div>  
</div>
</div>
</div> 
</body>
@endforeach
</html>