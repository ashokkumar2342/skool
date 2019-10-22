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
			  <p>Father's Name : <b>{{ $student->parents[0]->parentInfo->name or ''}}</b></p>
			  <p>Mobile No. : <b>{{ $student->addressDetails->address->primary_mobile or ''}}</b></p>
			  <p> Address : <b>{{ $student->addressDetails->address->p_address or ''}}</b></p> 
			  
	 	</div>
	 	@endif
 	@endforeach
 </body>
 </html>
 