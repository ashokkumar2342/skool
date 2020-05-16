@extends('admin.layout.base')
@section('body') 
<section class="content-header">
  <button type="button" class="btn btn-info btn-sm pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.addform') }}')">Add Leave Type</button>
<h1> Leave Type Lists</h1> 
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
              <div class="table-responsive">
               <table class="table table-striped table-bordered" id="leave_type_student">
                 <thead>
                   <tr>
                     <th>Sr.No.</th>
                     <th>Name</th>
                     <th>code</th>
                     <th>Total Days</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                  @php
                    $id=1
                  @endphp
                  @foreach ($leaveTypes as $leaveTypes)
                         <tr>
                           <td>{{ $id++ }}</td>
                           <td>{{ $leaveTypes->name }}</td>
                           <td>{{ $leaveTypes->leave_code }}</td>
                           <td>{{ $leaveTypes->total_days }}</td>
                           <td>
                            {{-- @if(App\Helper\MyFuncs::menuPermission()->r_status == 1)  --}}
                             <button  class="btn btn-info btn-xs" title="Edit" select2="true" onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.addform',Crypt::encrypt($leaveTypes->id)) }}')"><i class="fa fa-edit"></i></button>
                            {{-- @endif --}}
                            {{-- @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)  --}}
                              <a href="{{ route('admin.attendance.leave.type.delete',Crypt::encrypt($leaveTypes->id)) }}" onclick="return confirm('Are you sure to delete this data ?')" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                            {{-- @endif --}}
                           </td>
                         </tr> 
                  @endforeach
                 </tbody>
               </table>
             </div>
                             
                      
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
   $('#leave_type_student').DataTable();  
 </script>

 
 
  
@endpush