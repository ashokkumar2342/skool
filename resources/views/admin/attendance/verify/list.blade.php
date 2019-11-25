@extends('admin.layout.base')
@section('body') 
<section class="content-header">
   
<h1> Leave Approval</h1>
     
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
              <table class="table table-striped table-responsive table-bordered" id="leave_record_table">
                <thead>
                  <tr>
                    <th>Academic year</th>
                    <th>Leave Type</th>
                    <th>student Name</th>
                    <th>Apply Date</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($leaveRecords as $leaveRecord)
                     
                  <tr>
                    <td>{{ $leaveRecord->academicYear->name or '' }}</td>
                    <td>{{ $leaveRecord->leaveTypes->name or '' }}</td>
                    <td>{{ $leaveRecord->students->name or '' }}</td>
                    <td>{{ date('d-m-Y',strtotime( $leaveRecord->apply_date))}}</td>
                    <td>{{ date('d-m-Y',strtotime( $leaveRecord->from_date))}}</td>
                    <td>{{ date('d-m-Y',strtotime( $leaveRecord->to_date))}}</td>
                    <td>
                      <button type="button" class="btn btn-info btn-xs" select2="true" onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.verify.form',$leaveRecord->id) }}')">Approval</i></button>
                       
                    </td>
                     
                     
                     
                  </tr>
                  @endforeach
                </tbody>
              </table> 
                      
            </div> 
        </div> 
    </section>
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript">
   $('#btn_click_list_show').click();  
   $('#leave_record_table').DataTable();  
 </script>

 
 
  
@endpush