<!-- Modal -->
<style type="text/css" media="screen">
    .bd{
        border-bottom: #eee solid 1px;;
    }

</style> 
<div class="modal-dialog" style="width:70%"> 
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Receipt Search</h4>
        </div>
        <div class="modal-body"> 
            <div class="row">
                <div class="col-lg-5">
                    <label>Date</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="col-lg-5">
                    <label>Receipt No.</label>
                    <input type="text" name="receipt_no" id="receipt_no" class="form-control">
                </div> 
                <div class="col-lg-2">
                   <a href="#"  class="btn btn-success" data-table="previos_receipt_data_table" style="margin-top: 24px" onclick="callAjax(this,'{{ route('admin.privious.reciept.show') }}'+'?receipt_no='+$('#receipt_no').val()+'&date='+$('#date').val(),'previous_receipt_list')">Show</a>
                </div> 
            </div>  
         <div id="previous_receipt_list">
             
         </div>
        </div>
    </div> 
</div>

