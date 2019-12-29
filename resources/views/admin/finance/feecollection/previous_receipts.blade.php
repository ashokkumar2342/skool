<div class="modal-dialog" style="width:50%"> 
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>

			<h4 class="modal-title">Previous Receipt List</h4>
		</div>
		<a href="#" success-popup="true" onclick="printDiv()" class="btn btn-info btn-sm" title="" style="margin: 20px;width: 80px">Print</a>
		<a href="#" success-popup="true" button-click="btn_previous_receipts" onclick="callAjax(this,'{{ route('admin.studentFeeCollection.previous.receipts.remove') }}')" class="btn btn-danger btn-sm pull-right" title="" style="margin: 20px">Clear All Data</a>
		<div class="modal-body">
		<div id="previous_receipts_print" style="width: 100%" > 
			<table class="table" width="100%">
				<thead>
					<tr>
						<th align="left">Receipt No.</th>
						<th align="left">Description</th>
						<th align="left">Amount</th> 
					</tr>
				</thead>
				<tbody>
					@foreach ($UserReceipts as $UserReceipt)
								<tr>
									<td align="left">{{ $UserReceipt->receipt_no }}</td>
									<td align="left">{{ $UserReceipt->description }}</td>
									<td align="left" class="text-nowrap">{{ $UserReceipt->r_amount }}</td> 
								</tr> 
					@endforeach
					<tr>
						 
						 <td align="left"></td>
						 <td align="right">Total</td>
						<td align="left" style="padding-right: 95px">
							<span ><b>{{ number_format($UserReceipts->sum('r_amount'),2 )}}</b></span> 
						</td>
					</tr>
				</tbody>
			</table>
			 
		</div>
			
		</div>
	</div>


	<script>
function printDiv() { 
            var divContents = document.getElementById("previous_receipts_print").innerHTML; 
            var printWindow = window.open('', '', 'height=1000, width=800'); 
              printWindow.document.write(divContents); 
              printWindow.document.close();
              printWindow.print();
               printWindow.close();
        } 
    </script>
	</script>


