@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Absent Fine Details<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.absent.fine.details.show') }}" method="post"  class="add_form" success-content-id="absent_fine_details_table" no-reset="true">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3">
               <label>Class</label>
                   <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
                      <option disabled selected>Select Class</option>
                      @foreach ($classTypes as $classType)
                       <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                      @endforeach
                    </select> 
                 </div> 
                 <div class="col-lg-3">
                   <label>Section</label>
                    <select name="section_id" class="form-control" id="section_div"> 
                    </select> 
                 </div>
                 <div class="col-lg-3">
                  <label>For Month/Year</label>
                        <select name="for_month_year" class="form-control">
                            @foreach ($yearmonths as $yearmonth)

                                  <option value="{{date('d-m-Y',strtotime($yearmonth)) }}"> {{date('m-Y',strtotime($yearmonth)) }}</option> 
                            @endforeach 
                        </select>  
                </div> 
                <div class="col-lg-3 form-group">
                  <label>Amount/Per Day</label>
                  <input type="text" name="amount_per_day" placeholder="Enter Amount" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                  
                </div>
              <div class="col-lg-12 text-center">
                <input type="submit" id="btn_student_fine_details_show" class="btn btn-success" value="Show" style="margin-top: 24px"> 
               </div> 
              </div> 
           </form>
           <form action="{{ route('admin.absent.fine.details.store') }}" method="post" class="add_form" button-click="btn_student_fine_details_show">
            {{ csrf_field() }}
            <div class="col-lg-12" id="absent_fine_details_table">
              
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
   
 </script>
  @endpush
