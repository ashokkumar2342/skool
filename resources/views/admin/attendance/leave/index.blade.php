@extends('admin.layout.base')
@section('body')  
    <section class="content">
        <div class="box">  
            <div class="box-body"> 
              <div class="panel panel-default">
                <div class="panel-heading">Leave Apply Details</div>
                <div class="panel-body"> 
               <form action="{{ route('admin.attendance.leave.store',@$leaveRecord->id) }}" method="post" class="add_form" button-click="btn_click_list_show,btn_close" select-triger="student_div" no-reset="true">
                {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Academic Year</label>
                        <select name="year_id" id="academic_year_id" class="form-control" onchange="callAjax(this,'{{ route('admin.attendance.list') }}'+'?academic_year_id='+$('#academic_year_id').val()+'&student_id='+$('#student_div').val(),'student_history_blade')">
                              <option selected disabled>Select Academic Year</option> 
                          @foreach ($academicYears as $academicYear)
                              <option value="{{ $academicYear->id }}"{{ $academicYear->status==1?'selected':'' }}>{{ $academicYear->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
                    </div>
                    <div class="col-lg-4 form-group"> 
                        <label>Student Name</label>
                        <select name="student_id" id="student_div" class="form-control select2" onchange="callAjax(this,'{{ route('admin.attendance.list') }}'+'?academic_year_id='+$('#academic_year_id').val()+'&student_id='+$('#student_div').val(),'student_history_blade')">
                              <option selected disabled>Select Student</option> 
                          @foreach ($students as $student)
                              <option value="{{ $student->id }}">{{ $student->registration_no }}--{{ $student->name }}</option>  
                          @endforeach
                        </select> 
                      </div>  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Leave Type</label>
                        <select name="leave_id" class="form-control ">
                              <option selected disabled>Select Leave Type</option> 
                          @foreach ($leaveTypes as $leaveType)
                              <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
                    </div>
                  </div>
                  @php
                    $date=date('Y-m-d');
                  @endphp
                  <div class="row"> 
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Apply Date</label>
                        <input type="date" name="apply_date" class="form-control" value="{{ $date }}" max="{{ date('Y-m-d',strtotime($date)) }}">
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control"  onchange="callAjax(this,'{{ route('admin.attendance.date') }}','date_div')"> 
                      </div> 
                    </div>
                    <div class="col-lg-4" id="date_div">
                      <div class="form-group">
                        <label>To Date</label>
                        <input type="date" disabled="" name="to_date" class="form-control"  > 
                      </div> 
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" class="form-control"  > 
                      </div> 
                    </div><div class="col-lg-4">
                      <div class="form-group">
                        <label>Attachment</label>
                        <input type="file" name="attachment" class="form-control"  > 
                      </div> 
                    </div>
                    <div class="col-lg-12 text-center">
                       <input type="submit" class="btn btn-success">   
                     </div>  
                  </div> 
             </form> 
          </div>
        </div>
        <div class="table-responsive" id="student_history_blade" style="margin-top: 10px"> 
        </div>
      </div>
    </div>
    </section>
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript">
  
 </script>

 
 
  
@endpush