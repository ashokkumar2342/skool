<!DOCTYPE html>
<html>
<head>
	<title>Fee Structure Last Date Report</title>
	<style>
		.page-break{
			page-break-after: always;
		}
	</style>
</head>
@include('admin.include.boostrap')
<body>
  @include('schoolDetails.logo_header')
 @foreach ($classFeeStructureReports as $key=>$values)
  <div class="panel panel-default"> 
    <div class="panel-body"> 
   <div class="row" style="margin-right: 18px"> 
   	<div class="col-lg-1" style="margin-left: 8px">
    Fee Structure 
   	</div>
   	<div class="col-lg-2"> 
      
     <b> </b>
     
   	</div>
    <div class="col-lg-3">
      
    </div>

   	<div class="col-lg-2" style="margin-left: 30px">
   	 Academic Year  
   	</div> 
   	<div class="col-lg-2">
   	 <b>{{ $values[0]->year_name }} </b>
   	</div> 
   </div>
   </div>
   </div> 
    <table class="table table-striped table-bordered" style="margin-top: 10px">
    	<thead>
    		<tr>
    			<th class="text-nowrap">Fee  Name </th>
    			<th style="width:10%" class="text-nowrap">Amount</th>
    			<th style="width:10%" class="text-nowrap">Due Count</th>
    			<th style="width:12%" class="text-nowrap">Due Amount</th>
    		</tr>
    	</thead>
    	<tbody>
      @php
   		$total = (int) '';
   	  @endphp
   	  @foreach ($values as $id => $value) 
      	{{-- @php
      		(int)$total+= (int) $value->total_amt_due;
   	   @endphp  --}}
    		<tr>
    			<td class="text-nowrap">{{ $value->fee_name }}</td>
    			<td align="right" class="text-nowrap">{{ $value->fee_amt }}</td>
    			<td align="right" class="text-nowrap">{{ $value->total_dues }}</td>
    			<td align="right" class="text-nowrap">{{ $value->total_amt_due }}</td>
    		</tr>
    	@endforeach 	
    	</tbody>
    </table>
   <div class="row" style="margin-top: 30px">
    <div class="col-lg-2 pull-right">
   	<h4><span >Total &nbsp;<b>{{ number_format($total,2 )}}</b></span> </h4>
   	</div> 
   </div>
   <hr>
   @if (!empty($pagebreak))
     <div class="page-break"></div> 
   @endif
@endforeach 
</body>
</html>