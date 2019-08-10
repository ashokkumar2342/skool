@extends('admin.layout.base')
@push('links')
<style type="text/css" media="screen">
  .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: left;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
  }
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
                <div class="col-lg-3">
                  <label>Select Template</label>
                  <select name="template_name" class="form-control">
                    <option selected disabled>Select Template</option> 
                    @foreach ($studentIDCards as $studentIDCard) 
                    <option value="{{ $studentIDCard->id }}">{{ $studentIDCard->name }}</option> 
                    @endforeach
                  </select> 
                </div>
                 <div class="col-lg-4" style="padding-top: 20px"> 
                 <label>Student ID Card</label>
                <input type="checkbox" name="student_idcard" value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>Perent ID Card</label>
                <input type="checkbox" name="perent_idcard" value="2">
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
    </script>
    
@endpush