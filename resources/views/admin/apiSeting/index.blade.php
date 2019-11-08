 @extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Api Seting<small>List</small> </h1>
       
    </section>  
    <section class="content">
       
          
          <div class="box"> 
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">SMS API</a></li>
                <li><a data-toggle="tab" href="#menu1">E-mail API</a></li> 
              </ul>

              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.api.smsApiAdd')}}')" style="margin:10px">Add SMS API</button>
                <button id="btn_outhor_table_show" hidden  onclick="callAjax(this,'{{ route('admin.api.smsApilist') }}','othor_details_table_show')">show </button>
                 <div id="othor_details_table_show">
                    
                  </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                  <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.api.emailApiAdd')}}')" style="margin:10px">Add Email API</button>
                  <button id="btn_homework_table_show" hidden onclick="callAjax(this,'{{ route('admin.api.emailApilist') }}','homework_details_table_show')">show </button>
                 <div id="homework_details_table_show">
                    
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
    $('#btn_homework_table_show').click();
    $(document).ready(function(){
        $('#sms_list').DataTable();
    });
    
  </script>
  @endpush
     
 
 
