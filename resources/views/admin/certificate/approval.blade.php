@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Certificate Approval  <small>List</small> </h1>
    @includeIf('admin.include.hot_menu', ['menu_type_id' => 10])  
</section>

    <section class="content">
        <div class="box"> 
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12"> 
                  <div style="width: 100%; padding-left: -10px; ">
                  <div class="table-responsive">  
                <table id="dataTable" class="table table-striped table-bordered table-responsive">
                  <thead>
                  <tr>               
                    <th>Sn. No</th>
                    <th class="text-nowrap"> Academic Year</th>
                    <th class="text-nowrap">Registration No</th>
                    <th class="text-nowrap">Certificate type</th> 
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Father Name</th> 
                    <th class="text-nowrap">Father Mobile</th> 
                    <th class="text-nowrap">Reason</th> 
                    <th class="text-nowrap">SLC No</th> 
                    <th class="text-nowrap">Udise Code</th> 
                    <th class="text-nowrap">Department School Code</th> 
                    <th class="text-nowrap">File No</th> 
                    <th class="text-nowrap">attachment</th> 
                  {{--   <th>Status</th>  --}}
                   {{--  <th>Remarks</th>  --}}
                    <th class="text-nowrap">Action</th>                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($certificates as $certificate)
                  <tr>
                    <td>{{ ++$loop->index }}</td>                  
                    <td>{{ $certificate->academicYear->name or ''}}</td>
                    <td>{{ $certificate->students->registration_no or ''}}</td>
                    @if ($certificate->certificate_type==1)
                         <td>Fee Certificate</td>             
                    @endif 
                     @if ($certificate->certificate_type==2)
                         <td>School Leaving Certificate</td>             
                    @endif  
                     @if ($certificate->certificate_type==3)
                         <td>Character Certificate</td>             
                    @endif
                      @if ($certificate->certificate_type==4)
                         <td>Date of Birth Certificate</td>             
                    @endif         
                    <td>{{ $certificate->students->name or ''}}</td>               
                    <td>{{ $certificate->students->father_name or ''}}</td>               
                    <td>{{ $certificate->students->father_mobile or ''}}</td>               
                    <td>{{ $certificate->reason }}</td>
                    <td>{{ $certificate->slc_no }}</td>
                    <td>{{ $certificate->udise_code }}</td>
                    <td>{{ $certificate->department_school_code }}</td>
                    <td>{{ $certificate->file_no }}</td>
                    <td>{{ $certificate->attachment?'Yes':'No'}}</td>
                    {{-- <td> @if ($certificate->status == 1)
                            <button class="btn btn-warning btn-xs">Pending</button> 
                         @elseif($certificate->status == 2)
                           <button class="btn btn-primary btn-xs">Virify</button> 
                         @elseif($certificate->status == 3)
                          <button class="btn btn-success btn-xs">Approval</button>
                         @elseif($certificate->status == 4)
                          <button class="btn btn-danger btn-xs">Cancel</button> 
                         @endif 
                   </td> --}}
                    {{-- <td><button class="btn_add_remarks btn btn-success btn-xs" data-id="{{ $certificate->id }}">Remarks</button></td> --}}
                    <td>  {{-- <a class="btn btn-success btn-xs" title="Certificate Approval" href="{{ route('admin.student.attachment.approval.status',$certificate->id) }}">Approval</a> --}}
                      <button class="btn btn-primary btn-xs" select2="true" title="virify" onclick="callPopupLarge(this,'{{ route('admin.student.attachment.approval.check',$certificate->id) }}')">Approval</button>
                    </td>
                     
                     

                   
                  </tr>
                  @endforeach
                  </tbody>
                   
                </table>
              </div></div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button --> 
@include('admin.certificate.remarks') 
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
        $('#dataTable').DataTable();
         responsive: true
    });
     $('#btn_certificateIssu_apply_table_show').click();
     
 </script>
@endpush
