  
  <!-- Main content -->
   
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
        <h4 class="modal-title">{{ @$fineSchemes->id?'Edit' : 'Add' }} Fine Schme</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.fineScheme.post',@$fineSchemes->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="fine_scheme_table">
                   {{ csrf_field() }}
                         <div class="col-lg-6">                                             
                                       <div class="form-group">
                                           {{ Form::label('code','Fine Schme Code',['class'=>' control-label']) }}
                                         {{ Form::text('code',@$fineSchemes->code,['class'=>'form-control','id'=>'edit_code','maxlength'=>'3','placeholder'=>'Enter Code']) }}
                                         <p class="errorCode text-center alert alert-danger hidden"></p>
                                       </div>                                         
                                    </div>
                                     <div class="col-lg-6">                                             
                                       <div class="form-group">
                                           {{ Form::label('name','Fine Schme Name',['class'=>' control-label']) }}                            
                                         {{ Form::text('name',@$fineSchemes->name,['class'=>'form-control','id'=>'edit_name','maxlength'=>'30','placeholder'=>'Enter Name']) }}
                                         <p class="errorName text-center alert alert-danger hidden"></p>
                                       </div>                                         
                                    </div>
                                        <div class="col-lg-6">                                             
                                          <div class="form-group">
                                           {{ Form::label('fine_amount1','Fine Amount 1',['class'=>' control-label']) }}                            
                                            {{ Form::text('fine_amount1',@$fineSchemes->fine_amount1,['class'=>'form-control','id'=>'edit_amount1','maxlength'=>'4','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','placeholder'=>'Enter Fine Amount 1']) }}
                                            <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-6">                                             
                                          <div class="form-group">
                                           {{ Form::label('fine_amount2','Fine Amount 2',['class'=>' control-label']) }}
                                            {{ Form::text('fine_amount2',@$fineSchemes->fine_amount2,['class'=>'form-control','id'=>'edit_amount2','maxlength'=>'4','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','placeholder'=>'Enter Fine Amount 3']) }}
                                            <p class="errorAmount2 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>                        
                                        <div class="col-lg-6">                                             
                                          <div class="form-group">
                                            {{ Form::label('fine_amount3','Fine Amount 3',['class'=>' control-label']) }}
                                            {{ Form::text('fine_amount3',@$fineSchemes->fine_amount3,['class'=>'form-control','id'=>'edit_amount3','maxlength'=>'4','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','placeholder'=>'Enter Fine Amount 3']) }}
                                            <p class="errorAmount3 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-6">                                             
                                          <div class="form-group">
                                           {{ Form::label('day_after1','Day After 1',['class'=>' control-label']) }}
                                            {{ Form::text('day_after1',@$fineSchemes->day_after1,['class'=>'form-control','id'=>'edit_day_after1','maxlength'=>'3','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','placeholder'=>'Enter Day After 1']) }}
                                            <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-6">                                             
                                          <div class="form-group">
                                           {{ Form::label('day_after2','Day After 2',['class'=>' control-label']) }}
                                            {{ Form::text('day_after2',@$fineSchemes->day_after2,['class'=>'form-control','id'=>'edit_day_after2','maxlength'=>'3','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57' ,'placeholder'=>'Enter Day After 2']) }}
                                            <p class="errorAmount2 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-6">                                             
                                          <div class="form-group">
                                           {{ Form::label('fine_period','Fine Period',['class'=>' control-label']) }}
                                            {{ Form::select('fine_period',$finePeriod,@$fineSchemes->finePeriods->id,['class'=>'form-control','id'=>'edit_period']) }}
                                            <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                          </div>                                         
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

 
