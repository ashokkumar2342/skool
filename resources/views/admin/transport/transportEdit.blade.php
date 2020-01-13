<!-- Modal -->
<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$transport->id?'Edit' : 'Add' }} Transport</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          <form class=" add_form" content-refresh="transport_table" button-click="btn_close" action="{{ route('admin.transport.update',@$transport->id) }}" method="post">              
          {{ csrf_field() }}                                       
             <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Name</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('name',@$transport->name,['class'=>'form-control','id'=>'name', 'placeholder'=>'  Name']) }}
                   <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
               <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>mobile Number</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('mobile',@$transport->mobile,['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>'  mobile','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Contact Number</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('contact_no',@$transport->contact_no,['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Email</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('email',@$transport->email,['class'=>'form-control','id'=>'email','rows'=>4, 'placeholder'=>' Email']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>GST No</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('gst_no',@$transport->gst_no,['class'=>'form-control','id'=>'gst_no','rows'=>4, 'placeholder'=>' GST No']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>IFSC Code</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('ifsc_code',@$transport->ifsc_code,['class'=>'form-control','id'=>'ifsc_code','rows'=>4, 'placeholder'=>' IFSC Code']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-3">                                             
                 <div class="form-group">
                   <label>Account Number</label>
                   <span class="fa fa-asterisk"></span>
                   {{ Form::text('account_no',@$transport->account_no,['class'=>'form-control','id'=>'account_no','rows'=>4, 'placeholder'=>' Account No']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Branch Code</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('branch_code',@$transport->branch_code,['class'=>'form-control','id'=>'branch_code','rows'=>4, 'placeholder'=>' Branch Code']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-6">                                             
                 <div class="form-group">
                   <label>Branch Name</label>
                   <span class="fa fa-asterisk"></span>
                   {{ Form::text('branch_name',@$transport->name,['class'=>'form-control','id'=>'branch_name','rows'=>4, 'placeholder'=>' Branch Name']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-6">                                             
                 <div class="form-group">
                   <label>Account Holder Name</label>
                   <span class="fa fa-asterisk"></span>
                   {{ Form::text('account_holder_name',@$transport->account_holder_name,['class'=>'form-control','id'=>'account_holder_name','rows'=>4, 'placeholder'=>' Account holder Name']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>               
              <div class="col-lg-5">                         
                  <div class="form-group">
                    <label>Permanent Address</label>
                    <span class="fa fa-asterisk"></span>
                    {{ Form::textarea('address',@$transport->address,['class'=>'form-control','id'=>'Permanent_address','rows'=>1, 'placeholder'=>'Permanent Address']) }}
                    <p class="errorDescription text-center alert alert-danger hidden"></p>
                  </div>
              </div>
              <div class="form-group col-lg-1">
                         <input type="checkbox" id="addressCheck" name="addressCheck" style="margin-top: 30px">
                         <label>Same As</label> 
                       </div>
              <div class="col-lg-5">                         
                  <div class="form-group">
                     <label>Correspondence Address</label>

                    {{ Form::textarea('address',@$transport->address,['class'=>'form-control','id'=>'Correspondence_address','rows'=>1, 'placeholder'=>'Correspondence Address']) }}
                    <p class="errorDescription text-center alert alert-danger hidden"></p>
                  </div>
              </div>
              <div class="col-lg-1">                                             
                 <div class="form-group">
                  <label>Pincode</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('pincode',@$transport->pincode,['class'=>'form-control','id'=>'pincode','rows'=>4, 'placeholder'=>' Pincode']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
               <div class="col-lg-12 text-center">                                             
               <button class="btn btn-success" type="submit" id="btn_fee_account_create">Submit</button> 
              </div>                     
          </form> 
        </div>
       </div>  
      </div>
      <!-- /.box-body -->
    </div>
@push('scripts')    <!-- /.box -->
 <script>
     function setAddress(){
       if ($("#addressCheck").is(":checked")) {
         $('#Correspondence_address').val($('#Permanent_address').val());
         $('#c_pincode').val($('#p_pincode').val());
         $('#Correspondence_address').attr('readonly', '');
         $('#c_pincode').attr('readonly', '');
       } else {
         $('#Correspondence_address').removeAttr('disabled');
         $('#c_pincode').removeAttr('disabled');
       }
     }

     $('#addressCheck').click(function(){
       setAddress();
     })
   </script>
   @endpush