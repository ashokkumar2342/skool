@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Student  Medical Details Add<small></small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 3])
</section>

    <section class="content">
        <div class="box"> 
          <div class="box-body">
             <form action="{{ route('admin.medical.student.show') }}" method="post" class="add_form" success-content-id="student_list" no-reset="true">
               {{ csrf_field() }}

                <div class="col-lg-4 form-group">
                  <label>Registration No</label>
                  <select name="student_id" class="form-control select2">
                    <option selected disabled>Select Registration No</option>
                    @foreach ($students as $student)
                      <option value="{{ $student->id }}">{{ $student->registration_no }}</option> 
                     @endforeach 
                  </select> 
                 </div>
                 <div class="col-lg-3">
                  <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px"> 
                  </div> 
             </form>
             <div id="student_list">
                 
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
        $('#dataTable').DataTable();
    });
     
 </script>
@endpush