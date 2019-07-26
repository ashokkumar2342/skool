@extends('admin.layout.base')
@section('body')
  
  <section class="content-header"> 
    <h1>Report<small>Details</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body"> 
          <form action="{{ route('admin.student.final.report.show') }}" method="post"  success-content-id="final_report_result" no-reset="true" target="blank">
            {{ csrf_field() }} 
            <div class="row">
              <div class="col-lg-4" style="margin-left: 15px">
                <label>Report For</label>
                <select name="report_for" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.student.final.report.for.change') }}','report_for')">
                  <option selected disabled>Select Option</option>
                  <option value="1">All</option>
                  <option value="2">Student </option>
                  <option value="3">Class With Section</option> 
                </select> 
              </div> 
              <div id="report_for"> 
              </div> 
            </div></br>
            <div class="row">
            <div class="col-lg-4" style="margin-left: 15px">
              <label>Report Wise</label>
              <select name="report_wise" class="form-control"multiselect-form="true" onchange="callAjax(this,'{{ route('admin.student.final.report.student.details.check') }}','student_details_select')">
                <option selected disabled>Select Option</option>
                <option value="1">Section</option>
                <option value="2">Filed</option> 
              </select> 
              </div>
            <div id="student_details_select">
            </div>

            </div>
            
              {{-- <div id="bloodgroupcheck" style="margin-top: 20px">
                            <div class="row" style="margin-left: 10px"> 
                                <div class="form-group col-sm-2" id="phone">
                                    <label for="reg_input">Student Details</label>
                                   <input name="student_details_menu"value="1" id="student_details" type="checkbox" multiselect="true" onclick="callAjax(this,'{{ route('admin.student.final.report.student.details.check') }}','student_details_select')">

                                   <div id="student_details_select"> 
                                   </div>
                               </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Perent Details</label>
                                    <input name="perent_details_menu" id="perent_details" value="2" type="checkbox" onclick="callAjax(this,'{{ route('admin.student.final.report.student.details.check') }}','student_details_perent')">
                                    <div id="student_details_perent">
                                      
                                    </div>
                                </div>  
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Medical Details</label>
                                    <input name="medical_details_menu" value="3" type="checkbox" onclick="callAjax(this,'{{ route('admin.student.final.report.student.details.check') }}','medical_details_select')">
                                    <div id="medical_details_select">
                                      
                                    </div>
                                </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Sibling Details</label>
                                    <input name="sibling_details" value="4" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Subject Detials</label>
                                    <input name="subject_details" value="5" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-2" id="email">
                                    <label for="reg_input">Document Details</label>
                                    <input name="document_details" value="6" type="checkbox">
                                </div>  
                            </div>
                        </div> --}}
              
              <div id="final_report_result">
                
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
