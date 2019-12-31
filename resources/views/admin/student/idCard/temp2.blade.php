<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
	<title></title>
	<style>
	@media print {
		.ic_card_header {
			background-color: red !important;
			-webkit-print-color-adjust: exact; 
		}
	}
	
	@media print {
		.vendorListHeading .ic_card_header {
			color: blue !important;
		}
	}
	 @page { margin:0px; }
	 #footer {
	    position:absolute;
	    bottom:0;
	    width:100%;
	    height:50px;   /* Height of the footer */
	    background:blue;
	 }
	 #front{
	 	width: 100%;
	  	height: 350px;

	</style>
</head>
 @foreach ($students as $student)
<body style="margin: 0px; padding:0px;">  
<div  id="front">
		<div   style="background-color:blue;text-align:center;" >
		   <span style="color:#fff;padding-top: 7px;font-size: 26px;"><b>ZAD Global School</b></span><br>
			   <span style="color:#fff;font-size: 12px;"><b>CBSC Affilation Code 2001</b></span> 
		</div> 
		<div style="height:30px;margin-left:30px;margin-right: 30px">
				<div  style="font-size: 22px;text-align:center">{{ $student->academicYear->name or ''}}</div>
		</div> 
			   <div align="center">
			  	@php
			  		$path =storage_path('app/student/profile/'.$student->picture);
			  		$paths =storage_path('app/student/profile/'.''); 
			  	@endphp 
			  	@if ($path==$paths)
			  	<img  src="''" alt="" width="103px" height="103px" style="border:solid 2px Black"> 
				  @else
				  <img  src="{{ $path }}" alt="" width="103px" height="103px" style="border:solid 2px Black"> 

			  	@endif
			    </div> 
				<div  style="text-align:center"><h4>{{ $student->name }}</h4>  
			   </div> 
			   <div style="padding-top: -10px">
			    <span style="margin:8px">Father's Name :<b>{{ $student->father_name }}</b></span><br>
			    <span style="margin:8px">Mobile No :<b>{{ $student->father_mobile }}</b></span><br>
			     
			    <span style="margin:8px">Date of Birth :<b>{{ date('d-m-Y',strtotime($student->dob)) }}</b></span><br>
			    <span style="margin:8px">Address :<b>{{ $student->p_address }}</b></span>
			</div>
			</div>     
		  <div id="footer">
		   <h3 style="color:#fff;text-align:center;padding-bottom:7px">{{ $student->classes->name or '' }} - {{ $student->sectionTypes->name or '' }}</h3>
	  	  </div>  
	  
 
   <div style="height:350px;width: 100%;">
   		 
	<div >
		<h3 style="padding-top: 7px;text-align:center">IN CASE OF EMERGENCY PLEASE CALL
	   </h3>
	   <h3 style="text-align:center;color:red">99999999999</h3>	 
	  
	 <div  style="font-size: 20px;text-align:center"><b>RESIDENTIAL Address</b></div> 
	  <div  style="font-size: 15px;text-align:center;"><b> {{ $student->c_address }}</b></div> 
	  <p align="center">Cafeteria</p>
	  <div  style="font-size: 20px;text-align:center;"><b>SCHOOL COMPUS</b></div> 
	  <div  style="font-size: 15px;text-align:center;"><b> 93, Green Road Rohtak 93, Green Road Rohtak - 1200001 (HR)</b></div>
	</div>  
 
  	  <div id="footer">
  	   <h3 style="color:#fff;text-align:center;padding-bottom:7px">{{ $student->classes->name or '' }} - {{ $student->sectionTypes->name or '' }}</h3>
    	</div> 
</div>
</body>
@endforeach
</html>