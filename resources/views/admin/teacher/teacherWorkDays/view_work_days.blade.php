@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    {{-- <button type="button" class="btn btn-info pull-right" multi-select="true" onclick="callPopupLarge(this,'{{ route('admin.class.period.schedule.addform')}}')" style="margin:10px">Create New</button> --}}
    <h1>Teacher Work Schedule<small>list</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
        <form action="{{ route('admin.teacher.working.schedule.store') }}" method="post" class="add_form">
              {{ csrf_field() }}         
          <div class="box"> 
            <div class="box-body"> 
              <div class="row">
                <div class="col-lg-4">
                  <label>Time Table Type</label>
                  <select name="time_table_type" class="form-control" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.teacher.working.schedule.show') }}','teacher_working_schedule_show')">
                    <option  selected disabled>Select Type</option>
                    @foreach ($timeTableTypes as $timeTableType) 
                    <option value="{{ $timeTableType->id }}">{{ $timeTableType->name }}</option> 
                     @endforeach 
                  </select> 
                </div> 
                
          </div>
        </div>
        <div class="box"> 
          <div class="box-body">
            <div id="teacher_working_schedule_show">
              
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
     
 
 