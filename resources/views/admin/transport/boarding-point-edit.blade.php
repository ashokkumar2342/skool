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
        <h4 class="modal-title">Boarding Point Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
                            <form class=" add_form"  button-click="btn_close" content-refresh="boardingPoint_table" action="{{ route('admin.boardingPoint.update',$boardingPoint->id) }}" method="post">              
                            {{ csrf_field() }}                                       
                               <div class="col-lg-6">                                             
                                   <div class="form-group">
                                    <label>Boarding Point Name</label>
                                     {{ Form::text('name',$boardingPoint->name,['class'=>'form-control','id'=>'name', 'placeholder'=>'  Boarding Point Name','maxlength'=>'50' ]) }} 
                                   </div>                                         
                                </div>
                                 
                                <div class="col-lg-6">                                             
                                   <div class="form-group">
                                    <label>Boarding Point Address</label>
                                     {{ Form::text('address',$boardingPoint->address,['class'=>'form-control','id'=>'address', 'placeholder'=>'  Boarding Point Address','maxlength'=>'100' ]) }} 
                                   </div>                                         
                                </div>
                                <div class="col-lg-6">                                             
                                   <div class="form-group">
                                    <label>Single Side Fee Amount</label>
                                     {{ Form::text('single_side_fee_amount',$boardingPoint->single_side_fee_amount,['class'=>'form-control','id'=>'single_side_fee_amount', 'placeholder'=>'  Single Side Fee Amount','maxlength'=>'7','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57' ]) }} 
                                   </div>                                         
                                </div> 
                                <div class="col-lg-6">                                             
                                   <div class="form-group">
                                    <label>Both Side Fee Amount</label>
                                     {{ Form::text('both_side_fee_amount',$boardingPoint->both_side_fee_amount,['class'=>'form-control','id'=>'both_side_fee_amount', 'placeholder'=>'  Both Side Fee Amount','maxlength'=>'7','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57' ]) }} 
                                   </div>                                         
                                </div>
                              
                                 
                                 <div class="col-lg-12 text-center">                                             
                                 <button class="btn btn-success" type="submit" id="btn_fee_account_create">update</button> 
                                </div>                     
                            </form> 
                          </div> 
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
