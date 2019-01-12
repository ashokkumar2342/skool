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
            <form class="form-horizontal add_form" content-refresh="helpers_table" action="{{ route('admin.helper.update',1) }}" method="post">              
                  {{ csrf_field() }}                                       
                     <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Name</label>
                           {{ Form::text('name',$driverHelper->name,['class'=>'form-control','id'=>'name', 'placeholder'=>'Name']) }} 
                         </div>                                         
                      </div>
                       
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Mobile</label>
                           {{ Form::text('mobile',$driverHelper->mobile,['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>' Mobile']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Contact No</label>
                           {{ Form::text('contact_no',$driverHelper->contact_no,['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No']) }} 
                         </div>                                         
                      </div>
                       
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>License Number</label>
                           {{ Form::text('license_number',$driverHelper->license_number,['class'=>'form-control','id'=>'licensenumber','rows'=>4, 'placeholder'=>' License Number']) }} 
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Permanent Address</label>
                           {{ Form::text('address',$driverHelper->address,['class'=>'form-control','id'=>'address','rows'=>4, 'placeholder'=>'Permanent Address']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Correspondence Address</label>
                           {{ Form::text('p_address',$driverHelper->p_address,['class'=>'form-control','id'=>'p_address','rows'=>4, 'placeholder'=>' Correspondence Address']) }} 
                         </div>                                         
                      </div><div class="col-lg-3">                                             
                         <div class="form-group">
                              <label>Date of Birth</label>
                           {{ Form::date('dob',$driverHelper->dob,['class'=>'form-control','id'=>'dob','rows'=>4, 'placeholder'=>' Date of Birth']) }} 
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Select Vehicle</label>
                              {!! Form::select('vehicle_id',$vehicles,$driverHelper->vehicle_id , ['class'=>'form-control','placeholder'=>'Select Vehicle','required']) !!}
                         </div>                                         
                      </div>
                       
                       <div class="col-lg-12 text-center">                                             
                       <button class="btn btn-success" type="submit" id="btn_fee_account_create">Update</button> 
                      </div>                     
                  </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>