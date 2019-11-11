@extends('admin.layout.base')
@section('body')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <section class="content-header"> 
    <h1>Document Report<small>Show</small> </h1>
       
    </section>  
    <section class="content">
      
          <div class="box"> 
            <div class="box-body">
                <div class="card card-primary card-outline"> 
                  <div class="card-body">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Document</a></li>
                    <li><a data-toggle="tab" href="#menu1">Without Document</a></li>
                    <li><a data-toggle="tab" href="#menu2">Without Image</a></li>
                  </ul> 
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                       <form action="{{ route('admin.document.filter') }}" method="post" class="add_form" success-content-id="result_table" data-table-without-pagination="result_datatable" no-reset="true">
                          {{ csrf_field() }}
                          <div class="row" style="margin-top: 20px"> 
                          <div class="col-lg-2">
                            <label>Document Type</label>
                             <select name="document_type_id" class="form-control">
                               <option selected disabled>Select Document</option>
                               @foreach ($documentTypes as $documentType)
                                      <option value="{{ $documentType->id }}">{{ $documentType->name }}</option> 
                                @endforeach 
                             </select> 
                          </div>
                          <input type="hidden" name="document_wise" value="1">
                          <div class="col-lg-2">
                            <label>Report For</label>
                             <select name="report_for" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.student.final.report.for.change') }}','report_for_div')">
                               <option selected disabled>Select Document</option>
                               @foreach ($reportFors as $reportFor)
                                      <option value="{{ $reportFor->id }}">{{ $reportFor->name }}</option> 
                                @endforeach 
                             </select> 
                          </div>
                          <div id="report_for_div">
                            
                          </div>
                          <div class="col-lg-2">
                            <input type="submit" class="btn btn-success" value="Show" style="margin-top:  23px"> 
                          </div>
                          </div>
                        </form>
                        <div id="result_table" style="margin-top:10px"> 
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <form action="{{ route('admin.document.filter') }}" method="post" class="add_form" success-content-id="result_table_page" no-reset="true" data-table-without-pagination="without_document">
                          {{ csrf_field() }}
                          <div class="row" style="margin-top: 20px"> 
                           <div class="col-lg-2">
                            <label>Document Type</label>
                             <select name="document_type_id" class="form-control">
                                <option selected disabled>Select Document</option>
                               @foreach ($documentTypes as $documentType)
                                      <option value="{{ $documentType->id }}">{{ $documentType->name }}</option> 
                                @endforeach 
                             </select> 
                          </div>
                          <input type="hidden" name="without_document_wise" value="1">
                          <div class="col-lg-2">
                            <label>Report For</label>
                             <select name="report_for" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.student.final.report.for.change') }}','report_for')">
                               <option selected disabled>Select Document</option>
                               @foreach ($reportFors as $reportFor)
                                      <option value="{{ $reportFor->id }}">{{ $reportFor->name }}</option> 
                                @endforeach 
                             </select> 
                          </div>
                          <div id="report_for"> 
                          </div>
                          <div class="col-lg-2">
                            <input type="submit" class="btn btn-success" value="Show" style="margin-top:  24px"> 
                          </div>
                        </div>
                        
                        </form>
                          <div id="result_table_page" style="margin-top:10px">
                            
                          </div>
                       </div> 
                    
                    <div id="menu2" class="tab-pane fade">
                      <form action="{{ route('admin.document.filter') }}" method="post" class="add_form" success-content-id="image_result_table_page" data-table-without-pagination="without_image_list" no-reset="true">
                          {{ csrf_field() }}
                          <div class="row" style="margin-top: 20px"> 
                            
                          <input type="hidden" name="without_image_wise" value="1">
                          <div class="col-lg-2">
                            <label>Report For</label>
                             <select name="report_for" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.student.final.report.for.change') }}','without_report_for')">
                               <option selected disabled>Select Document</option>
                               @foreach ($reportFors as $reportFor)
                                      <option value="{{ $reportFor->id }}">{{ $reportFor->name }}</option> 
                                @endforeach 
                             </select> 
                          </div>
                          <div id="without_report_for">
                            
                          </div>
                          <div class="col-lg-2">
                            <input type="submit" class="btn btn-success" value="Show" style="margin-top:  24px"> 
                          </div>
                        </div>
                        </form>
                          <div id="image_result_table_page" style="margin-top:10px">
                            
                          </div>
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
     
      $(document).ready(function() {
    $('#result_datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    } );
} );
      $(document).ready(function() {
    $('#without_document').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    } );
} );
      $(document).ready(function() {
    $('#without_image_list').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    } );
} );
       
   

      
  </script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  @endpush
     
 
 