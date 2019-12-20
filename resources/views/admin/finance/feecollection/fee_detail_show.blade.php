 
@php
	$paid=0;
	$concession_amount=0;
	$net_amount =0;
@endphp
<form  method="post" id="fee_collection_submit_form" accept-charset="utf-8">

<div class="panel panel-default" style="margin-top: 20px">
  <div class="panel-heading">Fee Details</div>
  <div class="panel-body">
 	<div class="row">
 		<div class="col-lg-6">
 			<table class="table border table-striped table-bordered"> 
		  		<thead>
		  			<tr>
		  				<th>Fee Name</th>
		  				<th>Amount</th> 
		  			</tr>
		  		</thead>
		  		<tbody>
		  			 <input type="checkbox" checked name="student_id[]" value="{{ $student->id }}" style="display: none">  
		  			   
		  			  
		  			@foreach ($FeeDetails as $FeeDetail) 
		  			 
		  				<tr>  
		  				    <td style="width: 250px">
		  					{{ $FeeDetail->name}}  
		  					 </td>  
					     	<td> 
					 		{{ $FeeDetail->fee_amt}}   
					 		</td> 
		  				</tr> 
		  				 @php
		  				 	$net_amount += $FeeDetail->fee_amt;
		  				 	if($FeeDetail->name=='Concession'){
		  				 		$concession_amount=$FeeDetail->fee_amt;
		  				 	}
		  				 @endphp
		  			@endforeach
		  			<tr>
		  				<td>Net Amount</td>
		  				<td>{{ $net_amount - $concession_amount }}  </td>
		  			</tr>
		  		</tbody>
		  	</table>
		  	<input type="hidden" name="net_amount" id="net_amount" value="{{ $net_amount - $concession_amount }}">
 		</div>
 		<div class="col-lg-6"> 
 			<input type="checkbox" class="checked_all" name="sibling" id="siblig_chk" onclick="showHide()">
			 Sibling Details
			 <div id="siblig_div" style="display: none;">
		 		<table class="table border table-striped table-bordered"> 
		 	 		<thead>
		 	 			<tr>
		 	 				<th>#</th>
		 	 				<th>S.No</th>
		 	 				 
		 	 				<th>Class</th> 
		 	 				<th>Registration No</th>
		 	 				<th>Amount</th> 
		 	 			</tr>
		 	 		</thead>
		 	 		<tbody>
		 	 			@php
		 	 			$sr=1; 
		 	 			$sib =0;
		 	 			@endphp
		 	 			
		 	 			@foreach ($siblings as $sibling)  
		 	 			@if ($sibling->registration_no!=null)
		 	 				<tr> 
		 	 				<td><input type="checkbox"  class="checkbox" name="student_id[]" value="{{ $sibling->id }}"  > </td>
		 	 				<td> {{ $sr++ }} </td>
		 	 				<td> {{ $sibling->name }} </td>
		 	 				<td>{{ $sibling->registration_no }}</td>
		 	 				<td>{{ $sibling->total_dues}}</td>
		 	 				 
		 	 				
		 	 			</tr> 
		 	 			@endif
		 	 			
		 	 			@endforeach
		 	 		</tbody>
		 	 	</table>
		 	 	{{-- <h4>Grand Total : {{ $net_amount + $sib }}</h4> --}}
			 </div> 
 		</div> 
 		<div class="col-md-12">
 			<table class="table table-striped" style="font-size: 100%;margin-bottom:0px;">
 			
 			   <tr id="id1" class="tr_clone">
 			       <td style="width: 200px;">
 			         <label class="control-label mb-2 text-left">Payment Mode <span style="color:red;">*</span></label> 
 			           <select name="payment_mode" class="form-control" id="payment_mode">
		  						@foreach ($paymentModes as $mode)
		  							<option value="{{ $mode->name }}">{{ $mode->name }}</option> 
		  						@endforeach 
		  					</select>  
 			       </td>
 			       <td style="width: 200px;">
 			         <label class="control-label mb-2 text-left">Amount <span style="color:red;">*</span></label> 
 			           <input type="text"  name="amount[]" onkeyup="feeSum()" value="{{ $net_amount }}" class="form-control fee_sum">    
 			       </td style="width: 250px;">
 			       <td><label class="control-label mb-2 text-left">Transaction / Cheque No <span style="color:red;">*</span></label> 
 			       	<input type="text"  name="cheeque_no[]" class="form-control"></td>
 			       <td><label class="control-label mb-2 text-left">Bank Name <span style="color:red;">*</span></label> 
 			           <input type="text"  name="bank_name[]" class="form-control"></td>
 			       <td><label class="control-label mb-2 text-left">Remarks <span style="color:red;">*</span></label> 
 			           <textarea type="text" name="remarks[]" class="form-control"></textarea></td>
 			       <td> <br><br> 
 			        <img src="{!! asset('img/details_open.png') !!}" class="tr_clone_add">   
 			        <img src="{!! asset('img/details_close.png') !!}" onclick="cloneRemove(this)">   
 			    </td> 
 			   </tr>
 			   <tr>
 			   	<td>Amount Deposit</td>
 			   	<td>		   		
 			   		<input type="text" id="amount_deposit" readonly  name="amount_deposit"  class="form-control">
 			   	</td>
 			   	<td></td>
 			   	<td></td>
 			   	<td></td>
 			   	<td></td>
 			   </tr>
 			   <tr>
 			   	<td>Balance</td>
 			   	<td>		   		
 			   		<input type="text" id="fee_balance" readonly  name="fee_balance" value="0"  class="form-control">
 			   	</td>
 			   	<td></td>
 			   	<td></td>
 			   	<td></td>
 			   	<td></td>
 			   </tr>
 			</table>
 		</div>
  </div>
  <div class="panel-footer text-center">
  	 @if ($paid==0)
  	 	 <button type="button" id="feeCollectionSubmit_btn" class="btn btn-success" onclick="feeCollectionSubmit()">Submit</button>    
   	    <input type="checkbox" name="print" checked autocomplete="off" style="margin-left: 20px"> Print 
   	  @else
   	   <button type="button" disabled="" class="btn btn-success">Paid</button>
  	 @endif 
  </div>
</div>
 	 
</form>
 
 <script>
 feeSum();
 function feeSum() { 
 	var fee_sum = parseFloat(0);
    $(".fee_sum").each(function(){
        fee_sum += +$(this).val();
    });    
    var net_amount = parseFloat($('#net_amount').val())
   var amount_deposit= parseFloat($("#amount_deposit").val(fee_sum));
   var fee_balance= parseFloat($("#fee_balance").val(net_amount - fee_sum));        
           
 }
 // function addRow(){
 var regex = /^(.*)(\d)+$/i;
 var cindex = 1;

 $(".tr_clone_add").on('click', function() {
 	if (cindex <=1) {
 		var $tr    = $(this).closest('.tr_clone');
 		var $clone = $tr.clone(true);
 		cindex++;
 		$clone.find(':text').val('');
 		$clone.attr('id', 'id'+(cindex) ); //update row id if required
 		//update ids of elements in row
 		$clone.find("*").each(function() {
 		        var id = this.id || "";
 		        var match = id.match(regex) || [];
 		        if (match.length == 3) {
 		            this.id = match[1] + (cindex);
 		        }
 		});
 		$tr.after($clone); 
 	}
 	 
    
 });
 function cloneRemove(obj){
   var numTrclone = $('.tr_clone').length;
   cindex--;
   if(numTrclone>1){ 
   $(obj).parents(".tr_clone").remove();
   }
 }

 </script>