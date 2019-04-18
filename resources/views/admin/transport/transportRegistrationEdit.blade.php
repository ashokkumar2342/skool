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
        <h4 class="modal-title">Transport Registration Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          <form class=" add_form" content-refresh="transport_table" button-click="btn_close" action="{{ route('admin.transportRegistration.edit',$transportregistration->id) }}" method="get">              
          {{ csrf_field() }}                                       
             <div class="col-lg-4">                                             
                 <div class="form-group">
                      <label>Name</label>
                       {{ Form::text('registration_no',$transportregistration->students->name,['class'=>'form-control','id'=>'registration_no', 'placeholder'=>'  Registration No']) }}
                      
                     </div>                                         
                  </div>
                   <div class="col-lg-4">                                             
                     <div class="form-group">
                       <label>Morning Rroute </label>
                       {{ Form::text('chassis_no',$transportregistration->morningRoutes->name,['class'=>'form-control','id'=>'chassis_no','rows'=>4, 'placeholder'=>'  Chassis No']) }}
                  
                     </div>                                         
                  </div> 
                  <div class="col-lg-4">                                             
                     <div class="form-group">
                       <label>Evening Rroute</label>
                       {{ Form::text('model_no',$transportregistration->eveningRoutes->name,['class'=>'form-control','id'=>'model_no','rows'=>4, 'placeholder'=>' Model No']) }}
                  
                     </div>                                         
                  </div> 
                  <div class="col-lg-4">                                             
                     <div class="form-group">
                       <label>Morning Boarding Point</label>
                       {{ Form::text('engine_no',$transportregistration->morningBoardingPoints->name,['class'=>'form-control','id'=>'engine_no','rows'=>4, 'placeholder'=>' Engine No']) }}
                     
                     </div>                                         
                  </div> 
                  <div class="col-lg-4">                                             
                     <div class="form-group">
                       <label>Evening Boarding Point</label>
                       {{ Form::text('siting_capacity',$transportregistration->eveningBoardingPoints->name,['class'=>'form-control','id'=>'siting_capacity','rows'=>4, 'placeholder'=>'Siting Capacity']) }} 
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
 