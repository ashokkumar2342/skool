@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
     <h1>Admission Test Marks</h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.student.admission.test.marks.search') }}" method="post" class="add_form" success-content-id="student_marks_table" no-reset="true">
            {{ csrf_field() }}
           <div class="row">
             <div class="col-lg-4">
              <label>Academic Year</label>
                <select name="academic_year_id" id="academic_year_id" class="form-control">
                  <option selected disabled>Select Academic Year</option>
                  @foreach ($academicYears as $academicYear)
                   <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                  @endforeach
                </select> 
             </div> 
             <div class="col-lg-4">
              <label>Class</label>
                <select name="class_id" class="form-control">
                  <option selected disabled>Select Class</option>
                  @foreach ($classTypes as $classType)
                   <option value="{{ $classType->id }}">{{ $classType->name }}</option> 
                  @endforeach
                </select> 
             </div>
             <div class="col-lg-4">
               <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
             </div> 
            </div>
          </form>
          <form action="{{ route('admin.student.admission.test.marks.store') }}" method="post" class="add_form">
            {{ csrf_field() }}
            <div class="col-lg-9" id="student_marks_table" style="margin-top: 20px"> 
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
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
