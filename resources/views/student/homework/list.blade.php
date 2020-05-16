@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
      <button class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.room.details.edit')}}')">Add Room</button> 
    <h1>Rooms<small>Details</small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <div class="table-responsive">
                     <table class="table m-0" id="class_homework_data_table">
                       <thead>
                       <tr>
                         <th>Date</th> 
                         <th>Homework</th>
                         <th>Action</th> 
                       </tr>
                       </thead>
                       <tbody>
                        @foreach ($homeworks as $homework)   
                       <tr>
                         <td>{{ date('d-m-Y',strtotime($homework->date)) }}</td>
                         <td> {{ $homework->homework }} </td>
                         <td>
                             <button type="homework" onclick="callPopupLarge(this,'{{ route('student.homework.view',$homework->id) }}')" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
                              <a href="{{ url('storage/homework/'.$homework->homework_doc) }}" class="btn btn-success btn-sm {{ $homework->homework_doc!=null?'':'disabled' }} " target="_blank" title=""><i class="fa fa-download"></i></a>
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
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
