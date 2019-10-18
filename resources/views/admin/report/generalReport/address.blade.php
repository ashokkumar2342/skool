 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 
 <body>
 	@foreach ($students as $student)
 	@if ($student->relation_id==1 or $student->relation_id==null)
	 	<div >
		      <p>Name : <b>{{ $student->name }}</b></p>
			  <p>Father's Name : <b>{{ $student->f_name }}</b></p>
			  <p> Address : <b>{{ $student->p_address }}</b></p> 
			  
	 	</div>
	 	@endif
 	@endforeach
 </body>
 </html>
 