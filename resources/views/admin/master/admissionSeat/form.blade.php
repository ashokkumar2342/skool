  
  <!-- Main content -->
   
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$adminssionSeatId->id?'Edit' : 'Add' }} Admission Schedule</h4>
      </div>
      <div class="modal-body"> 
            <form action="{{ route('admin.adminssion.seat.store',@$adminssionSeatId->id) }}" method="post" class="add_form" content-refresh="admission_seat_table" button-click="btn_close" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Academic Year</label>
                  <select name="academic_year_id" class="form-control">
                    <option selected disabled> Select Academic Year</option>
                    @foreach ($academicYears as $academicYear)
                       <option value="{{ $academicYear->id }}"{{ @$adminssionSeat->academic_year_id==$academicYear->id?'selected' : $academicYear->status==1?'selected' : '' }}>{{ $academicYear->name }}</option> 
                    @endforeach 
                  </select> 
                </div> 
                <div class="col-lg-6 form-group">
                  <label>Class</label>
                  <select name="class_id" class="form-control">
                    <option selected disabled> Select Class</option>
                    @foreach ($classes as $classe)
                       <option value="{{ $classe->id }}"{{ @$adminssionSeat->class_id==$classe->id?'selected' : '' }}>{{ $classe->name }}</option> 
                    @endforeach 
                  </select> 
                </div>
                <div class="col-lg-6 form-group">
                  <label>Total Seat</label>
                  <input type="text" name="total_seat" class="form-control" placeholder="Enter Total Seat" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$adminssionSeat->total_seat }}"> 
                </div>
                <div class="col-lg-6 form-group">
                  <label>Prospectus Fee</label>
                  <input type="text" name="from_fee" class="form-control" placeholder="Enter Prospectus Fee"  maxlength="5" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$adminssionSeat->form_fee }}"> 
                </div>
                <div class="col-lg-6 form-group">
                  <label>From Date</label>
                  <input type="date" name="from_date" class="form-control" value="{{ @$adminssionSeat->from_date }}"> 
                </div>
                <div class="col-lg-6 form-group">
                  <label>Last Date</label>
                  <input type="date" name="last_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div> 
                <div class="col-lg-6 form-group">
                  <label>Test Date</label>
                  <input type="date" name="test_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div>
                <div class="col-lg-6 form-group">
                  <label>Retest Date</label>
                  <input type="date" name="retest_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div>
                <div class="col-lg-6 form-group">
                  <label>Result Date</label>
                  <input type="date" name="result_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div>
                <div class="col-lg-6 form-group">
                  <label>Syllabus</label>
                  <input type="file" name="attachment" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
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

 
