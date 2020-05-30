@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Teacher Class Assign<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.staff.teacher.mapping.store') }}" method="post" class="add_form">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>Teacher</label>
                <select name="teacher" class="form-control select2">
                  <option selected disabled>Select Teacher</option> 
                  @foreach ($StaffDetails as $StaffDetail)
                  <option value="{{ $StaffDetail->id }}">{{ $StaffDetail->name }}--{{ $StaffDetail->code }}</option>  
                  @endforeach
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Class</label>
                <select name="class" class="form-control select2">
                  <option selected disabled>Select Class</option>
                  @foreach ($sections as $section)
                  @if (in_array($section->id,$TeacherClassAssignSaveId)) 
                  @else
                  <option value="{{ $section->id }}">{{ $section->classes->name or ''}}--{{ $section->sectionTypes->name or '' }}</option>  
                  @endif 
                  @endforeach
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                 <input type="submit" class="form-control btn btn-primary" value="Save" style="margin-top: 22px">
              </div> 
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
