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
        <h4 class="modal-title">Transport Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          <form class=" add_form" content-refresh="transport_table" button-click="btn_close" action="{{ route('admin.transport.update',$transport->id) }}" method="post">              
          {{ csrf_field() }}                                       
             <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>Name</label>
                   {{ Form::text('name',$transport->name,['class'=>'form-control','id'=>'name', 'placeholder'=>'  Name']) }}
                   <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
               <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>mobile Number</label>
                   {{ Form::text('mobile',$transport->mobile,['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>'  mobile']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>Contact Number</label>
                   {{ Form::text('contact_no',$transport->contact_no,['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>Email</label>
                   {{ Form::text('email',$transport->email,['class'=>'form-control','id'=>'email','rows'=>4, 'placeholder'=>' Email']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>GST No</label>
                   {{ Form::text('gst_no',$transport->gst_no,['class'=>'form-control','id'=>'gst_no','rows'=>4, 'placeholder'=>' GST No']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>IFSC Code</label>
                   {{ Form::text('ifsc_code',$transport->ifsc_code,['class'=>'form-control','id'=>'ifsc_code','rows'=>4, 'placeholder'=>' IFSC Code']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-2">                                             
                 <div class="form-group">
                   <label>Account Number</label>
                   {{ Form::text('account_no',$transport->account_no,['class'=>'form-control','id'=>'account_no','rows'=>4, 'placeholder'=>' Account No']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div> 
              <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>Branch Code</label>
                   {{ Form::text('branch_code',$transport->branch_code,['class'=>'form-control','id'=>'branch_code','rows'=>4, 'placeholder'=>' Branch Code']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-2">                                             
                 <div class="form-group">
                   <label>Branch Name</label>
                   {{ Form::text('branch_name',$transport->name,['class'=>'form-control','id'=>'branch_name','rows'=>4, 'placeholder'=>' Branch Name']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-4">                                             
                 <div class="form-group">
                   <label>Account Holder Name</label>
                   {{ Form::text('account_holder_name',$transport->account_holder_name,['class'=>'form-control','id'=>'account_holder_name','rows'=>4, 'placeholder'=>' Account holder Name']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-2">                                             
                 <div class="form-group">
                  <label>Pincode</label>
                   {{ Form::text('pincode',$transport->pincode,['class'=>'form-control','id'=>'pincode','rows'=>4, 'placeholder'=>' Pincode']) }}
                   <p class="errorName text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>                     
              <div class="col-lg-6">                         
                  <div class="form-group">
                    <label>Permanent Address</label>
                    {{ Form::textarea('address',$transport->address,['class'=>'form-control','id'=>'address','rows'=>1, 'placeholder'=>'Permanent Address']) }}
                    <p class="errorDescription text-center alert alert-danger hidden"></p>
                  </div>
              </div>
              <div class="col-lg-6">                         
                  <div class="form-group">
                     <label>Correspondence Address</label>
                    {{ Form::textarea('address',$transport->address,['class'=>'form-control','id'=>'address','rows'=>1, 'placeholder'=>'Correspondence Address']) }}
                    <p class="errorDescription text-center alert alert-danger hidden"></p>
                  </div>
              </div>
               <div class="col-lg-12 text-center">                                             
               <button class="btn btn-success" type="submit" id="btn_fee_account_create">Update</button> 
              </div>                     
          </form> 
        </div>
       </div>  
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
 