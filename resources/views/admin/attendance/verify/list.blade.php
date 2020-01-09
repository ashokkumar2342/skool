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
                    <th class="text-nowrap">Academic year</th>
                    <th class="text-nowrap">Leave Type</th>
                    <th class="text-nowrap">student Name</th>
                    <th class="text-nowrap">Apply Date</th>
                    <th class="text-nowrap">From Date</th>
                    <th class="text-nowrap">To Date</th>
                    <th class="text-nowrap">Remark</th>
                    <th class="text-nowrap">Attachment</th>
                    <th class="text-nowrap">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($leaveRecords as $leaveRecord)
                     
                  <tr>
                    <td class="text-nowrap">{{ $leaveRecord->academicYear->name or '' }}</td>
                    <td class="text-nowrap">{{ $leaveRecord->leaveTypes->name or '' }}</td>
                    <td class="text-nowrap">{{ $leaveRecord->students->name or '' }}</td>
                    <td class="text-nowrap">{{ date('d-m-Y',strtotime( $leaveRecord->apply_date))}}</td>
                    <td class="text-nowrap">{{ date('d-m-Y',strtotime( $leaveRecord->from_date))}}</td>
                    <td class="text-nowrap">{{ date('d-m-Y',strtotime( $leaveRecord->to_date))}}</td>
                    <td class="text-nowrap">{{$leaveRecord->remark}}</td>
                    <td><a href="{{ route('admin.attendance.leave.delete',$leaveRecord->attachment) }}" target="blank" style="margin:10px">{{ $leaveRecord->attachment?'Open the Attachment!' : '' }}</a></td>
                    <td class="text-nowrap">
                      {{-- <a href="#"  onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.delete',$leaveRecord->id) }}')" title="View" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a> --}}
                      <a href="{{ route('admin.attendance.leave.verify.form',$leaveRecord->id) }}" class="btn btn-info btn-xs" title="Approval">Approval</a>
                      <a href="{{ route('admin.attendance.leave.verify.store',$leaveRecord->id) }}" class="btn btn-danger btn-xs" title="Approval">Reject</a>

                       
                       
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