@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Teacher Remark</h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <form action="{{ route('admin.exam.teacher.remark.store') }}" method="post" class="add_form" button-click="btn_teacher_remark_table_show">
             {{ csrf_field() }} 
                <div class="row">
                  <div class="col-lg-6">
	                 <label>Academic Year</label>
                   <select name="academic_year" class="form-control">
                      <option selected disabled>Select Year</option>
                      @foreach ($academicYears as $academicYear)
                        <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                       @endforeach 
                    </select> 
                  </div>
                  <div class="col-lg-6">
                   <label>Ondate</label>
                   <input type="date" name="ondate" class="form-control"> 
                  </div> 
                  <div class="col-lg-4">
                   <label>Student Name</label>
                   <select name="student_name" class="form-control select2">
                      <option selected disabled>Select Student</option>
                      @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option> 
                       @endforeach  
                    </select> 
                  </div>
                  <div class="col-lg-4">
                   <label>Subject</label>
                   <select name="subject" class="form-control">
                      <option selected disabled>Select Subject</option>
                       @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option> 
                       @endforeach 
                    </select> 
                  </div>
                  <div class="col-lg-4">
                   <label>Remark</label>
                   <input type="text" name="remark" class="form-control">
                  </div>
                  <div class="col-lg-12 text-center">
                    <input type="submit" class="btn btn-success" style="margin: 10px">
                  </div>
                </div>
            </form>       
            </div> 
          </div>
          <div class="box"> 
            <div class="box-body"> 
               <button type="button" hidden="" id="btn_teacher_remark_table_show" onclick="callAjax(this,'{{ route('admin.exam.teacher.remark.table.show') }}','teacher_remark_table_show')">Show</button>
               <div id="teacher_remark_table_show">
                 
               </div>
            </div>
          </div>   
    </section> 
@endsection
@push('scripts') 
<script type="text/javascript">
  $('#btn_teacher_remark_table_show').click();
</script>
@endpush
    
 