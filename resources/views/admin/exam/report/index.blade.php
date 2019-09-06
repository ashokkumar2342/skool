@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Exam Report </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <form action="{{ route('admin.exam.report.filter') }}" method="post" class="add_form"  success-content-id="filter_table_show" no-reset=true>
            {{ csrf_field() }} 
                <div class="row">
                  <div class="col-lg-3">
	                 <label>Academic Year</label>
                   <select name="academic_year" id="academic_year" class="form-control">
                      <option selected disabled>Select Academic Year</option>
                      @foreach ($academicYears as $academicYear)
                      <option value="{{ $academicYear->name }}">{{ $academicYear->name }}</option> 
                      @endforeach 
                    </select> 
                  </div> 
                  <div class="col-lg-3">
                   <label>From Month</label>
                   <select name="from_month" id="from_month_id" class="form-control">
                     <option selected disabled>Select Month</option>
                     @foreach ($months as $month)
                       <option value="{{ $month->month_value_id }}">{{ $month->name }}</option> 
                     @endforeach 
                   </select> 
                  </div>
                  <div class="col-lg-3">
                   <label>To Month</label>
                   <select name="to_month" id="to_month" class="form-control">
                     <option selected disabled>Select Month</option>
                     @foreach ($months as $month)
                       <option value="{{ $month->month_value_id }}">{{ $month->name }}</option> 
                     @endforeach 
                   </select> 
                  </div>
                  <div class="col-lg-3">
                  <label>Report Wise</label>
                  <select name="report_wise" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.finance.report.fee.report') }}','fee_due')">
                    <option selected disabled>Select Option</option> 
                    
                    <option value="2">Student</option> 
                    <option value="3">Class</option> 
                    <option value="4">Class With Section</option> 
                  </select> 
                </div>
                <div id="fee_due"> 
                </div> 
                  <div class="col-lg-3">
                   <label>Subject</label>
                   <select name="subject_id" id="subject_id" class="form-control">
                      <option selected disabled>Select Subject</option>
                      @foreach ($subjects as $subject)
                       <option value="{{ $subject->id }}">{{ $subject->name }}</option> 
                      @endforeach
                    </select> 
                  </div> 
                </div>
                <div class="col-lg-12 text-center">
                  <input type="submit" class="btn btn-success" style="margin: 10px">
                  
                </div>
          </form>       
            </div>
            <div id="filter_table_show"> 
             </div> 
          </div> 
    </section> 
@endsection
@push('scripts') 
<script type="text/javascript">
  $('input').rangePicker({ minDate:[2,2009], maxDate:[10,2013] })
    // subscribe to the "done" event after a date was selected
    .on('datePicker.done', function(e, result){
        console.log(result);
    });
</script>
  @endpush  
    
 