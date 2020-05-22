@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Class test<small>List</small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('student.class.test.show') }}" method="post" class="add_form" success-content-id="class_test_show" no-reset="true">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group"> 
                  <label >Academic Year</label>  
                  <select name="academic_year_id" id="fee_paid_upto" class="form-control">
                    <option disabled selected>Select Academic Year</option>
                    @foreach ($academicYears as $academicYear)
                     <option value="{{$academicYear->id}}">{{$academicYear->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group"> 
                  <label >Test For</label>  
                  <select name="test_for" id="fee_paid_upto" class="form-control">
                    <option disabled selected>Select Academic Year</option>
                     <option value="1">Upcoming</option>
                     <option value="2">Archive</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group"> 
                  <label >Record For</label>  
                  <input type="text" name="record" class="form-control" value="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
              </div>
              <div class="col-lg-2">
                <input type="submit" value="Show Class test" class="form-control btn btn-success" style="margin-top: 24px">
              </div>
            </div>
          </form>
          <div class="table-responsive" id="class_test_show">
            
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
        $('#room_table').DataTable();
    });
 </script>
  @endpush
