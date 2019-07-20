
<!DOCTYPE html>
<html>
<head>
	<title>Birthday Card</title>
</head>
<body>
@foreach ($students as $student)
 	<section>
 	<div>
  	<img src="{{ asset('img/birthday_card.png') }} " alt="">
  	 <li>Name</li>
  		<h1 align="center" style="color:red;margin-top: -500px;">{{ $student->name }}</h1>
  	</div>
 	</section>
@endforeach
	
 
</body>
</html>

 