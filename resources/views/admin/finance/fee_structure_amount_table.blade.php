 
	<style type="text/css">
   body {
   
   
   
    color: black;
   
}
     </style> 
<div class="panel panel-default">
  <div class="panel-heading text-right">
  	<a href="{{ route('admin.feeStructureAmount.pdf.report',$academic_year_id) }}" class="pull-right btn btn-primary btn-sm" target="blank">PDF Report</button>
  	<a href="#" onclick="callPopupLarge(this,'{{ route('admin.feeStructureAmount.clone','feestrutureAmount_clone') }}')" style="margin-right: 5px" class="btn btn-warning btn-sm" title="">Clone</a></div>
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
				<td><input type="text" class="text-right" style="width: 100px" name="amount[{{ $feeStructur->id }}]" value="{{ $feeStructureAmounts->first()->amount or '' }}" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td> 
			</tr>
		@endforeach
	</tbody>
</table>
<div class="col-lg-12 text-center">
	<button type="submit" class="btn btn-success">Submit</button>
	
</div>
  </div>
</div>

