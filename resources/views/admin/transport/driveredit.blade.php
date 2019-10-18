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
        <form class=" add_form" content-refresh="driver_table" button-click="btn_close" action="{{ route('admin.driver.update',$driver->id) }}" method="post">              
          {{ csrf_field() }} 
           <div class="col-lg-4">                                             
                 <div class="form-group">
                  <label>Name</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('name',$driver->name,['class'=>'form-control','id'=>'name', 'placeholder'=>'  Name','maxlength'=>'50']) }}
                   <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>  
              <div class="col-lg-4">                                             
                 <div class="form-group">
                  <label>Mobile Number</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('mobile',$driver->mobile,['class'=>'form-control','id'=>'mobile','rows'=>4, 'placeholder'=>' Mobile','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div>
              <div class="col-lg-4">                                             
                 <div class="form-group">
                  <label>Contact Number</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('contact_no',$driver->contact_no,['class'=>'form-control','id'=>'contact_no','rows'=>4, 'placeholder'=>' Contact No','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div>  
              <div class="col-lg-4">                                             
                 <div class="form-group">
                  <label>License Number</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('license_number',$driver->license_number,['class'=>'form-control','id'=>'licensenumber','rows'=>4, 'placeholder'=>' License Number','maxlength'=>'20']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div> 
              <div class="col-lg-4">                                             
                 <div class="form-group">
                  <label>Date of Birth</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::date('dob',$driver->dob,['class'=>'form-control','id'=>'dob','rows'=>4, 'placeholder'=>' Date of Birth']) }}
                    <p class="errorCode text-center alert alert-danger hidden"></p> 
                 </div>                                         
              </div>
               <div class="col-lg-4">                                             
                 <div class="form-group">
                  <label>Select Vehicle</label>
                  <span class="fa fa-asterisk"></span>
                      {!! Form::select('vehicle_id',$vehicles,$driver->vehicle_id , ['class'=>'form-control','placeholder'=>'Select Vehicle','required']) !!}
                       <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="col-lg-5">                                             
                 <div class="form-group">
                  <label>Permanent Address</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('address',$driver->address,['class'=>'form-control','id'=>'address','rows'=>4, 'placeholder'=>'Permanent Address','maxlength'=>'200']) }} 
                    <p class="errorCode text-center alert alert-danger hidden"></p>
                 </div>                                         
              </div>
              <div class="form-group col-lg-1">
                         <input type="checkbox" id="addressCheck" name="addressCheck" style="margin-top: 30px">
                         <label>Same As</label> 
                       </div>
              <div class="col-lg-6">                                             
                 <div class="form-group">
                  <label>Correspondence Address</label>
                  <span class="fa fa-asterisk"></span>
                   {{ Form::text('p_address',$driver->address,['class'=>'form-control','id'=>'p_address','rows'=>4, 'placeholder'=>' Correspondence Address','maxlength'=>'200']) }} 
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
          @push('scripts')
  
    <script>
       
       function setAddress(){
       if ($("#addressCheck").is(":checked")) {
         $('#p_address').val($('#address').val());
         
         $('#p_address').attr('readonly', '');
         
       } else {
         $('#p_address').removeAttr('disabled');
         
       }
     }

     $('#addressCheck').click(function(){
       setAddress();
     })
    </script>
    
                                 