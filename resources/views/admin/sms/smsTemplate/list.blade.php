@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    {{-- <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add')}}')" style="margin:10px">Add Template</button> --}}
    <h1>SMS Template List<small>Details</small> </h1>
     
    </section>  
    <section class="content">
    
          
          {{-- <button id="btn_outhor_table_show" hidden data-table="author_table" onclick="callAjax(this,'{{ route('admin.sms.template.table',1) }}','othor_details_table_show')">show </button> --}}

          <div class="box"> 
            <div class="box-body">
             <div class="card card-primary card-outline"> 
               <div class="card-body">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Birthday</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Homework</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Class Test</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-test-tab" data-toggle="pill" href="#custom-tabs-one-test" role="tab" aria-controls="custom-tabs-one-test" aria-selected="true">Class Test Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-time-table-tab" data-toggle="pill" href="#custom-tabs-one-time-table" role="tab" aria-controls="custom-tabs-one-time-table" aria-selected="true">Time Table</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-medical-tab" data-toggle="pill" href="#custom-tabs-one-medical" role="tab" aria-controls="custom-tabs-one-medical" aria-selected="true">Medical</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-absent-student-tab" data-toggle="pill" href="#custom-tabs-one-absent-student" role="tab" aria-controls="custom-tabs-one-medical" aria-selected="true">Absent Student</a>
                  </li>
                   
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',1)}}')" style="margin:10px">Add Birthday Template</button> 
                         <button id="btn_outhor_table_show" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',1) }}','othor_details_table_show')">show </button>
                    <div id="othor_details_table_show"> 
                    </div>   
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',2)}}')" style="margin:10px">Add Homework Template</button> 
                             <button id="btn_Homework_table_show" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',2) }}','Homework_details_table_show')">show </button>
                    <div id="Homework_details_table_show"> 
                    </div> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',3)}}')" style="margin:10px">Add Class Test  Template</button>
                       <button id="btn_class_test_table_show" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',3) }}','class_test_details_table_show')">show </button>
                    <div id="class_test_details_table_show"> 
                    </div>
                  </div>
                  <div class="tab-pane fade  " id="custom-tabs-one-test" role="tabpanel" aria-labelledby="custom-tabs-one-test-tab">
                    <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',4)}}')" style="margin:10px">Add Class Test Details Template</button>
                      <button id="btn_class_test_details" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',4) }}','class_test_details')">show </button>
                    <div id="class_test_details"> 
                    </div>
                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-time-table" role="tabpanel" aria-labelledby="custom-tabs-one-time-table-tab">
                    <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',5)}}')" style="margin:10px">Add Time Table Template</button>
                      <button id="btn_time_table_table" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',5) }}','time_table_table')">show </button>
                    <div id="time_table_table">
                         
                    </div>
                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-medical" role="tabpanel" aria-labelledby="custom-tabs-one-medical-tab">
                    <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',6)}}')" style="margin:10px">Add Medical Template</button>
                      <button id="btn_time_medical" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',6) }}','time_medical')">show </button>
                    <div id="time_medical">
                         
                    </div>
                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-absent-student" role="tabpanel" aria-labelledby="custom-tabs-one-absent-student-tab">
                    <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',7)}}')" style="margin:10px">Add Absent Student Template</button>
                      <button id="btn_time_absent_student" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',7) }}','time_absent_student')">show </button>
                    <div id="time_absent_student">
                         
                    </div>
                  </div>
                   
              
      </div>
    </div>
  </div>
 </div>

       

    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
      
     $('#btn_outhor_table_show').click();
     $('#btn_Homework_table_show').click();
     $('#btn_class_test_table_show').click();
     $('#btn_class_test_details').click();
     $('#btn_time_table_table').click();
     $('#btn_time_medical').click();
     $('#btn_time_absent_student').click();
  </script>
  @endpush
     
 
 