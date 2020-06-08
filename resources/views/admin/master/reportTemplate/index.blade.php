@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Report Template<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <div class="row">
            <div class="col-lg-12 form-group">
              <label>Report Types</label>
              <select name="report_type" id="report_type" class="form-control" onchange="callAjax(this,'{{ route('admin.master.report.template.onchange') }}','template_table_div')">
                <option selected disabled>Select Types</option> 
                @foreach ($ReportsTypes as $ReportsType)
                 <option value="{{ $ReportsType->id }}">{{ $ReportsType->name }}</option> 
                @endforeach
              </select> 
            </div> 
          </div>
          <div id="template_table_div">
             
           </div> 
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
