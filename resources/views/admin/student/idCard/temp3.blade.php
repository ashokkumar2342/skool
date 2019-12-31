<!DOCTYPE html>
<html>
<head>
	<title>temp3</title>
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
	    
	 }
	  
</style>
 @include('admin.include.boostrap')
  @foreach ($students as $student)
<body style="margin: 0px; padding:0px;">  
  <div  id="front">
	 @if ($student->gender_id==1)
		<div style="background-color:#7f2809;text-align:center;" >
		@else
		<div style="background-color:#810236;text-align:center;" >
	 @endif		
		   <span style="color:#fff;padding-top: 7px;font-size:17px;"><b>VAISH MODEL SENIOR SECONDARY SCHOOL </b></span><br>
			   <span style="color:#fff;font-size: 12px;"><b>CBSC Affilation Code 2019</b></span> 
		</div> 
		  
			   <div class="col-lg-2" style="padding-top: 50px">
			  	@php
			  		$path =storage_path('app/student/profile/'.$student->picture);
			  		$paths =storage_path('app/student/profile/'.''); 
			  		$data =storage_path('app/student/barcode/'.$student->registration_no.'.'.'png');
			  	@endphp 

				  <img  src="{{ $data }}" width="120px" height="30px" style="float:center;margin-top: -45px;margin-left: 140px">
			 
			  	@if ($path==$paths)
			  	<img  src="''" alt="" width="103px" height="100px" style="border:solid 2px Black"> 
				  @else
				  <img  src="{{ $path }}" alt="" width="100px" height="100px" style="border:solid 2px Black"> 

			  	@endif
			    </div>
			    <div class="col-lg-10" style="padding-top: 45px;margin-left: 22px"> 

			    	 <span> Name :<b>{{ $student->name }}</b></span><br>
			    	 <span>F Name :<b>{{ $student->parents[0]->parentInfo->name or ''}}</b></span><br>
			    <span>Mobile No :<b>{{ $student->addressDetails->address->primary_mobile or ''}}</b></span><br>
			     
			    <span>Date of Birth :<b>{{ date('d-m-Y',strtotime($student->dob)) }}</b></span><br>
			    <span>Class :<b>{{ $student->classes->name or ''}}</b></span><br>
			    <span>Section :<b>{{ $student->sectionTypes->name or '' }}</b></span>
			    </div> 
			    <div style="padding-left: 4px;padding-right: 4px">
			    <span >Address :<b>{{ $student->addressDetails->address->p_address or ''}}</b></span> 
			    </div>
			    <div style="padding-left:230px"> 
			    <span>Principal</span>	
			    </div>
			     
			    
			@if ($student->gender_id==1)
				  <div id="footer" style="background-color:#7f2809">
				   <h3 style="color:#FF33FF;text-align:center;padding-bottom:7px">{{ $student->classes->name or '' }} - {{ $student->sectionTypes->name or '' }}</h3> 
			  	  </div> 
			  @else	
			  <div id="footer" style="background-color:#810236">
				   <h3 style="color:#FF33FF;text-align:center;padding-bottom:7px">{{ $student->classes->name or '' }} - {{ $student->sectionTypes->name or '' }}</h3> 
			  	  </div>
			 @endif 	      
	</div> 
</body>
@endforeach
</html>