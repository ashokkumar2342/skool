@extends('admin.layout.base')
@push('links')
<style type="text/css" media="screen">
   
</style>
@endpush
@section('body')
<section class="content-header">
    <h1>Student Identity Card Generate</h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
            <form action="{{ route('admin.student.idcard.generate.store') }}" method="get" target="blank">               
              <div  class="row">
                <div class="col-lg-3">
                  <label>Select For</label>
                  <select name="report_for" class="form-control" select2="true" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.student.idcard.generate.classwise') }}','class_wise')">
                    <option selected disabled>Select For</option> 
                    @foreach ($reportFors as $reportFor) 
                    <option value="{{ $reportFor->id }}">{{ $reportFor->name }}</option> 
                    @endforeach
                  </select> 
                </div>
                <div id="class_wise"> 
                 </div> 
                
                 <div class="col-lg-1" style="padding-top: 20px"> 
                  
                <input type="radio" name="barcode" checked="" hidden="" id="student_idcard" value="1">
                 </div>
                <div class="col-lg-3" style="padding-top: 20px"> 
                 <label>Student ID Card</label>
                <input type="radio" name="student_idcard" checked="" id="student_idcard" value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>Perent ID Card</label>
                <input type="radio" name="student_idcard" id="perent_idcard" value="2">
                </div>
              </div>
              <div class="row text-center">
                <input type="submit" value="Generate" class="btn btn-success" style="margin: 15px">
                
              </div>
                
                
             </form> 
               
            </div> 
        </div>
          

            

           
 
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
       $(document).ready(function(){
     
        $("#student_idcard").prop("checked", true);
    });
    $(".check-female").click(function(){
        $("#perent_idcard").prop("checked", true);
    });
 
    </script>
    
@endpush