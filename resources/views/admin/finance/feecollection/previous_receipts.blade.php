<div class="modal-dialog" style="width:50%"> 
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>

			<h4 class="modal-title">Previous Receipt List</h4>
		</div>
		<a href="#" success-popup="true" onclick="printDiv()" class="btn btn-info btn-sm" title="" style="margin: 20px;width: 80px">Print</a>
		<a href="#" success-popup="true" button-click="btn_previous_receipts" onclick="callAjax(this,'{{ route('admin.studentFeeCollection.previous.receipts.remove') }}')" class="btn btn-danger btn-sm pull-right" title="" style="margin: 20px">Clear All Data</a>
		<div class="modal-body">
		<div id="previous_receipts_print" style="width: 100%" align="center"> 
			<table class="table" width="100%">
				<thead>
					<tr>
						<th>Receipt No.</th>
						<th>Description</th>
						<th >Receipt Amount</th> 
					</tr>
				</thead>
				<tbody>
					@foreach ($UserReceipts as $UserReceipt)
								<tr>
									<td>{{ $UserReceipt->receipt_no }}</td>
									<td>{{ $UserReceipt->description }}</td>
									<td align="right" class="text-nowrap">{{ $UserReceipt->r_amount }}</td> 
								</tr> 
					@endforeach
				</tbody>
			</table>
		</div>
			<div class="row" style="margin-top: 30px">
			 <div class="col-lg-5 pull-right">
				<h4><span >Total &nbsp;<b>{{ number_format($UserReceipts->sum('r_amount'),2 )}}</b></span> </h4>
				</div> 
			</div>
		</div>
	</div>


	<script>
function printDiv() { 
            var divContents = document.getElementById("previous_receipts_print").innerHTML; 
            var printWindow = window.open('', '', 'height=1600, width=1600'); 
              printWindow.document.write(divContents); 
              printWindow.document.close();
              printWindow.print();
               printWindow.close();
        } 
    </script>
	</script>


