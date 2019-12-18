<!DOCTYPE html>
<html>
<head>
	<title>Class Fee Structure Report</title>
	<style>
		.page-break{
			page-break-after: always;
		}
	</style>
</head>
@include('admin.include.boostrap')
<body>
  
 @foreach ($classFeeStructureReports as $key=>$values) 
   <div class="row" style="margin: 8px">
   
   	<div class="col-lg-3">
   	 <b>Class</b> 
   	</div>
   	<div class="col-lg-3">
   	{{ $values[0]->class_name }} 
   	</div>
   	<div class="col-lg-3">
   	 <b>Academic Year </b>
   	</div> 
   	<div class="col-lg-2">
   	 {{ $values[0]->year_name }} 
   	</div>
   	 
   </div> 
    <table class="table" style="margin-top: 10px">
    	<thead>
    		<tr>
    			<th>Fee  Name </th>
    			<th style="width:10%">Amount</th>
    			<th style="width:14%">Due Amount</th>
    			<th style="width:20%">Total Due Amount</th>
    		</tr>
    	</thead>
    	<tbody>
      @php
   		$total = (int) '';
   	  @endphp
   	  @foreach ($values as $id => $value) 
      	@php
      		$total+= (int) $value->total_amt_due;
   	   @endphp 
    		<tr>
    			<td>{{ $value->fee_name }}</td>
    			<td align="right">{{ $value->fee_amt }}</td>
    			<td align="right">{{ $value->total_dues }}</td>
    			<td align="right">{{ $value->total_amt_due }}</td>
    		</tr>
    	@endforeach 	
    	</tbody>
    </table>
   <div class="row" style="margin-top: 30px">
    <div class="col-lg-3 pull-right">
   	<span >Total &nbsp; <b>{{ $total }}</b></span> 
   	</div> 
   </div>
   <hr>
   @if (!empty($pagebreak))
     <div class="page-break"></div> 
   @endif
@endforeach 
</body>
</html>