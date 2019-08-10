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
$path =storage_path('app/student/birthday/birthday.jpg');
@endphp
<body >
	
	<div style="position: fixed; left: 0px; top: 0px; bottom: 0px; right: 0px; bottom: 0px; text-align: center;z-index: -1000; ">
	  <img src="{{ $path }}" style="width: 100%;">


	</div>
	              @php
			  		$path =storage_path('app/student/profile/'.$students->picture);
			  	 @endphp
			  	 <div style="padding-top:50px;margin-left: 50px;">
			  	 	<img src="{{ $path }}"   id="imgBorder" style="width:150px">
			  	 	<h3 style="padding-top:-30px;padding-left: 15px;" >{{ $students->name }}</h3>
			  	 </div>
			  	 
			 
			  	 
				   	  
 	 
</body>
</html>

