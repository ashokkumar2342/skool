   
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form action="{{ route('admin.feeStructureLastDate.report.generate') }}" method="post"  no-reset="true" target="blank">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-6">
                <label>Academic Year</label>
                <select name="academic_year_id" class="form-control" required="required">
                  <option selected disabled>Select Academic Year</option>
                  @foreach ($academicYears as $academicYear)
                    <option value="{{ $academicYear->id }}"{{ $academicYear->status==1?'selected':'' }}>{{ $academicYear->name }}</option> 
                  @endforeach 
                </select>
              </div>
              <div class="col-lg-3" style="margin-top: 30px">
                <label>Page Break</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="checked" value="page-break" > 
               </div>
               <div class="col-lg-2" style="margin-top: 24px" style="margin-left: 10px">
                <input type="submit" class="btn btn-primary" value="PDF Generate"> 
               </div> 
            </div> 
           </form> 
            </div>
            <div class="col-lg-12" style="margin-top: 50px">
               
             </div> 
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
