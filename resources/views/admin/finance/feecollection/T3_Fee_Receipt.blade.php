<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
<style> 
.pagenum:before {
content: counter(page);
}
.page_break{
page-break-before:always;  
} 
.underlin{ 
border-bottom: 1px solid black;
line-height: 25px;
width: 700px; 
} 
.underlin2{ 
border-bottom: 1px solid black;
line-height: 25px;
width: 700px; 
}
#t01 th {
  background-color: black;
  color: white;
} 
#t02 th {
  background-color:#00c0ef;
  color: white;
} 
</style>
@include('admin.include.boostrap')
</head> 
<body> 
@include('schoolDetails.logo_header')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
         <div class="panel-heading text-center" style="font-size: 20px;height: 20px;line-height: 20px;"><b>Fee Receipt</b></div>
        </div>  
	    <div class="underlin text-center"></div>  
		<table class="table" style="border: 1px solid black;">
		<tbody>
	@foreach ($student as $key=>$student) 
		<tr>
		<td>Receipt No.</td>
		<td class="text-nowrap"><b>{{ $student->rec_no }}</b></td> 
		<td>Date</td>
		<td><b>{{ date('d-m-Y',strtotime($student->rec_date)) }}</b></td>
		</tr>
		<tr>
		<td>Registration No.</td>
		<td><b>{{ $student->registration_no }}</b></td> 
		<td>Class/Section</td>
		<td><b>{{ $student->class_name }}</b></td>
		</tr>
		<tr>
		<td>Name</td>
		<td><b>{{ $student->stu_name }}</b></td> 
		<td>Mobile No</td>
		<td><b>{{ $student->mobileno }}</b></td>
		</tr>
		<tr>
		<td>Father's Name</td>
		<td><b>{{ $student->f_name }}</b></td> 
		<td>Period</td>
		<td><b>{{ $student->rec_period }}</b></td>
		</tr>
		</tbody>
		</table> 
		<table id="t01" class="table" style="border: 1px solid black;">
		  	<thead>
		  		<tr>
		  			<th>Particulars</th>
		  			<th>Amount</th>
		  		</tr>
		  	</thead> 
		  	<tbody>
		  		@foreach ($feeDetails as $feeDetail)
		  		<tr>
		  			<td><b>{{ $feeDetail->name }}</b></td>
		  			<td><b>{{ $feeDetail->fee_amt }}</b></td>
		  		</tr> 
		  		@endforeach
		  		<tr>
		  			<td><b>Net Amount</b></td>
		  			<td><b>{{ $student->rec_amt  }}</b></td>
		  		</tr>
		  		<tr>
		  			<td><b>Amount Deposit</b></td>
		  			<td><b>{{ $student->amt_deposit }}</b></td>
		  		</tr>
		  		@php
            	$balance =$student->rec_amt - $student->amt_deposit;
                @endphp
                @if ($balance !=0)
                <tr>
		  			<td><b>Balance Amount</b></td>
		  			<td><b>{{ $balance  }}</b></td>
		  		</tr>
		  		@endif
		  	</tbody>
		  </table>
		  Amount In Words : Rs <b> {{ $student->amt_in_words }}</b>
		 <div class="panel panel-info">
         <div class="panel-heading" style="height: 10px;line-height: 10px;"><b>Payment Details</b></div>
         <div class="panel-body">
         <table class="table table-bordered">
          	<thead>
          		<tr>
          			<th>Payment Mode</th>
          			<th>Tran./Cheque No</th>
          			<th>Bank Name</th>
          		</tr>
          	</thead>
          	<tbody>
          		@foreach ($payment_mode as $key=>$value) 
                <tr>
                    <td>{{ $value->name }}</td>    	                         
                    <td>{{ $cheeque_no[$key] }}</td>
                    <td>{{ $bank_name[$key] }}</td> 
                </tr>
                @endforeach
          	</tbody>
          </table> 
         </div>
        </div>
        Note :<div class="underlin2"></div> 
        <div class="row">
          <div class="col-lg-4" style="margin-top: 20px;float-right"> 
          Auth Signature  
          </div> 
        </div>
        @endforeach 
	</div>
</div>
</body> 
</html>