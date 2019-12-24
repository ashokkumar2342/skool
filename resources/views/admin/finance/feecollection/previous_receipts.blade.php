<div class="modal-dialog" style="width:50%"> 
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Previous Receipt List</h4>
		</div>
		<div class="modal-body"> 
			<table class="table" id="previews_receipt_datatable">
				<thead>
					<tr>
						<th>Receipt No.</th>
						<th>Description</th>
						<th style="width:11%" class="text-nowrap">Receipt Amount</th> 
						<th style="width:22%" class="text-nowrap">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($UserReceipts as $UserReceipt)
								<tr>
									<td>{{ $UserReceipt->receipt_no }}</td>
									<td>{{ $UserReceipt->description }}</td>
									<td align="right" class="text-nowrap">{{ $UserReceipt->r_amount }}</td>
									 
									<td>
										<a href="#" success-popup="true" button-click="btn_previous_receipts" onclick="callAjax(this,'{{ route('admin.studentFeeCollection.previous.receipts.cancel',$UserReceipt->id) }}')" class="btn btn-danger btn-xs" title="">Receipt Cancel</a>
									</td>
									 
								</tr> 
					@endforeach
				</tbody>
			</table>
			<div class="row" style="margin-top: 30px">
			 <div class="col-lg-5 pull-right">
				<h4><span >Total &nbsp;<b>{{ number_format($UserReceipts->sum('r_amount'),2 )}}</b></span> </h4>
				</div> 
			</div>
		</div>
	</div>

	<!-- /.content -->


