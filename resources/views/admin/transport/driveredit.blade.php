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
        <h4 class="modal-title">Driver Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <form class=" add_form" content-refresh="transport_table" button-click="btn_close" action="{{ route('admin.driver.update',$driver->id) }}" method="post">              
          {{ csrf_field() }} 
           <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Name</label>
                   {{ Form::text('name',$driver->name,['class'=>'form-control','id'=>'name', 'placeholder'=>'  Name']) }}
                   <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>  
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Mobile</label>
                   {{ Form::text('mobile',$driver->mobile,['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>' Mobile']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div>
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Contact No</label>
                   {{ Form::text('contact_no',$driver->contact_no,['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div>  
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>License Number</label>
                   {{ Form::text('license_number',$driver->license_number,['class'=>'form-control','id'=>'licensenumber','rows'=>4, 'placeholder'=>' License Number']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div> 
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Permanent Address</label>
                   {{ Form::text('address',$driver->address,['class'=>'form-control','id'=>'address','rows'=>4, 'placeholder'=>'Permanent Address']) }} 
                    <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Correspondence Address</label>
                   {{ Form::text('p_address',$driver->address,['class'=>'form-control','id'=>'p_address','rows'=>4, 'placeholder'=>' Correspondence Address']) }} 
                    <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div><div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Date of Birth</label>
                   {{ Form::date('dob',$driver->dob,['class'=>'form-control','id'=>'dob','rows'=>4, 'placeholder'=>' Date of Birth']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div>
               <div class="col-lg-3">                                             
                 <div class="form-group">
                  <label>Select Vehicle</label>
                      {!! Form::select('vehicle_id',$vehicles,$driver->vehicle_id , ['class'=>'form-control','placeholder'=>'Select Vehicle','required']) !!}
                       <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
                       
               <div class="col-lg-12 text-center">                                             
               <button class="btn btn-success" type="submit">Update</button> 
              </div>                     
                  </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div> 
          </div>                                     