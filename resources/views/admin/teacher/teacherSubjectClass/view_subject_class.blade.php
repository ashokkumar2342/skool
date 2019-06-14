@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Teacher Subject Class<small>Details</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">             
             <form action="{{ route('admin.teacher.subject.class.store') }}" method="post" class="add_form" success-content-id="teacher_history_table">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4"> 
                 <label>Teacher Name</label>
                 <select name="teacher_name" class="form-control" data-table="true" onchange="callAjax(this,'{{ route('admin.teacher.history.table.show') }}','teacher_history_table')">
                 <option selected disabled>Select Name</option> 
                   @foreach ($teacherFacultys as $teacherFaculty) 
                   <option value="{{ $teacherFaculty->id }}">{{ $teacherFaculty->name }}</option> 
                    @endforeach 
                 </select> 
                 </div>
                 <div class="col-lg-4"> 
                 <label>Class</label></br>
                 <select name="class" class="form-control" {{-- multiselect-form="true" --}} onchange="callAjax(this,'{{ route('admin.teacher.class.wise.section') }}','class_wise_section')">
                   <option selected disabled>Select Class</option> 
                   @foreach ($classTypes as $classType) 
                   <option value="{{ $classType->id }}">{{ $classType->name }}</option> 
                    @endforeach 
                 </select> 
                 </div>
                 <div id="class_wise_section"> 
                 </div> 
                 <div class="col-lg-4">
                  <label>No of period</label>
                  <input type="text" name="no_of_period" class="form-control"> 
                 </div>
                  
               <div class="col-lg-12 text-center"> 
                <input type="submit" class="btn btn-success" style="margin-top: 10px">
               </div>
             </form>
              
               <div id="teacher_history_table">
                           
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
    $(document).ready(function(){
        $('#data_table').DataTable();
    });

 </script>
  @endpush
