<!DOCTYPE html>
<html>
<head>
<title>Birthday Card</title>
<style>
#Avatar {
  border-radius: 300%;
} 
div.ex1 {
  width:50px;
  margin: auto;
  border: 3px solid #73AD21;
}
</style>
@include('admin.include.boostrap')
</head>
@php
$backgroundImg =storage_path('app/student/birthday/birthday_1.png');
@endphp
@foreach ($students as $student) 
<body style="border-style: dashed;"> 
<div style="position: fixed; left: 0px; top: 0px; bottom: 0px; right: 0px; bottom: 0px; text-align: center;">
<img src="{{ $backgroundImg }}" style="width: 100%;"> 
</div>
@php
$path =storage_path('app/student/profile/'.$student->picture);
$paths =storage_path('app/student/profile/'.''); 
@endphp
<div style="text-align: center;padding-top: 170px">
	@if ($path==$paths)
  	  <img  src="''" id="Avatar" width="130px" style="border:solid 2px Black;margin-top: 10px"> 
	  @else
	  <img  src="{{ $path }}" id="Avatar" width="130px" style="border:solid 2px Black;margin-top: 10px">  
	@endif
{{-- <img src="{{ $path }}" alt="Avatar" id="Avatar" style="width:130px;border: 2px solid black;">  --}}
<h4 style="color:red;margin-top: -10px"><b>{{ $student->name }}</b></h4>
<h5><b>{{ date('d-M-Y',strtotime($student->dob)) }}</b></h5>
<h5><b>{{ $student->classes->name or '' }}/{{ $student->sectionTypes->name or '' }}</b></h5>
<h5>may you be blessed with everything may this birthday you shine the </h5>
<h5>brightest with cheer stay this way forever</h5>
<h5>happiest birthday wish to you</h5>
<h5>  Gog bless yow</h5>
<h4 style="background-color: red;color: yellow;">With Best Wishes From</h4>
<h3 style="margin-top: -8px">Eageskool Sr Sec Loharu Road Bhiwani </h3>
{{-- <div style="height: 100px;width: 500px;">
@include('schoolDetails.logo_header')
</div> --}}
<h5 style="margin-top: 50px">Director</h5>

 
</body>
@endforeach
</html>

