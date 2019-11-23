<!DOCTYPE html>
<html>
<head>
	<title>Birthday Card</title>
	<style>
		
	 @page { margin:0px; }
	 #imgBorder {
      border-radius: 150%;
      border: solid 2px black;
       }
	</style>
	@include('admin.include.boostrap')
</head>
 @php
$paths =storage_path('app/student/birthday/birthday.jpg');
@endphp
@foreach ($students as $student) 
<body >
	
	<div style="position: fixed; left: 0px; top: 0px; bottom: 0px; right: 0px; bottom: 0px; text-align: center;z-index: -1000; ">
	  <img src="{{ $paths }}" style="width: 100%;"> 
	</div>
      @php
  		$path =storage_path('app/student/profile/'.$student->picture);
  	 @endphp
  	 <div style="padding-top:50px;margin-left: 50px;">
  	 	<img src="{{ $path }}"   id="imgBorder" style="width:150px">
  	 	<h3 style="padding-top:-30px;padding-left: 15px;" >{{ $student->name }}</h3>
  	 </div>
  	 
  	 <div style="margin-left: 50px;">
  	 	 
  	 	<h4 style="padding-left: 15px;" >{{ $template->message }}</h4>
  	 </div> 
</body>
@endforeach
</html>

