@extends('admin.layout.base')
@section('body')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"> 
  <section class="content-header">  
    <h1>Email Template<small>Details</small> </h1> 
  </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Message Purpose</label>
                  <select name="message_purpose" id="message_purpose_box"  class="form-control" data-table-without-pagination-disable-sorting="author_table" onchange="callAjax(this,'{{ route('admin.email.template.onchange') }}','sms_history_table')">
                    <option selected disabled>Select Message Purpose</option>
                      @foreach ($messagePurposes as $messagePurpose)
                        <option value="{{ $messagePurpose->id }}">{{ $messagePurpose->name }}</option> 
                       @endforeach 
                  </select> 
                </div> 
              </div>
              <div class="table-responsive" id="sms_history_table">
                 
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
    $('#author_table').DataTable( { 
    
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
     
 
 