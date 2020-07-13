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
$paths =storage_path('app/student/birthday/birthday_2.png');
@endphp
@foreach ($students as $student) 
<body style="border-style: dashed;"> 
<div style="position: fixed; left: 0px; top: 0px; bottom: 10px; right: 0px; bottom: 10px; text-align: center;">
<img src="{{ $paths }}" style="width: 100%;"> 
</div>
@php
$path =storage_path('app/student/profile/'.$student->picture);
@endphp
<div class="row" style="text-align: center;padding-top: 280px"> 
<div class="col-lg-6">
<img src="{{ $path }}" alt="Avatar" id="Avatar" style="width:130px;border: 2px solid black;"> 
<h4 style="color:red;"><b>{{ $student->name }}</b></h4>
<h5><b>{{ date('d-M-Y',strtotime($student->dob)) }}</b></h5>
<h5><b>{{ $student->classes->name or '' }}/{{ $student->sectionTypes->name or '' }}</b></h5>
</div>
<div class="col-lg-3">
<h5>may you be blessed with everything may this birthday you shine the </h5>
<h5>brightest with cheer stay this way forever</h5>
<h5>happiest birthday wish to you</h5>
<h5>  Gog bless yow</h5>
<h5 style="background-color: yellow">Academic Year 2000-2001</h5>
</div>
</div>
<div class="row">
<div class="col-lg-12" style="text-align: center;"> 
<h4 style="background-color: red">With Best Wishes From</h4>
</div>
</div>
<div class="row"> 
<div class="col-lg-10" style="text-align: right;"> 
<h3>Eageskool Sr Sec Loharu Road Bhiwani </h3> 
<h5 style="margin-top: 50px">Director</h5>
</div>
</div>

 </div>
</body>
@endforeach
</html>

