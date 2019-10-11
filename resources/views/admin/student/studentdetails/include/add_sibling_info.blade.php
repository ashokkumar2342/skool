  
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
        <h4 class="modal-title">Sibling Info</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.sibling.add',$student->id) }}" method="post" class="add_form" button-click="btn_close,sibling_info_tab"> 
          {{ csrf_field() }}
       <div class="row"> 
        <div class="col-md-12">
        <div class="form-group">
             {{ Form::label('student_sibling_id','Student Sibling Registration No',['class'=>'control-label']) }}       
             <span class="fa fa-asterisk"></span>                  
             {{ Form::text('student_sibling_id','',['class'=>'form-control','required','maxlength'=>'20']) }}
        </div>  
        <div class="col-lg-12 text-center" style="margin-top: 10px">
        <input type="submit" class="btn btn-success" value="Save"> 
        </div>  
         
      </div>
       </form>
      </div>
    </div>   
  </div>

  
