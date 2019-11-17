
  <!-- Main content -->
   
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
        <h4 class="modal-title">Add Parent Info</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form id="parents-form" action="{{ route('admin.parents.add') }}"  method="post" button-click="btn_close,parent_info_tab" content-refresh="parents_items" class="add_form">
              {{ csrf_field() }}
                 <input type="hidden" name="student_id" value="{{ $student }}">   
                    <div class="form-group col-md-4">
                         {{ Form::label('relation_type_id','Relation',['class'=>' control-label']) }}
                      
                         <select name="relation_type_id" id="relation_type_id" class="form-control" onchange="showHideDiv(1,'btnNewExiting')">
                          <option value="" disabled selected>Select</option>
                          
                          @foreach ($parentsType as $key=>$value)
                           <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                           
                            
                         </select>
                          
                    </div>
                    
                      <div class="form-group col-md-4" id="btnNewExiting" style="display: none;margin-top: 24px"  >
                      <a href="#" onclick="callAjax(this,'{{ route('admin.parents.add.new') }}','perent_add_new'),showHideDiv(1,'perent_add_new'),showHideDiv(0,'existing'),showHideDiv(0,'parent_search_div')" class="btn btn-primary">New</a>&nbsp;&nbsp;&nbsp; 
                      <a href="#" onclick="callAjax(this,'{{ route('admin.parents.search') }}'+'?relation_type_id='+$('#relation_type_id').val(),'existing'),showHideDiv(0,'perent_add_new'),showHideDiv(1,'existing')" class="btn btn-warning">Existing</a>
                      </div> 
                    <div class="col-lg-12" id="perent_add_new">
                       
               </div> 
             </form>  
            </div> 
            <form action="{{ route('admin.parents.search.post') }}" method="post" class="add_form" success-content-id="parent_search_div">
            {{ csrf_field() }} 
               <div class="col-lg-12" id="existing">
                       
               </div> 
            </form>
            </div>
             <form action="{{ route('admin.parents.existing.store') }}" method="post" class="add_form" button-click="btn_close,parent_info_tab">
            {{ csrf_field() }}
            <input type="hidden" name="student_id" value="{{ $student }}">
            
            
               <div id="parent_search_div" style="padding-top: 20px">
                 
               </div>
                </form>
       </div>
    </div>   
  </div>

                 
   