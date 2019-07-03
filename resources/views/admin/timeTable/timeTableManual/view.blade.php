@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    {{-- <button type="button" class="btn btn-info pull-right" multi-select="true" onclick="callPopupLarge(this,'{{ route('admin.class.period.schedule.addform')}}')" style="margin:10px">Create New</button> --}}
    <h1>Manual Time Table<small>View</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
        <form action="{{ route('admin.time.table.manual.store') }}"  method="post" class="add_form" no-reset="true" {{-- content-refresh="history_wise_timing" --}} button-click="btn_section_wise_show">
              {{ csrf_field() }}         
          <div class="box"> 
            <div class="box-body"> 
              <div class="row">
                <div class="col-lg-4">
                  <label>Time Table Type</label>
                  <select name="time_table_type" id="time_table_type" class="form-control" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.time.table.manual.button.wise.final.result') }}'+'?time_table_type_id='+$('#time_table_type').val()+'&class_id='+$('#class_id').val()+'&section_id='+$('#section_id').val(),'history_wise_final_result')">
                    <option  selected disabled>Select Type</option>
                    @foreach ($timeTableTypes as $timeTableType) 
                    <option value="{{ $timeTableType->id }}">{{ $timeTableType->name }}</option> 
                     @endforeach 
                  </select> 
                </div>
                <div class="col-lg-4">
                <label>Class</label>
                <select name="class" class="form-control" id="class_id" onchange="callAjax(this,'{{ route('admin.time.table.manual.class.wise.section') }}'+'?time_table_type_id='+$('#time_table_type').val()+'&class_id='+$('#class_id').val(),'class_wise_section')"> 
                  <option  selected disabled>Select Class</option>
                  @foreach ($classTypes as $classType) 
                  <option value="{{ $classType->id }}">{{ $classType->name }}</option> 
                   @endforeach 
                </select> 
                </div> 
               <div id="class_wise_section">
                 
               </div>
                
          </div>
        </div>
        <div class="box"> 
          <div class="box-body">
            <div id="history_wise_timing">
              
            </div>
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
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     

    // $('#btn_section_wise_show_result').click();
  </script>
  @endpush
     
 
 