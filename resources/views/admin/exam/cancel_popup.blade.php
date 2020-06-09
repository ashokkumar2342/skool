<div class="modal-dialog"> 
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
        </div>
        <div class="modal-body">
            <div class="row form-group"> 
                <div class="col-md-12 form-group">
                <form action="{{ route('admin.mark.detail.cancel.test.filter.store') }}" method="post" class="add_form" button-click="btn_close,btn_class_test_show">
                {{ csrf_field() }}
                <input type="hidden" name="classTest_id" value="{{ $classTest_id }}"> 
                <div class="col-lg-12 form-group">
                    <label>Select Option</label>
                    <select name="option" class="form-control" onchange="callAjax(this,'{{ route('admin.mark.detail.cancel.test.filter') }}','option_div')">
                        <option selected disabled>Select Option</option> 
                        <option value="1">Reject Test</option> 
                        <option value="2">Pospond Test</option> 
                    </select> 
                 </div> 
                    <div id="option_div">
                         
                     </div>
                </form> 
                </div>
            </div> 
        </div>
    </div>
</div> 

