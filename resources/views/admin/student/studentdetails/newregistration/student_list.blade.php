@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Student List<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body"> 
          <div class="col-lg-4">
            <button type="button" class="btn btn-warning" data-table="student_list_filter_table" onclick="callAjax(this,'{{ route('admin.student.registration.list.filter',1) }}','student_list_filter')"> New Student</button>
          </div>
          <div class="col-lg-4">
            <button type="button" class="btn btn-success" data-table="student_list_filter_table" onclick="callAjax(this,'{{ route('admin.student.registration.list.filter',2) }}','student_list_filter')"> Present Student</button>
          </div>
          <div class="col-lg-4">
            <button type="button" class="btn btn-danger" data-table="student_list_filter_table" onclick="callAjax(this,'{{ route('admin.student.registration.list.filter',3) }}','student_list_filter')"> Pass Out Student</button>
          </div>
          <div class="col-lg-12" style="margin-top: 20px">
             
              <table class="table" id="student_list_filter">
                <thead>
                  <tr>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
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
        $('#student_list_filter').DataTable();
    });
 </script>
  @endpush
