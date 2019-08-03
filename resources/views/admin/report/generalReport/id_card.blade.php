  <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 <body>
 	@foreach ($students as $student)
	 	 
		<p>Name : <b>{{ $student->name }}</b></p>
	    <p>Father'Name : <b>{{ $student->father_name }}</b></p>
	    <p>Mobile No : <b>{{ $student->father_mobile }}</b></p>
	    <p>Date of Birth : <b>{{ $student->dob }}</b></p>
	    <p> Address : <b>{{ $student->p_address }}</b></p> 
			  
	 	 
 	@endforeach
 </body>
 </html>
 