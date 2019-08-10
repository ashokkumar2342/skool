<!DOCTYPE html>
<html>
<head>
	<title>perent</title>
</head>
<style>
	 {

	 background-color:#FF33FF;}
	 @page { margin:0px; }
	 #footer {
	    position:absolute;
	    bottom:0;
	    width:100%;
	    height:20px;   /* Height of the footer */
	    background:#bd0e35;
	 }
	  
</style>
 @include('admin.include.boostrap')
<body style="margin: 0px; padding:0px;">  
  <div  id="front">
	 
		<div   style="background-color:#bd0e35;text-align:center;" >
		   <span style="color:#fff;padding-top: 7px;font-size:17px;"><b>VAISH MODEL SENIOR SECONDARY SCHOOL </b></span><br>
			   <span style="color:#fff;font-size: 12px;"><b>CBSC Affilation Code 2019</b></span> 
		</div> 
		  
			   <div class="col-lg-2" style="padding-top: 20px">
			  	@php
			  		$path =storage_path('app/id_card/images.jpg');
			  	@endphp
				  <img  src="{{ $path }}" alt="" width="100px" height="100px" style="border:solid 2px Black">
			    </div>
			    <div class="col-lg-10" style="padding-top: 12px;margin-left: 18px"> 

			    	 <span> Name :<b>{{ $students->name }}</b></span><br>
			    	 <span>F Name :<b>{{ $students->father_name }}</b></span><br>
			    <span>Mobile No :<b>{{ $students->father_mobile }}</b></span><br>
			     
			    <span>Date of Birth :<b>{{ date('d-m-Y',strtotime($students->dob)) }}</b></span><br>
			    <span>Class :<b>{{ $students->classes->name or ''}}</b></span><br>
			    <span>Section :<b>{{ $students->sectionTypes->name or '' }}</b></span>
			    </div> 
			    <div style="padding-left: 4px;padding-right: 4px">
			    <span >Address :<b>{{ $students->p_address }}</b></span> 
			    </div>
			    <div style="padding-left:230px"> 
			    <span>Principal</span>	
			    </div>
			     
			    
			
		  <div id="footer">
		   <h3 style="color:#FF33FF;text-align:center;padding-bottom:7px">{{ $students->classes->name or '' }} - {{ $students->sectionTypes->name or '' }}</h3>

	  	  </div>   
	</div> 
</body>
</html>