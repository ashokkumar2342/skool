 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 <body>
 	@foreach ($students as $student)
 	 <div>
		<p>Name : <b>{{ $student->name }}</b></p>
		<p>Class : <b>{{ $student->classes->name or ''}}</b>&nbsp;&nbsp;&nbsp; Section : <b>{{ $student->sectionTypes->name or ''}}</b></p>
		<p> Roll No : <b>{{ $student->roll_no }}</b>&nbsp;&nbsp;&nbsp; Subject : <b>{{ $StudentSubject->SubjectTypes->name or '' }}</b></p> 
			  
	 	</div>
 		 
 	@endforeach
 </body>
 </html>
 