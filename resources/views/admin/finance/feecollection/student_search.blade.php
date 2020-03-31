<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
</style>
<div class="modal-dialog" style="width:50%">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title text-center">Student Search</h4>
    </div>
    <div class="modal-body">
      <form class="form-vertical" id="search_form"> 
        <div class="input-group">
          <div class="input-group-addon">  
            <i class="fa fa-search"></i>
          </div>
          <input type="text" class="form-control" onkeyup="callAjax(this,'{{ route('admin.student.search') }}','searchResult')" name="search" id="search">
          {{ csrf_field() }} 
        </div>    
      </form>
    </div>
    <div class="modal-footer" >
      <table class="table"> 
        <thead>
          <tr>
            <th>Name</th>
            <th>Registration No</th> 
            <th>Father's Name</th>                               
            <th>Mobile No</th>      
            <th>Action</th>                                                            
          </tr>
        </thead>
        <input type="hidden" name="fee_paid_upto" id="fee_paid_upto" value="{{ $fee_paid_upto }}">
        <tbody id="searchResult">
        </tbody>
    
      </table>
    </div>
  </div>
</div>





