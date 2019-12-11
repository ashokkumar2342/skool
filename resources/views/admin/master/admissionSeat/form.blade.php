  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:40%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$adminssionSeat->id?'Edit' : 'Add' }} Admission Seat</h4>
      </div>
      <div class="modal-body"> 
            <form action="{{ route('admin.adminssion.seat.store',@$adminssionSeat->id) }}" method="post" class="add_form" content-refresh="admission_seat_table" button-click="btn_close">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-12 form-group">
                  <label>Academic Year</label>
                  <select name="academic_year_id" class="form-control">
                    <option selected disabled> Select Academic Year</option>
                    @foreach ($academicYears as $academicYear)
                       <option value="{{ $academicYear->id }}"{{ @$adminssionSeat->academic_year_id==$academicYear->id?'selected' : '' }}>{{ $academicYear->name }}</option> 
                    @endforeach 
                  </select> 
                </div> 
                <div class="col-lg-12 form-group">
                  <label>Class</label>
                  <select name="class_id" class="form-control">
                    <option selected disabled> Select Class</option>
                    @foreach ($classes as $classe)
                       <option value="{{ $classe->id }}"{{ @$adminssionSeat->class_id==$classe->id?'selected' : '' }}>{{ $classe->name }}</option> 
                    @endforeach 
                  </select> 
                </div>
                <div class="col-lg-12 form-group">
                  <label>Total Seat</label>
                  <input type="text" name="total_seat" class="form-control" placeholder="Enter" maxlength="10" value="{{ @$adminssionSeat->total_seat }}"> 
                </div>
                <div class="col-lg-12 form-group">
                  <label>From Date</label>
                  <input type="date" name="from_date" class="form-control" value="{{ @$adminssionSeat->from_date }}"> 
                </div>
                <div class="col-lg-12 form-group">
                  <label>Last Date</label>
                  <input type="date" name="last_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div>
                <div class="col-lg-12 form-group text-center" >
                   <input type="submit" class="btn btn-success">
                </div> 
              </div> 
              </form>  
            </div> 
        </div>
      </div>

     
    <!-- /.content -->

 
