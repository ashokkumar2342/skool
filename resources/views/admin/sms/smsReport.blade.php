@extends('admin.layout.base') 
@section('body')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<section class="content-header">
    <h1> SMS/Email Report</h1>
      <ol class="breadcrumb"> 
      </ol>
</section>
    <section class="content"> 
      	<div class="box"> 
            <div class="box-body">
                <form action="{{ route('admin.sms.smsReport.filter') }}" method="post" class="add_form" success-content-id="sms_history_table" no-reset="true" data-table-without-pagination="sms_history_datatable">
                  {{ csrf_field() }} 
                    <div class="panel panel-default"> 
                      <div class="panel-body">
                       <div class="col-lg-4">
                       <div class="form-group">
                         <label>Message Purpose</label>
                         <select name="message_purpose_id" class="form-control">
                          <option value="0">All</option>
                           @foreach ($messagePurposes as $messagePurpose)
                                <option value="{{ $messagePurpose->id }}">{{ $messagePurpose->name }}</option>  
                           @endforeach
                         </select> 
                       </div> 
                     </div> 
                  </div>
                </div>
                 <div class="panel panel-default"> 
                    <div class="panel-body">
                     <div class="col-lg-4">
                     <div class="form-group">
                       <label>Sent By</label>
                      <select name="sent_by" class="form-control select2">
                        <option value="0">All</option>
                        @foreach ($admins as $admin)
                             <option value="{{ $admin->id }}">{{ $admin->email }} ({{ $admin->first_name }})</option>  
                        @endforeach
                      </select>
                     </div> 
                   </div> 
                </div>
              </div>
              
               <div class="panel panel-default"> 
                  <div class="panel-body">
                   <div class="col-lg-4">
                   <div class="form-group">
                     <label>Sent To</label>
                     <select name="sent_to" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.sms.smsReport.type') }}','sent_to_div')">
                     <option value="0">All</option>
                      <option value="1">Student</option>
                      <option value="2">Staff</option>
                      <option value="3">User</option> 
                    </select>
                   </div> 
                 </div> 
                 <div id="sent_to_div"> 
                  </div> 
              </div>
            </div>
            <div class="panel panel-default"> 
                  <div class="panel-body">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Mobile No.</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div> 
                  </div>  
                    <div class="col-lg-4">
                    <div class="form-group"> 
                      <label> Form Date</label> 
                    <input type="date" name="from_date" class="form-control ">
                    </div> 
                  </div> 
                  <div class="col-lg-4">
                    <div class="form-group"> 
                      <label>To Date</label> 
                    <input type="date" name="to_date" class="form-control ">
                    </div> 
                  </div> 
              </div>
            </div>
                <div class="col-lg-12 text-center">
                  <div class="form-group"> 
                    <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px"> 
                  </div> 
                </div>
        </form>  
               <div class="table-responsive col-lg-12" id="sms_history_table"> 
              </div> 
            </div> 
        </div> 
    </section> 
@endsection
 @push('scripts') 
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" src="////cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
  
  <script> 
 <script type="text/javascript">
   $(function() { 
  $('input[name="daterange"]').daterangepicker({
     autoUpdateInput: true,
       
  });
    
});
 </script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


@endpush