@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Request List<small></small> </h1>
      <ol class="breadcrumb"> 
      </ol>
</section>

    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <div class="table-responsive"> 
            <table class="table table-responsive" id="request_table" >
                 <thead>
                     <tr>
                         <th class="text-nowrap">Registration No</th>
                         <th class="text-nowrap">Name</th>
                         <th class="text-nowrap">Nick Name</th>
                         <th class="text-nowrap">Father's Name</th>
                         <th class="text-nowrap">Mother's Name</th>
                         <th class="text-nowrap">Father's Mobile No.</th>
                         <th class="text-nowrap">Mother's Mobile No.</th>
                         <th class="text-nowrap">Date of Birth</th>
                         <th class="text-nowrap">Parmanent Address</th>
                         <th class="text-nowrap">Corespondance Address</th>
                         <th class="text-nowrap">Date</th>
                     </tr>
                 </thead>
                 <tbody>
                    @foreach($studentRequests as $studentRequest)
                     <tr>
                         {{-- <td>{{ $studentRequest->students->name }}</td> --}}
                         <td>{{ $studentRequest->students->registration_no }}</td>
                         <td>{{ $studentRequest->name }}</td>
                         <td>{{ $studentRequest->nick_name }}</td>
                         <td>{{ $studentRequest->father_name }}</td>
                         <td>{{ $studentRequest->mother_name }}</td>
                         <td>{{ $studentRequest->mother_mobile }}</td>
                         <td>{{ $studentRequest->mother_mobile }}</td> 
                         <td>{{ $studentRequest->dob }}</td>
                         <td>{{ $studentRequest->p_address }}</td>
                         <td>{{ $studentRequest->c_address }}</td>
                         <td>{{ date('d-m-Y',strtotime($studentRequest->created_at)) }}</td>
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
     $(document).ready(function(){
        $('#request_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
 