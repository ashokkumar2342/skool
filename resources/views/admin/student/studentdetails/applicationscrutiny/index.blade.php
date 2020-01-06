@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">  
    <h1>Application Scrutiny<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <div class="col-lg-3">
            <label>Academic Year</label>
            <select name="academic_year" id="academic_year" class="form-control">
              
              @foreach ($academicYears as $academicYear)
              <option value="{{ $academicYear->id }}"{{ $academicYear->status==1?'selected' : '' }}>{{ $academicYear->name }}</option>  
              @endforeach
            </select> 
          </div>
          <div class="col-lg-3">
            <label>Class</label>
            <select name="class" id="class" class="form-control">
              
              @foreach ($classes as $classe)
              <option value="{{ $classe->id }}">{{ $classe->name }}</option>  
              @endforeach 
            </select> 
          </div>
        <div class="col-lg-2">
            <button type="button" id="btn_3" class="btn btn-warning" style="margin-top: 24px"  onclick="callAjax(this,'{{ route('admin.submit.application.filter',3) }}'+'?academic_year='+$('#academic_year').val()+'&class='+$('#class').val(),'student_list_filter')">Pending</button>
          </div>
          <div class="col-lg-2">
            <button type="button" id="btn_4" class="btn btn-success" style="margin-top: 24px" onclick="callAjax(this,'{{ route('admin.submit.application.filter',4) }}'+'?academic_year='+$('#academic_year').val()+'&class='+$('#class').val(),'student_list_filter')">Accepted</button>
          </div>
          <div class="col-lg-2">
            <button type="button" id="btn_5" class="btn btn-danger" style="margin-top: 24px" onclick="callAjax(this,'{{ route('admin.submit.application.filter',5) }}'+'?academic_year='+$('#academic_year').val()+'&class='+$('#class').val(),'student_list_filter')">Rejected</button>
          </div>
          <div class="col-lg-12" style="margin-top: 20px">
             <table class="table" id="room_table"> 
              <thead>
                <tr>
                  <th>Sr.No.</th>
                  <th>Application No.</th>
                  <th>Student Name</th>
                  <th>Last School Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="student_list_filter">
                
              </tbody>
             </table> 
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
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
