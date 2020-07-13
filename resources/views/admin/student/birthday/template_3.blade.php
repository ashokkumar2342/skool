<!DOCTYPE html>
<html>
<head>
    <title>Birthday Card</title>
    <style>
    	body{
    		background-color: #345773;
    	}
    </style> 
</head>
@php
$paths =storage_path('app/student/birthday/birthday_2.jpeg');
@endphp
@foreach ($students as $student) 
<body>  
    {{-- <img src="{{ $paths }}" style="width: 100%;">  --}}
</div>
@php
$path =storage_path('app/student/profile/'.$student->picture);
@endphp
<div>
    <img src="{{ $path }}"   id="imgBorder">
    <h3>{{ $student->name }}</h3>
</div> 
</body>
@endforeach
</html>

