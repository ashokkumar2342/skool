 
	<style type="text/css">
   body {
   
   
   
    color: black;
   
}
     </style> 
<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
  	<table class="table table-bordered table-striped table-hover"> 
	<thead>
		<tr>
			  
			<th>Fee Structures</th>
			<th>Amount</th>
			 
		</tr>
	</thead>
	<tbody>
		@foreach ($feeStructurs as $feeStructur)
		   @php
		    	$feeStructureAmounts=App\Model\FeeStructureAmount::where('academic_year_id',$academic_year_id)->where('fee_structure_id',$feeStructur->id)->get();

		    @endphp 
			<tr> 
				<td>{{ $feeStructur->name}}</td> 
				<td><input type="number" name="amount[{{ $feeStructur->id }}]" value="{{ $feeStructureAmounts->first()->amount or '' }}"></td> 
			</tr>
		@endforeach
	</tbody>
</table>
<div class="col-lg-12 text-center">
	<button type="submit" class="btn btn-success">Submit</button>
	
</div>
  </div>
</div>

