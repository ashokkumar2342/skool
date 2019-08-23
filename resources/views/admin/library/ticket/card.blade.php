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
$path =storage_path('app/library/library_card1.jpg');
@endphp
<body >
	
	<div style="position: fixed; left: 0px; top: 0px; bottom: 0px; right: 0px; bottom: 0px; text-align: center;z-index: -1000; ">
	  <img src="{{ $path }}" style="width: 100%;">


	</div>
	         @foreach ($memberTicketDetails as $memberTicketDetail)
				@php
				$paths =storage_path('app/student/library/'.$memberTicketDetail->barcode);
			    @endphp
			    <div style="padding-top: 10px ;" align="cente">
			    	
				  <img  src="{{ $paths }}" alt="" width="140px" height="90px" style="margin: 20px;" >
			    </div>
	         	 
	         @endforeach
	              
			  	 
			 
			  	 
				   	  
 	 
</body>
</html>

