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
                <div class="row">
                  <div class="col-lg-3">
	                 <label>Academic Year</label>
                   <select name="academic_year" id="academic_year" class="form-control" onchange="callAjax(this,'{{ route('admin.exam.report.filter') }}'+'?academic_year_id='+$('#academic_year').val()+'&month='+$('#month').val()+'&report_for='+$('#report_for_id').val()+'&subject_id='+$('#subject_id_id').val()+'&marks='+$('#marks_id').val(),'filter_table_show')">
                      <option selected disabled>Select Academic Year</option>
                      @foreach ($academicYears as $academicYear)
                      <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                      @endforeach 
                    </select> 
                  </div> 
                  <div class="col-lg-3">
                   <label>Month Range</label>
                   <input type="month" name="month" id="month" class="form-control" onchange="callAjax(this,'{{ route('admin.exam.report.filter') }}'+'?academic_year_id='+$('#academic_year').val()+'&month='+$('#month').val()+'&report_for='+$('#report_for_id').val()+'&subject_id='+$('#subject_id_id').val()+'&marks='+$('#marks_id').val(),'filter_table_show')"> 
                  </div>
                  <div class="col-lg-3">
                   <label>Report For</label>
                   <select name="report_for" id="report_for" class="form-control" onchange="callAjax(this,'{{ route('admin.exam.report.filter') }}'+'?academic_year_id='+$('#academic_year').val()+'&month='+$('#month').val()+'&report_for='+$('#report_for_id').val()+'&subject_id='+$('#subject_id_id').val()+'&marks='+$('#marks_id').val(),'filter_table_show')">
                      <option selected disabled>Select Option</option>
                      <option value="1">Student</option>
                      <option value="2">Class</option>
                      <option value="3">Class with Section</option>
                      <option value="4">Marks</option> 
                    </select> 
                  </div>
                  <div class="col-lg-3">
                   <label>Subject</label>
                   <select name="subject" id="subject_id" class="form-control" onchange="callAjax(this,'{{ route('admin.exam.report.filter') }}'+'?academic_year_id='+$('#academic_year').val()+'&month='+$('#month').val()+'&report_for='+$('#report_for_id').val()+'&subject_id='+$('#subject_id_id').val()+'&marks='+$('#marks_id').val(),'filter_table_show')">
                      <option selected disabled>Select Option</option>
                      <option value="1">Student</option>
                      <option value="2">Class</option>
                      <option value="3">Class with Section</option>
                      <option value="4">Marks</option> 
                    </select> 
                  </div>
                  <div class="col-lg-3">
                   <label>Marks</label>
                   <select name="marks" id="marks" class="form-control" onchange="callAjax(this,'{{ route('admin.exam.report.filter') }}'+'?academic_year_id='+$('#academic_year').val()+'&month='+$('#month').val()+'&report_for='+$('#report_for_id').val()+'&subject_id='+$('#subject_id_id').val()+'&marks='+$('#marks_id').val(),'filter_table_show')">
                      <option selected disabled>Select Option</option>
                      <option value="1">Student</option>
                      <option value="2">Class</option>
                      <option value="3">Class with Section</option>
                      <option value="4">Marks</option> 
                    </select> 
                  </div> 
                </div> 
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
    
 