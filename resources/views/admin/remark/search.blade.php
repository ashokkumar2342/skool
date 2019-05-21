@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Details Search</h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body"> 
                   <div class="row">
                    <div class="col-lg-4">
                     <label>Search</label>
                     <input type="text" name="search_name" class="form-control" onkeyup="callAjax(this,'{{ route('admin.student.remark.detail.search') }}','student_search_by_table')" placeholder="Search">
                    </div>                                  
                   </div> 
                     <div id="student_search_by_table">
                       
                     </div> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
       $('#student_remark_data_table').DataTable();
    </script>
    
@endpush