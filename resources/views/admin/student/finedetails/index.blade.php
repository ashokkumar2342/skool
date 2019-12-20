@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Student Fine Details<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.student.fine.details.show') }}" method="post" data-table="student_fine_details_datatable" class="add_form" success-content-id="student_fine_details_table" no-reset="true">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4">
                <label>Registration No.</label>
                <select name="student_id" class="form-control select2">
                  <option selected disabled>Select Registration No.</option>
                  @foreach ($students as $student)
                      <option value="{{ $student->id }}">{{ $student->registration_no }}--{{ $student->name }}</option> 
                   @endforeach 
                </select> 
              </div>
              <div class="col-lg-8">
                <input type="submit" id="btn_student_fine_details_show" class="btn btn-success" value="Show" style="margin-top: 24px"> 
               </div> 
            </div>
            <div id="student_fine_details_table">
               
             </div> 
           </form> 
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
   
 </script>
  @endpush
