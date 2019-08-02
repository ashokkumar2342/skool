 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 
 <body>
 	@foreach ($students as $student)
	 	<div >
		<p>Name : <b>{{ $student->name }}</b></p>
			  <p>Father'Name : <b>{{ $student->father_name }}</b></p>
			  <p> Address : <b>{{ $student->p_address }}</b></p> 
			  
	 	</div>
 	@endforeach
 </body>
 </html>
 