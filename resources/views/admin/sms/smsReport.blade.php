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
                 <div class="row"> 
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label>Message Purpose</label>
                      <select name="message_purpose_id" class="form-control">
                        @foreach ($messagePurposes as $messagePurpose)
                             <option value="{{ $messagePurpose->id }}">{{ $messagePurpose->name }}</option>  
                        @endforeach
                      </select> 
                    </div> 
                  </div> 
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label>User Name</label>
                      <select name="user_id" class="form-control select2">
                        @foreach ($admins as $admin)
                             <option value="{{ $admin->id }}">{{ $admin->email }} ({{ $admin->first_name }})</option>  
                        @endforeach
                      </select> 
                    </div> 
                  </div> 
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label>Student Name</label>
                      <select name="student_id" class="form-control select2">
                        @foreach ($students as $student)
                             <option value="{{ $student->id }}">{{ $student->registration_no }} ({{ $student->name }})</option>  
                        @endforeach
                      </select> 
                    </div> 
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label>Class</label>
                      <select name="class_id" class="form-control">
                        @foreach ($classes as $class)
                             <option value="{{ $class->id }}">{{ $class->name }}</option>  
                        @endforeach
                      </select> 
                    </div> 
                  </div> 
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label>Mobile No.</label>
                      <input type="number" name="mobile_no" class="form-control" placeholder="Enter Mobile No."> 
                    </div> 
                  </div> 
                    <div class="col-lg-4">
                    <div class="form-group"> 
                      <label>Date Range</label> 
                    <input type="text" name="daterange" class="form-control ">
                    </div> 
                  </div> 
                  </div>
                  <div class="col-lg-12 text-center">
                    <div class="form-group"> 
                      <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px"> 
                    </div> 
                  </div> 
                </form> 
              <div id="sms_history_table" style="margin-top: 20px">
                
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