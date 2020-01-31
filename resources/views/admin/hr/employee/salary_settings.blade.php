@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn-sm btn-info pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.hr.master.salary.settings.add')}}')">Add Salary Settings</button>
    <h1>Salary Settings<small>List</small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <table class="table" id="salary_settings_table">
                <thead>
                  <tr>
                    <th>Employee Code</th>
                    <th>Employee Name</th>
                    <th>Pay Head Type</th>
                    <th>Unit</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($salarySettings as $salarySetting)
                          <tr>
                            <td>{{ $salarySetting->employees->code or ''}}</td>
                            <td>{{ $salarySetting->employees->name or '' }}</td>
                            <td>{{ $salarySetting->unit }}</td>
                            <td>{{ $salarySetting->Payheads->name or '' }}</td>
                            <td>{{ $salarySetting->type==1?'Amount':'Percentage' }}</td>
                            <td>
                              <a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.hr.master.salary.settings.add',Crypt::encrypt($salarySetting->id))}}')"><i class="fa fa-edit"></i></a>

                    <a onclick="callAjax(this,'{{ route('admin.hr.employee.delete',Crypt::encrypt($salarySetting->id)) }}')" button-click="btn_event_type_table_show" success-popup="true" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr> 
                  @endforeach
                </tbody>
              </table>
           
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
        $('#salary_settings_table').DataTable();
    });

     
  </script>
  @endpush
     
 
 