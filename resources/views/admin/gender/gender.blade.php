@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.gender.addform') }}')">Add Gender</button>
    <h1>Genders </h1>
       
    </section>  
    <section class="content">
      <div class="box"> 
        <div class="box-body"> 
           <table class="table" id="gender_table">
             <thead>
               <tr>
                 <th>Sr.No.</th>
                 <th>Gender Name</th>
                 <th>Code</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
              @php
                $arrayId=1;
              @endphp
              @foreach ($genders as $gender)
                       <tr>
                         <td>{{ $arrayId++ }}</td>
                         <td>{{ $gender->genders }}</td>
                         <td>{{ $gender->code }}</td>
                         <td>
                           <button type="button" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.gender.addform',$gender->id) }}')"><i class="fa fa-edit"></i></button>
                           <a href="{{ route('admin.gender.delete',$gender->id) }}" class="btn btn-xs btn-danger" title=""><i class="fa fa-trash"></i></a>
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
        $('#gender_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
