 
<div class="modal-content" >
  <div class="modal-header">
    <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><b>{{ @$incomeRange->id? 'Edit' : 'Add'}} </b>&nbsp;<i class="small text-muted"></i></h4> 
  </div>
  <div class="modal-body">
     <form id="act_add" content-refresh="dataTable" button-click="btn_close" method="post" action="{{ route('admin.incomeSlab.update',Crypt::encrypt(@$incomeRange->id)) }}" class="add_form" no-reset="true" button-click="btn-submit">
     {{ csrf_field() }}
    <div class="row" style="padding-bottom: 30px;">
       
       <div class="col-lg-12">                           
            <div class="form-group">
             <label>Income Slab</label>
                     <input type="text" name="range" value="{{ @$incomeRange->range }}" maxlength="30" class="form-control" placeholder="Enter Income Slab" required="">
            </div>    
       </div>
       <div class="col-lg-12">                           
            <div class="form-group">
             <label>Income Code</label>
                     <input type="text" name="code" value="{{ @$incomeRange->code }}" maxlength="5" class="form-control" placeholder="Enter Income code" required="">
            </div>    
       </div>
       <div class="col-lg-12">
         <div class="text-center"><br>
             <input type="submit" class="btn btn-success btn-sm" name="update" id="btn-update" {{-- onclick="submit_jq();" --}} />
              
           </div>
       </div>
      </div> 
     
     
     </form>
                 
    </div>
  </div>
