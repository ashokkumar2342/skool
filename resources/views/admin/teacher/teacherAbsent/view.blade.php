  
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
        <h4 class="modal-title">Add Absent Teacher</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.teacher.store') }}" method="post" class="add_form" button-click="btn_close">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-6">
              <label>Teacher</label>
              <select name="teacher" class="form-control select2">
                <option selected disabled>Select teacher</option>
                @foreach ($teacherFacultys as $teacherFaculty)
                  <option value="{{ $teacherFaculty->teacher_id }}">{{ $teacherFaculty->teacherFaculty->name or ''}}</option> 
                @endforeach
              </select> 
            </div>
            <div class="col-lg-6">
              <label>Absent Date</label>
              <input type="date" name="date" class="form-control"> 
            </div> 
            <div class="col-lg-6">
              <label>From Period</label>
              <select name="from_period" class="form-control">
                <option selected disabled>Select Period</option>
                @foreach ($periodTimings as $periodTiming)
                  <option value="{{ $periodTiming->period_id }}">{{ $periodTiming->periodTiming->from_time or ''}}</option> 
                @endforeach
              </select> 
            </div>
            <div class="col-lg-6">
              <label>To Period</label>
              <select name="to_period" class="form-control">
                <option selected disabled>Select Period</option>
                @foreach ($periodTimings as $periodTiming)
                 <option value="{{ $periodTiming->period_id }}">{{ $periodTiming->periodTiming->from_time or ''}}</option> 
                @endforeach
              </select> 
            </div> 
          </div>
            <div class="col-lg-12 text-center">
             <input type="submit" value="Submit"  class="btn btn-success" style="margin-top: 20px"> 
            </div>
           
         </form> 

                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
