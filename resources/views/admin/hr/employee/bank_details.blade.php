@extends('admin.layout.base')
@section('body')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <section class="content-header">
    <button type="button" class="btn-sm btn-info pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.hr.employee.bank.details.add')}}')">Add Bank Details</button>
    <h1>Empolyee Bank Details<small>List</small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.hr.employee.bank.details.show') }}" method="post" class="add_form" success-content-id="employee_bank_details_list" no-reset="true" data-table-without-pagination="employee_bank_details_list_table">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-4">
                    <label>Designation</label>
                    <select name="designation_id" class="form-control" onchange="callAjax(this,'{{ route('admin.hr.designation.wise.employee') }}','select_employee_name_id')">
                       <option selected disabled>Select Designation</option> 
                       <option value="0">All</option> 
                       @foreach ($Designations as $Designation)
                        <option value="{{ $Designation->id }}">{{ $Designation->name }}</option>  
                       @endforeach
                    </select> 
                  </div>
                  <div class="col-lg-4">
                    <label>Employee Name</label>
                    <select name="employee_id" class="form-control" id="select_employee_name_id">
                       <option selected disabled>Select Employee</option> 
                    </select> 
                  </div>
                  <div class="col-lg-4">
                    <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
                  </div> 
                </div> 
              </form>
              <div id="employee_bank_details_list" style="margin-top: 30px">
                 
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
    $('#class_section').DataTable( {
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
 
 