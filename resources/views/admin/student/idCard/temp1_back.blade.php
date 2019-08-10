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

<body style="margin: 0px; padding:0px">
 
<table>
		@php
		$keyStartCheck1=0;
		$tr='<tr>';
		$trc='</tr>';
		@endphp
	 
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
				 
					<div style="width: 260px;border:1px solid #eee">
		 
							<div><h3 style="padding-top: 7px;text-align:center">IN CASE OF EMERGENCY PLEASE CALL
						   </h3>
						   <h3 style="text-align:center;color:red">99999999999</h3>	
						
						</div>  
						 <div  style="font-size: 20px;text-align:center"><b>RESIDENTIAL Address</b></div> 
						  <div  style="font-size: 15px;text-align:center;height:30px"><b> {{ $students->c_address }}</b></div> 
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
	 
	 
</table>
 

 
 
 

 {{-- <img  src="{{ asset('img/temp1_back.png') }}" alt="" width="300px"> --}}
</body>
</html>