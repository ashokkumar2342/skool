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
        <h4 class="modal-title">{{ @$vehicle->id?'Edit' : 'Add' }} Vehicle</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">

                  <form class="add_form" content-refresh="vehicle_table" button-click="btn_close" action="{{ route('admin.vehicle.update',@$vehicle->id) }}" no-reset="true" method="post">              
                  {{ csrf_field() }}                                       
                     <div class="col-lg-3">                                             
                         <div class="form-group">
                          <label>Registration No.</label>
                          <span class="fa fa-asterisk"></span>
                           {{ Form::text('registration_no',@$vehicle->registration_no,['class'=>'form-control','id'=>'registration_no','maxlength'=>'20', 'placeholder'=>'Enter Registration No.']) }}
                          
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Chassis No. </label>
                           <span class="fa fa-asterisk"></span>
                           {{ Form::text('chassis_no',@$vehicle->chassis_no,['class'=>'form-control','id'=>'chassis_no','rows'=>4,'maxlength'=>'20', 'placeholder'=>'Enter Chassis No.']) }}
              
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Model No.</label>
                           <span class="fa fa-asterisk"></span>
                           {{ Form::text('model_no',@$vehicle->model_no,['class'=>'form-control','id'=>'model_no','rows'=>4,'maxlength'=>'20', 'placeholder'=>'Enter Model No.']) }}
                  
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Engine No.</label>
                           <span class="fa fa-asterisk"></span>
                           {{ Form::text('engine_no',@$vehicle->engine_no,['class'=>'form-control','id'=>'engine_no','rows'=>4,'maxlength'=>'20', 'placeholder'=>'Enter Engine No.']) }}
                         
                         </div>                                         
                      </div> 
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Siting Capacity</label>
                           <span class="fa fa-asterisk"></span>
                           {{ Form::text('siting_capacity',@$vehicle->siting_capacity,['class'=>'form-control','id'=>'siting_capacity','rows'=>4,'maxlength'=>'3','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57', 'placeholder'=>'Enter Siting Capacity']) }}
                          
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Average</label>
                           <span class="fa fa-asterisk"></span>
                           {{ Form::text('average',@$vehicle->average,['class'=>'form-control','id'=>'average','rows'=>4, 'placeholder'=>' Average','maxlength'=>'3','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','required']) }}
                            
                         </div>                                         
                      </div>
                        <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Select Transport</label>
                           <span class="fa fa-asterisk"></span>
                          {!! Form::select('transport_id',$transports, @$vehicle->transport_id, ['class'=>'form-control','placeholder'=>'Select Transport','required']) !!}
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                           <label>Select Vehicle Type</label>
                           <span class="fa fa-asterisk"></span>
                            {!! Form::select('vehicle_type_id',$vehicleTypes, @$vehicle->vehicle_type_id, ['class'=>'form-control','placeholder'=>'Select Vehicle Type','required']) !!}
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
    <!-- /.box -->
 