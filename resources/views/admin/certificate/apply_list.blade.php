@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Certificate Issue Apply  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.student.certificateIssu.apply') }}" class="btn btn-info btn-sm" >Apply</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>Sn. No</th>
                  <th>Registration No</th>
                  <th>Certificate type</th>
                  
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th>Father Mobile</th> 
                  <th>Reason</th> 
                  <th>attachment</th> 
                  <th>Status</th> 
                  <th>Remarks</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $certificate)
                <tr>
                  <td>{{ ++$loop->index }}</td>                  
                  <td>{{ $certificate->students->registration_no }}</td>               
                  <td>{{ $certificate->certificate_type }}</td>               
                  <td>{{ $certificate->students->name }}</td>               
                  <td>{{ $certificate->students->father_name }}</td>               
                  <td>{{ $certificate->students->father_mobile }}</td>               
                  <td>{{ $certificate->reason }}</td>
                  <td>{{ $certificate->attachment?'Yes':'No'}}</td>
                  <td> @if ($certificate->status == 1)
                          <button class="btn btn-primary btn-xs">On Active</button> 
                       @elseif($certificate->status == 2)
                         <button class="btn btn-warning btn-xs">Pending</button> 
                       @elseif($certificate->status == 3)
                        <button class="btn btn-success btn-xs">Approval</button>
                       @elseif($certificate->status == 4)
                        <button class="btn btn-danger btn-xs">Cancel</button> 
                       @endif 
                 </td>
                  <td><button class="btn_add_remarks btn btn-success btn-xs" data-id="{{ $certificate->id }}">Remarks</button></td>
                   
                  
                  <td width="200">
                   <a class="btn btn-warning btn-xs" title="View certificate" href="{{ route('admin.student.attachment.virify',$certificate->id) }}">Verify</a>
                   <a class="btn btn-success btn-xs" title="View certificate" href="{{ route('admin.student.attachment.approval',$certificate->id) }}">Approval</a>                   

                   <a class="btn btn-primary btn-xs" title="View certificate" href="{{ route('admin.student.attachment.download',$certificate->id) }}"><i class="fa fa-download"></i></a> 

                    <a class="btn btn-warning btn-xs"  title="Edit certificate" href="{{ route('admin.student.certificateIssu.edit',$certificate->id) }}"><i class="fa fa-edit"></i> 

                    <a class="btn btn-info btn-xs"  title="view certificate" href="{{ route('admin.student.certificateIssu.show',$certificate->id) }}" style="margin-left: 3px;"><i class="fa fa-sticky-note"></i>
                     
                   {{--  @if (Auth::guard('admin')->user()->id == 1)
                    <a style="margin-left: 3px;" onclick="return confirm('Are you sure to delete certificate.')" class="btn btn-danger btn-xs" title="delete certificate" href="{{ route('admin.student.certificateIssu.edit',$certificate->id) }}"><i class="fa fa-trash"></i></a> 
                    @endif --}}
                    
                  </td>

                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
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
    });
     
 </script>
@endpush