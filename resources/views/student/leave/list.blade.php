@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
  <button type="button" class="btn btn-info btn-sm pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('student.leave.apply.form') }}')">Leave Apply</button>     
    <h1>Leave Apply<small>List</small> </h1>       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box table-responsive">
            <table class="table table-striped table-responsive table-bordered" id="leave_record_table">
  <thead>
    <tr>
      <th>Academic year</th>
      <th>Leave Type</th>
      <th>Student Name</th>
      <th>Apply Date</th>
      <th>From Date</th>
      <th>To Date</th>
      <th>Remark</th>
      <th>Attachment</th>
      <th>Status</th>
      {{-- <th>Action</th> --}}
    </tr>
  </thead>
  <tbody>
    @foreach ($leaveRecords as $leaveRecord)
       
    <tr style="@if ($leaveRecord->status==1) background-color: #61e66b @endif @if ($leaveRecord->status==2) background-color: #f64d56 @endif @if ($leaveRecord->status==0) background-color:#f8af3b @endif">
      <td>{{ $leaveRecord->academicYear->name or '' }}</td>
      <td>{{ $leaveRecord->leaveTypes->name or '' }}</td>
      <td>{{ $leaveRecord->students->name or '' }}</td>
      <td>{{ date('d-m-Y',strtotime( $leaveRecord->apply_date))}}</td>
      <td>{{ date('d-m-Y',strtotime( $leaveRecord->from_date))}}</td>
      <td>{{ date('d-m-Y',strtotime( $leaveRecord->to_date))}}</td>
      <td>{{$leaveRecord->remark}}</td>
      <td><a href="{{ route('admin.attendance.leave.delete',$leaveRecord->attachment) }}" target="blank" style="margin:10px">{{ $leaveRecord->attachment?'Open the Attachment!' : '' }}</a></td>
       
       @if ($leaveRecord->status==0)
        <td >Pending</td> 
       @endif
       @if ($leaveRecord->status==1)
        <td >Approval</td> 
       @endif
       @if ($leaveRecord->status==2)
        <td >Reject </td> 
       @endif
      {{-- <td>
        <button type="button" class="btn btn-info btn-xs" select2="true" onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.apply',$leaveRecord->id) }}')"><i class="fa fa-edit"></i></button>
        <a href="#"  onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.delete',$leaveRecord->id) }}')" title="View" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
      </td> --}}
       
       
       
    </tr>
    @endforeach
  </tbody>
</table>
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
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#leave_record_table').DataTable();
    });
 </script>
  @endpush
     
 
 