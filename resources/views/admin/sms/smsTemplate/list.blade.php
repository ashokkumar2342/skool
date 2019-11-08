@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    
    <h1>SMS Template List<small>Details</small> </h1>
     
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Birthday</a></li>
                <li><a data-toggle="tab" href="#menu1">Homework</a></li>
                <li><a data-toggle="tab" href="#menu2">Class Test</a></li>
                <li><a data-toggle="tab" href="#menu3">Class Test Details</a></li>
                <li><a data-toggle="tab" href="#menu4">Time Table</a></li>
                <li><a data-toggle="tab" href="#menu5">Medical</a></li>
                <li><a data-toggle="tab" href="#menu6">Absent Student</a></li> 
              </ul>

              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',1)}}')" style="margin:10px">Add Birthday Template</button> 
                         <button id="btn_outhor_table_show" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',1) }}','othor_details_table_show')">show </button>
                    <div id="othor_details_table_show"> 
                    </div> 
                </div>
                <div id="menu1" class="tab-pane fade">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',2)}}')" style="margin:10px">Add Homework Template</button> 
                             <button id="btn_Homework_table_show" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',2) }}','Homework_details_table_show')">show </button>
                    <div id="Homework_details_table_show"> 
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',3)}}')" style="margin:10px">Add Class Test  Template</button>
                       <button id="btn_class_test_table_show" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',3) }}','class_test_details_table_show')">show </button>
                    <div id="class_test_details_table_show"> 
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',4)}}')" style="margin:10px">Add Class Test Details Template</button>
                      <button id="btn_class_test_details" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',4) }}','class_test_details')">show </button>
                    <div id="class_test_details"> 
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',6)}}')" style="margin:10px">Add Medical Template</button>
                      <button id="btn_time_medical" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',6) }}','time_medical')">show </button>
                    <div id="time_medical">
                         
                    </div>
                </div>
                <div id="menu5" class="tab-pane fade">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',5)}}')" style="margin:10px">Add Time Table Template</button>
                      <button id="btn_time_table_table" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',5) }}','time_table_table')">show </button>
                    <div id="time_table_table">
                         
                    </div>
                </div>
                <div id="menu6" class="tab-pane fade">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',7)}}')" style="margin:10px">Add Absent Student Template</button>
                      <button id="btn_time_absent_student" hidden  onclick="callAjax(this,'{{ route('admin.sms.template.table',7) }}','time_absent_student')">show </button>
                    <div id="time_absent_student">
                         
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
     
 
 