@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    {{-- <button type="button" class="btn btn-info pull-right" multi-select="true" onclick="callPopupLarge(this,'{{ route('admin.class.period.schedule.addform')}}')" style="margin:10px">Create New</button> --}}
    <h1>Class Period Schedule<small>list</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
        <form action="{{ route('admin.class.period.schedule.store') }}"  method="post" no-reset="false" class="add_form">
              {{ csrf_field() }}         
          <div class="box"> 
            <div class="box-body"> 
              <div class="row">
                <div class="col-lg-4">
                  <label>Time Table Type</label>
                  <select name="time_table_type" id="time_table_type" class="form-control" multiselect-form="true">
                    <option  selected disabled>Select Type</option>
                    @foreach ($timeTableTypes as $timeTableType) 
                    <option value="{{ $timeTableType->id }}">{{ $timeTableType->name }}</option> 
                     @endforeach 
                  </select> 
                </div>
                <div class="col-lg-4">
                <label>Class</label>
                <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.class.period.schedule.show') }}'+'?time_table_type_id='+$('#time_table_type').val(),'history_wise_timing')"> 
                  <option  selected disabled>Select Class</option>
                  @foreach ($classTypes as $classType) 
                  <option value="{{ $classType->id }}">{{ $classType->name }}</option> 
                   @endforeach 
                </select> 
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
     $(document).ready(function(){
        $('#author_table').DataTable();
    });

     $('#btn_outhor_table_show').click();
  </script>
  @endpush
     
 
 