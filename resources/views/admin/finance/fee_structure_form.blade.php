  
 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$feeStructures->id?'Edit' : 'Add' }} Fee Structures</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.feeStructure.post',@$feeStructures->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="fee_structure_table">
                   {{ csrf_field() }}
                   
                   <div class="form-group">
                                {{ Form::label('code','Fee Structure Code',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                 {{ Form::text('code',@$feeStructures->code,['class'=>'form-control','id'=>'edit_code', 'placeholder'=>'Enter fee structure code','maxlength'=>'3']) }}
                                 <p class="errorCode text-center alert alert-danger hidden"></p>
                               </div>       
                               <div class="form-group">
                                {{ Form::label('name','Fee Structure Name',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>                                
                                 {{ Form::text('fee_structure_name',@$feeStructures->name,['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee structure name','maxlength'=>'50']) }}
                                 <p class="errorName text-center alert alert-danger hidden"></p>
                               </div>      
                               <div class="form-group">
                                {{ Form::label('fee_account','Fee Account Name',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                {{ Form::select('fee_account',$feeAccount,@$feeStructures->feeStructures->id,['class'=>'form-control','id'=>'edit_fee_account']) }}
                               </div>  
                                <div class="form-group">
                                {{ Form::label('fine_scheme','Fine Scheme',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                {{ Form::select('fine_scheme',$fineScheme,@$feeStructures->fee_account,['class'=>'form-control','id'=>'edit_fine_scheme']) }}
                               </div> 
                               <div class="form-group">
                                {{ Form::label('is_refundable','Is Refundable',['class'=>' control-label']) }}
                                <span class="fa fa-asterisk"></span>
                                 {{ Form::select('is_refundable',['0'=>'No','1'=>'yes'],@$feeStructures->is_refundable->id,['class'=>'form-control','id'=>'edit_Is_refundable']) }}
                                 <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                               </div>   
                   
                    <div class=" form-group text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div> 
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
