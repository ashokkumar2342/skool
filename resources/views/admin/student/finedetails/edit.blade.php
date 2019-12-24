<div class="modal-dialog" style="width:40%"> 
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body"> 
            <form action="{{ route('admin.student.fine.details.update',$studentFineDetail->id) }}" method="post" class="add_form" button-click="btn_close,btn_student_fine_details_show">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label>Fine Name</label>
                        <input type="text" name="fine_name" class="form-control" maxlength="100" placeholder="Enter Fine Name" value="{{ $studentFineDetail->fine_name }}"> 
                    </div>
                    <div class="col-lg-12 form-group">
                        <label>Fine Amount</label>
                        <input type="text" name="fine_amount" class="form-control" placeholder="Enter Fine Amount" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $studentFineDetail->fine_amount }}"> 
                    </div>
                    <div class="col-lg-12 text-center"> 
                        <input type="submit" class="btn btn-success text-center" value="Update" style="margin: 24px">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




