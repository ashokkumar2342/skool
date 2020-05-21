@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
  <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal"  data-target="#add_document">Add Document</button>     
    <h1>Document<small>List</small> </h1>       
    </section>  
    <section class="content">
       <button id="btn_student_document_list" data-table="document_items" class="hidden" onclick="callAjax(this,'{{ route('admin.document.list',$student->id) }}','student_document_list')"></button>
            <div class="box col-lg-12" id="student_document_list">
              
            </div>
    </section>
    <!-- /.content -->

@endsection
@include('admin.student.studentdetails.include.add_document')
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
      $('#').click();
    });
        $('#btn_student_document_list').click();
 </script>
  @endpush
     
 
 