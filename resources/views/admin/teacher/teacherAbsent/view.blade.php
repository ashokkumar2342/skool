@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Teacher Absent<small>view</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
        <form action="{{ route('admin.teacher.store') }}" method="post" class="add_form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-3">
              <label>Teacher</label>
              <select name="teacher" class="form-control">
                <option selected disabled>Select teacher</option>
                @foreach ($teacherFacultys as $teacherFaculty)
                  <option value="{{ $teacherFaculty->id }}">{{ $teacherFaculty->name }}</option> 
                @endforeach
              </select> 
            </div>
            <div class="col-lg-3">
              <label>Absent Date</label>
              <input type="date" name="date" class="form-control"> 
            </div> 
            <div class="col-lg-3">
              <label>From Period</label>
              <select name="from_period" class="form-control">
                <option selected disabled>Select Period</option>
                @foreach ($periodTimings as $periodTiming)
                  <option value="{{ $periodTiming->id }}">{{ $periodTiming->from_time }}</option> 
                @endforeach
              </select> 
            </div>
            <div class="col-lg-3">
              <label>To Period</label>
              <select name="to_period" class="form-control">
                <option selected disabled>Select Period</option>
                @foreach ($periodTimings as $periodTiming)
                  <option value="{{ $periodTiming->id }}">{{ $periodTiming->from_time }}</option> 
                @endforeach
              </select> 
            </div> 
          </div>
            <div class="col-lg-12 text-center">
             <input type="submit" value="Submit"  class="btn btn-success" style="margin-top: 20px"> 
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
 <script type="text/javascript">
    $(document).ready(function(){
        $('#data_table').DataTable();
    });

 </script>
  @endpush
