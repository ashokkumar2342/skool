@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Employee Basic Salary<small>Details</small> </h1> 
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.hr.master.employee.basic.salary.store') }}" method="post" class="add_form" no-reset="true" select-triger="employee_select_box">
                {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-3 form-group">
                  <label>Employee Name</label>
                  <select name="employee_id" class="form-control" id="employee_select_box" onchange="callAjax(this,'{{ route('admin.hr.master.employee.basic.salary.list') }}','employee_basic_salary_list')">
                    <option selected disabled>Select Employee Name</option> 
                    @foreach ($Employees as $Employee)
                    <option value="{{ $Employee->id }}">{{ $Employee->code }}--{{ $Employee->name }}</option> 
                    @endforeach
                  </select> 
                </div>
                <div class="col-lg-3 form-group">
                  <label>Basic Salary</label>
                  <input type="text" name="basic_salary" class="form-control" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div class="col-lg-3 form-group">
                  <label>From Date</label>
                  <input type="date" name="from_date" class="form-control">
                </div>
                <div class="col-lg-3 form-group">
                  <label>To Date</label>
                  <input type="date" name="to_date" class="form-control">
                </div>
                <div class="col-lg-12 form-group text-center"> 
                  <input type="submit" class="btn btn-success" style="margin-top: 20px">
                </div> 
               </div> 
              </form>
              <div id="employee_basic_salary_list">
                 
               </div> 
            </div>
          </div>
       
    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#departments_table').DataTable();
    });

     
  </script>
  @endpush
     
 
 