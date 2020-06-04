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
  <div class="row" style="margin-top: -20px">
<div class="panel panel-default">
  <div class="panel-heading">Academic Year : <b>{{ $academicYear->name }}</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fee Due Report</div>
  </div>  
    <table class="table table-striped table-bordered" style="margin-top: 10px">
    	<thead>
    		<tr>
    			<th style="width:8% "class="text-nowrap">Sr.No.</th>
          <th class="text-nowrap">Fee  Name </th>
    			<th style="width:10%" class="text-nowrap">Amount</th> 
          <th style="width:22%">Session Month</th> 
          <th style="width:22%">Due In Month Year</th> 
          <th style="width:10%" class="text-nowrap">Total Amount</th> 
          <th style="width:10%">Total Session Month</th> 
    		</tr>
    	</thead>
    	<tbody>
      @php
      $arrayId=1;
    @endphp  
   	  @foreach ($classFeeStructureReports as $classFeeStructureReport) 
    		<tr>
    			<td class="text-nowrap">{{ $arrayId++ }}</td>
          <td >{{ $classFeeStructureReport->name }}</td>
    			<td align="right" class="text-nowrap">{{ $classFeeStructureReport->amount }}</td> 
          <td >{{ $classFeeStructureReport->SessionMonth }}</td> 
          <td >{{ $classFeeStructureReport->DueMonthYear }}</td> 
          <td align="right" class="text-nowrap">{{ $classFeeStructureReport->TotalAmount }}</td> 
          <td >{{ $classFeeStructureReport->TotalSessionMonth }}</td> 
    		</tr>
    	@endforeach 	
    	</tbody>
    </table> 
</body>
</html>