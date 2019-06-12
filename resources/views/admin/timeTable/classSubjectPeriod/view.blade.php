@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    
    <h1>Class Subject Period<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
              
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.class.subject.period.store') }}" method="post" class="add_form">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-4">
                    <label>Class</label></br>
                    <select name="class_id[]" class="form-control multiselect"  multiple="multiple" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.class.subject.period.class.wise.section') }}','select_section')">
                     
                      @foreach($classTypes as $classType)
                      <option value="{{ $classType->id }}">{{ $classType->name }}</option> 
                      @endforeach 
                    </select> 
                  </div>
                  <div id="select_section">
                    
                  </div>
                 
                  <div class="col-lg-4">
                    <label>No of Period</label>
                    <input type="text" name="no_of_period" class="form-control"> 
                  </div>
                   <div class="col-lg-4">
                    <label>Period Duration</label>
                    <input type="text" name="period_duration" class="form-control"> 
                  </div>
                  
                </div>
                <div class="col-lg-12 text-center">
                  
                <input type="submit" class="btn btn-success" value="Submit" style="margin-top: 10px">
                </div>
                 
                 
              </form>
               
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
     $(document).ready(function(){
        $('#datatable').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_book_accession_table_show').click();
  

  </script>
  @endpush
     
 
 