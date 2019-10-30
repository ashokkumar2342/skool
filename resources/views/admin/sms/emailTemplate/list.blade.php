 @extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    {{-- <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',)}}')" style="margin:10px">Add Template</button> --}}
    <h1>Email Template List<small>Details</small> </h1>
       
    </section>  
    <section class="content">
              
                  
          
          {{-- <button id="btn_outhor_table_show" hidden data-table="author_table" onclick="callAjax(this,'{{ route('admin.email.template.table') }}','othor_details_table_show')">show </button> --}}
          <div class="box"> 
            <div class="box-body">
           <div class="card card-primary card-outline"> 
          <div class="card-body">
            
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="false">Birthday</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Homework</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Class Test</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="true">Class Test Detail</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-time-table-tab" data-toggle="pill" href="#custom-content-below-time-table" role="tab" aria-controls="custom-content-below-time-table" aria-selected="true">Time Table</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-medical-tab" data-toggle="pill" href="#custom-content-below-medical" role="tab" aria-controls="custom-content-below-medical" aria-selected="true">Medical</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-absent-student-tab" data-toggle="pill" href="#custom-content-below-absent-student" role="tab" aria-controls="custom-content-below-absent-student" aria-selected="true">Absent Student</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',1)}}')" style="margin:10px">Add Birthday Template</button>
                <button id="btn_outhor_table_show" hidden  onclick="callAjax(this,'{{ route('admin.email.template.table',1) }}','othor_details_table_show')">show </button>
                 <div id="othor_details_table_show">
                    
                  </div> 
              </div>
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',2)}}')" style="margin:10px">Add Homework Template</button>
                  <button id="btn_homework_table_show" hidden  onclick="callAjax(this,'{{ route('admin.email.template.table',2) }}','homework_details_table_show')">show </button>
                 <div id="homework_details_table_show">
                    
                  </div>  
              </div>
              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',3)}}')" style="margin:10px">Add Class Test Template</button>
                  <button id="btn_classtest_table_show" hidden  onclick="callAjax(this,'{{ route('admin.email.template.table',3) }}','classtest_details_table_show')">show </button>
                 <div id="classtest_details_table_show">
                    
                  </div> 
              </div>
              <div class="tab-pane fade " id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',4)}}')" style="margin:10px">Add Class Test Detail Template</button>
                  <button id="btn_class_test_detail_table_show" hidden  onclick="callAjax(this,'{{ route('admin.email.template.table',4) }}','class_test_detail_table_show')">show </button>
                 <div id="class_test_detail_table_show">
                    
                  </div>  
              </div>
              <div class="tab-pane fade" id="custom-content-below-time-table" role="tabpanel" aria-labelledby="custom-content-below-time-table-tab">
                <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',5)}}')" style="margin:10px">Add Time Table Template</button>
                  <button id="btn_time_table_show" hidden  onclick="callAjax(this,'{{ route('admin.email.template.table',5) }}','time_table_show')">show </button>
                 <div id="time_table_show">
                    
                  </div>  
              </div> 
            <div class="tab-pane fade" id="custom-content-below-medical" role="tabpanel" aria-labelledby="custom-content-below-medical-tab">
                <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',6)}}')" style="margin:10px">Add Medical Template</button>
                  <button id="btn_medical_show" hidden  onclick="callAjax(this,'{{ route('admin.email.template.table',6) }}','medical_show')">show </button>
                 <div id="medical_show">
                    
                  </div>  
              </div>
              <div class="tab-pane fade" id="custom-content-below-absent-student" role="tabpanel" aria-labelledby="custom-content-below-absent-student-tab">
                <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',7)}}')" style="margin:10px">Add Absent Student Template</button>
                  <button id="btn_absent_student_show" hidden  onclick="callAjax(this,'{{ route('admin.email.template.table',7) }}','absent_student_show')">show </button>
                 <div id="absent_student_show">
                    
                  </div>  
              </div>
            </div>
             
          </div>
          <!-- /.card -->
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
     $('#btn_homework_table_show').click();
     $('#btn_classtest_table_show').click();
     $('#btn_class_test_detail_table_show').click();
     $('#btn_time_table_show').click();
     $('#btn_medical_show').click();
     $('#btn_absent_student_show').click();
  </script>
  @endpush
     
 
