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
   <div class="row" style="margin-right: 18px"> 
   	<div class="col-lg-2">
    @if ($condition_id=='fee_group')
   	 <b>Fee Group</b>
     @else 
     <b>Class</b>  
     @endif  
   	</div>
   	<div class="col-lg-2"> 
     @if ($condition_id=='fee_group')
      {{ $values[0]->fee_group_name }}
      @else 
      {{ $values[0]->class_name }} 
     @endif 
   	</div>
    <div class="col-lg-3">
      
    </div>

   	<div class="col-lg-2">
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
      		(int)$total+= (int) $value->total_amt_due;
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
    <div class="col-lg-2 pull-right">
   	<h4><span >Total &nbsp;<b>{{ $total }}</b></span> </h4>
   	</div> 
   </div>
   <hr>
   @if (!empty($pagebreak))
     <div class="page-break"></div> 
   @endif
@endforeach 
</body>
</html>