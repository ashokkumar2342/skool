<!-- Modal -->
<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$vehicleTypes->id?'Edit' : 'Add' }} Vehicle Type</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">

                  <form class="add_form" content-refresh="vehicleType_table" button-click="btn_close" action="{{ route('admin.vehicleType.update',@$vehicleTypes->id) }}" method="post">              
                  {{ csrf_field() }}                                       
                     <div class="col-lg-4">                                             
                         <div class="form-group">
                          <label>Vehicle Type</label>
                           {{ Form::text('vehicle_type',@$vehicleTypes->vehicle_type,['class'=>'form-control','id'=>'vehicle_type', 'placeholder'=>'  Vehicle Type']) }}
                          
                         </div>                                         
                      </div>
                       
                      <div class="col-lg-8">                                             
                         <div class="form-group">
                          <label>Description</label>
                           {{ Form::text('description',@$vehicleTypes->description,['class'=>'form-control','id'=>'description','rows'=>4, 'placeholder'=>' Description']) }}
                          
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
