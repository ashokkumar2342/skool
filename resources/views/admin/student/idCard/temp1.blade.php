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
					color: red !important;
				}
			}
			 
	</style>
</head>

<body>
{{-- <img src="{{ asset('img/temp2.jpg') }}"  alt=""> --}}
<table>
		@php
		$keyStartCheck1=0;
		$tr='<tr>';
		$trc='</tr>';
		@endphp
	@foreach ($students as $student) 
	@php 
		$keyStartCheck1=$keyStartCheck1+1; 
		if($keyStartCheck1==3){
			$keyStartCheck1=0; 
		} 
		@endphp
		@if($keyStartCheck1==1)
		{!! $tr !!}
		@endif
	 
		<td>
				<div style="width: 300px;border:1px solid #eee;margin-top-5px">
						<div class="ic_card_header" style="background-color:red;height: 60px;padding:0px;text-align:center;padding-top:7px;" >
						   <span style="color:#fff;padding-top: 7px;font-size: 22px;"><b>ZAD Global School</b></span><br>
							   <span style="color:#fff;font-size: 12px;">CBSC Affilation Code 2001</span> 
						</div> 
							<div  style="font-size: 22px;text-align:center">{{ $student->academicYear->name }}</div> 
						  <div align="center">
							  <img  src="{{ public_path("1517293077.png") }}" alt="" width="100px" style="border:solid 2px Black">
						 </div>
						 <div  style="font-size: 20px;text-align:center"><b>{{ $student->name }} {{ $student->last_name }}</b></div> 
						  <div  style="font-size: 15px;text-align:center">Parent s Name</div> 
						  <div  style="font-size: 20px;text-align:center"><b>{{ $student->father_name }}</b></div> 
						  <div  style="font-size: 15px;text-align:center">Date Of Birth : <b>{{  $student->dob!=null?date('d-m-Y', strtotime($student->dob)):'' }}</b></div>  
						  <div  style="font-size: 15px;text-align:center">Contact No : <b>{{ $student->father_mobile }}</b></div> 
						  <div  style="font-size: 15px;text-align:center">Address</div> 
						  <div  style="font-size: 15px;text-align:center;height:30px"><b>{{ $student->p_address }}</b></div> 
						  <div class="ic_card_header" style="background-color:red;height: 40px">
						   <h3 style="color:#fff;padding-top: 7px;text-align:center">{{ $student->classes->name or '' }} - {{ $student->sectionTypes->name or '' }}</h3>
					   </div>  
					</div>  
				</br>
					<div style="width: 300px;border:1px solid #eee">
		 
							<div><h3 style="padding-top: 7px;text-align:center">IN CASE OF EMERGENCY PLEASE CALL
						   </h3>
						   <h3 style="text-align:center;color:red">99999999999</h3>	
						
						</div>  
						 <div  style="font-size: 20px;text-align:center"><b>RESIDENTIAL Address</b></div> 
						  <div  style="font-size: 15px;text-align:center;height:30px"><b> {{ $student->c_address }}</b></div> 
						  <p align="center">Cafeteria</p>
						  <div  style="font-size: 20px;text-align:center;"><b>SCHOOL COMPUS</b></div> 
						  <div  style="font-size: 15px;text-align:center;"><b> 93, Green Road Rohtak 93, Green Road Rohtak - 1200001 (HR)</b></div>
						  <br><br>
						  <div class="ic_card_header" style="background-color:red;padding-top:5px;padding-left:25px;text-align:center">
						   <span style="color:#fff;padding-top: 7px;text-align:center">Mobile :- 99999999999</span><br>
						   <span style="color:#fff;padding-top: 7px;text-align:center">Email :- info@iskool.com</span>
					   </div>  
					</div> 
		</td>
		@if($keyStartCheck1==3)
		{!! $trc !!}
		@endif
	 
	@endforeach
</table>
 

 
 
 

 {{-- <img  src="{{ asset('img/temp1_back.png') }}" alt="" width="300px"> --}}
</body>
</html>