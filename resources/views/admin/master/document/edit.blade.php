 
<div class="modal-content" >
  <div class="modal-header">
    <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><b>{{ @$document->id? 'Edit' : 'Add' }} Document</b>&nbsp;<i class="small text-muted"></i></h4> 
  </div>
  <div class="modal-body">
     <form id="act_add" content-refresh="dataTable" button-click="btn_close" method="post" action="{{ route('admin.document.type.update',Crypt::encrypt(@$document->id)) }}" class="add_form" no-reset="true" button-click="btn-submit">
     {{ csrf_field() }}
    <div class="row" style="padding-bottom: 30px;">
       
       <div class="col-lg-6">                           
            <div class="form-group">
             {{ Form::label('documentType','Document Type',['class'=>' control-label']) }}
              {{ Form::text('documentType',@$document->name ,['class'=>'form-control','placeholder'=>'Enter Document Type','maxlength'=>'50']) }}
              <p class="errorAmount1 text-center alert alert-danger hidden"></p>
            </div>    
       </div>
       <div class="col-lg-6">                           
            <div class="form-group">
             {{ Form::label('code','Document code',['class'=>' control-label']) }}
              {{ Form::text('code',@$document->code ,['class'=>'form-control','placeholder'=>'Enter Document code','maxlength'=>'5']) }}
              <p class="errorAmount1 text-center alert alert-danger hidden"></p>
            </div>    
       </div>
       <div class="col-lg-12 text-center">
          
             <input type="submit" class="btn btn-success btn-sm" name="update" id="btn-update">
              
           
       </div>
      </div> 
     
     
     </form>
                 
    </div>
  </div>
