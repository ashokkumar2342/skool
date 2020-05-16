@extends('admin.layout.base')
@section('body') 
<section class="content-header">
  <button type="button" class="btn btn-info btn-sm pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.apply') }}')">Leave Apply</button>
<h1> Leave Apply List</h1>
     
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
               <form action="{{ route('admin.attendance.leave.store',@$leaveRecord->id) }}" method="post" class="add_form" button-click="btn_click_list_show,btn_close" select-triger="student_div" no-reset="true">
                {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-4 form-group"> 
                        <label>Student Name</label>
                        <select name="student_id" id="student_div" class="form-control select2" onchange="callAjax(this,'{{ route('admin.attendance.lest') }}','student_history_blade')">
                              <option selected disabled>Select Student</option> 
                          @foreach ($students as $student)
                              <option value="{{ $student->id }}">{{ $student->registration_no }}--{{ $student->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Academic Year</label>
                        <select name="year_id" class="form-control ">
                              <option selected disabled>Select Academic Year</option> 
                          @foreach ($academicYears as $academicYear)
                              <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
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
                  <div class="row"> 
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Apply Date</label>
                        {!! Form::text('apply_date', date('d-m-Y')  , ['class'=>'form-control datepicker','id'=>'date','placeholder'=>'Date','max'=>date('Y-m-d')]) !!}
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control"  > 
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control"  > 
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
              <div class="table-responsive" id="student_history_blade" style="margin-top: 10px"> 
              </div> 
             </form> 
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