@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Check Status<small>Show</small> </h1> 
</section>

    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <form action="{{ route('admin.student.certificate.check.status.show') }}" method="post" class="add_form" success-content-id="check_status_show" no-reset="true">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4">
                  <label>Registration No</label>
                  <select name="registration_no" class="form-control select2">
                    <option selected disabled>Select Registration No</option>
                    @foreach ($students as $student)
                      <option value="{{ $student->id }}">{{ $student->registration_no }}</option> 
                     @endforeach 
                  </select> 
                </div>
                <div class="col-lg-4">
                  <label>Certificate Type</label>
                  <select name="certificate_type_id" class="form-control">
                    <option selected disabled>Select Certificate Type</option> 
                    <option value="2">School Leaving Certificate</option> 
                    <option value="3">Character Certificate</option> 
                    <option value="4">Date of Birth Certificate</option>  
                  </select> 
                </div>
                <div class="col-lg-4" style="margin-top: 24px">
                   <input type="submit" class="btn btn-success" value="Show">
                </div> 
              </div>
              <div id="check_status_show">
                  
                </div>
               
               
             </form> 
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
        $('#dataTable').DataTable();
         responsive: true
    });
     $('#btn_certificateIssu_apply_table_show').click();
     
 </script>
@endpush
