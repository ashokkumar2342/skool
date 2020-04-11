 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$concessions->id?'Edit' : 'Add' }} Concession</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.concession.post',@$concessions->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="concession_table">
                   {{ csrf_field() }}
                   <div class="form-group">
                                    <label>Concession Name</label>
                                    <span class="fa fa-asterisk"></span>
                                     {{ Form::text('name',@$concessions->name,['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee account name','maxlength'=>'30']) }}
                                     <p class="errorName text-center alert alert-danger hidden"></p>
                                   </div>      
                                  <div class="form-group">
                                    <label>Concession Amount</label>
                                    <span class="fa fa-asterisk"></span>
                                      {{ Form::text('amount',@$concessions->amount,['class'=>'form-control','id'=>'edit_amount','rows'=>1, 'placeholder'=>'Enter Amount','maxlength'=>'5','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                                      <p class="errorDescription text-center alert alert-danger hidden"></p> 
                                  </div>
                                  <div class="form-group">
                                    <label> Percentage</label>
                                     
                                      {{ Form::text('percentage',@$concessions->percentage,['class'=>'form-control','id'=>'edit_percentage','rows'=>1, 'placeholder'=>'Enter percentage','maxlength'=>'3','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                                      <p class="errorDescription text-center alert alert-danger hidden"></p> 
                                  </div>
                   
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div> 
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
