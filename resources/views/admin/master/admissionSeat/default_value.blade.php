@extends('admin.layout.base')
@section('body')
<section class="content-header"> 
    <h1>Admission Schedule Default Value</h1>
</section>
    <section class="content">
        <div class="box"> 
          <div class="box-body">
           <form action="{{ route('admin.defaultValue.admission.schedule.store') }}" method="post" >
              {{ csrf_field() }}
              <div class="row">
                {{-- <div class="col-lg-6 form-group">
                  <label>Academic Year</label>
                  <select name="academic_year_id" class="form-control">
                    <option selected disabled> Select Academic Year</option>
                    @foreach ($academicYears as $academicYear)
                       <option value="{{ $academicYear->id }}"{{ @$adminssionSeat->academic_year_id==$academicYear->id?'selected' : '' }}>{{ $academicYear->name }}</option> 
                    @endforeach 
                  </select> 
                </div> 
                <div class="col-lg-6 form-group">
                  <label>Class</label>
                  <select name="class_id" class="form-control">
                    <option selected disabled> Select Class</option>
                    @foreach ($classes as $classe)
                       <option value="{{ $classe->id }}"{{ @$adminssionSeat->class_id==$classe->id?'selected' : '' }}>{{ $classe->name }}</option> 
                    @endforeach 
                  </select> 
                </div> --}}
                <div class="col-lg-3 form-group">
                  <label>Total Seat</label>
                  <input type="text" name="total_seat" class="form-control" placeholder="Enter Total Seat" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$adminssionSeat->total_seat }}"> 
                </div>
                <div class="col-lg-3 form-group">
                  <label>Prospectus Fee</label>
                  <input type="number" name="form_fee" class="form-control" placeholder="Enter Prospectus Fee"  maxlength="5" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$adminssionSeat->form_fee }}"> 
                </div>
                <div class="col-lg-3 form-group">
                  <label>From Date</label>
                  <input type="date" name="from_date" class="form-control" value="{{ @$adminssionSeat->from_date }}"> 
                </div>
                <div class="col-lg-3 form-group">
                  <label>Last Date</label>
                  <input type="date" name="last_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div> 
                <div class="col-lg-3 form-group">
                  <label>Test Date</label>
                  <input type="date" name="test_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div>
                <div class="col-lg-3 form-group">
                  <label>Retest Date</label>
                  <input type="date" name="retest_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div>
                <div class="col-lg-3 form-group">
                  <label>Result Date</label>
                  <input type="date" name="result_date" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div>
               {{--  <div class="col-lg-6 form-group">
                  <label>syllabus</label>
                  <input type="file" name="attachment" class="form-control" value="{{ @$adminssionSeat->last_date }}"> 
                </div> --}}
                <div class="col-lg-12 form-group text-center" >
                   <input type="submit" class="btn btn-success">
                </div> 
              </div> 
              </form>  
          </div>
        </div>
     
     
         
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
  <script>
     $(document).ready(function() {
       $('#admission_seat_table').DataTable( {
            
       } );
   } );  
   
  </script>
  
@endpush