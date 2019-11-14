 
<div class="modal-content" >
  <div class="modal-header">
    <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><b>{{ @$paymentMode->id? 'Edit' : 'Add' }} </b>&nbsp;<i class="small text-muted"></i></h4> 
  </div>
  <div class="modal-body">
     <form id="act_add" method="post" content-refresh="table_payment_mode" action="{{ route('admin.paymentMode.update',Crypt::encrypt(@$paymentMode->id)) }}" class="add_form" no-reset="true" button-click="btn_close">
     {{ csrf_field() }}
    <div class="row" style="padding-bottom: 30px;">
       
       <div class="col-lg-12">                           
            <div class="form-group">
             {{ Form::label('name','Payment Mode',['class'=>' control-label']) }}
              {{ Form::text('name',@$paymentMode->name ,['class'=>'form-control','placeholder'=>'Enter Payment Mode Name','maxlength'=>'50']) }}
              <p class="errorAmount1 text-center alert alert-danger hidden"></p>
            </div>    
       </div>
       <div class="col-lg-12">                           
            <div class="form-group">
             {{ Form::label('code','Code',['class'=>' control-label']) }}
              {{ Form::text('code',@$paymentMode->code ,['class'=>'form-control','placeholder'=>'Enter Payment Mode Name','maxlength'=>'2']) }}
              <p class="errorAmount1 text-center alert alert-danger hidden"></p>
            </div>    
       </div>
       <div class="col-lg-12">                           
       <div class="form-group">
        {{ Form::label('sorting_order_id','Sorting Order No',['class'=>' control-label']) }}
         {{ Form::text('sorting_order_id',@$paymentMode->sorting_order_id,['class'=>'form-control','placeholder'=>'Enter Sorting Order No','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
         <p class="errorAmount1 text-center alert alert-danger hidden"></p>
       </div>    
  </div>
       <div class="col-lg-12">
         <div class="text-center"><br>
             <input type="submit" class="btn btn-success btn-sm" name="submit" id="btn-update">
              
           </div>
       </div>
      </div> 
     
     
     </form>
                 
    </div>
  </div>
