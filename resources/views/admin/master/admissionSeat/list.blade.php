@extends('admin.layout.base')
@section('body')
<section class="content-header">
      
      <a  onclick="callPopupLarge(this,'{{ route('admin.adminssion.seat.add') }}')" class="btn btn-info btn-sm pull-right">Add Admission Schedule</a>
    <h1>Admission Schedule</h1>
</section>
    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="admission_seat_table">
               <thead>
                 <tr>
                   <th>Academic Year</th>
                   <th>Class</th>
                   <th>Total Seat</th>
                   <th>Prospectus Fee</th>
                   <th>From Date</th>
                   <th>Last Date</th>
                   <th>Test Date</th>
                   <th>Retest Date</th>
                   <th>Result Date</th>
                   <th>Syllabus</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($adminssionSeats as $adminssionSeat)
                       <tr>
                         <td>{{ $adminssionSeat->academicYears->name or ''}}</td>
                         <td>{{ $adminssionSeat->classes->name or ''}}</td>
                         <td>{{ $adminssionSeat->total_seat}}</td>
                         <td>{{ $adminssionSeat->form_fee}}</td>
                         <td>{{ date('d-m-Y',strtotime( $adminssionSeat->from_date))}}</td>
                         <td>{{ date('d-m-Y',strtotime( $adminssionSeat->last_date))}}</td>
                         <td>{{ date('d-m-Y',strtotime( $adminssionSeat->test_date))}}</td>
                         <td>{{ date('d-m-Y',strtotime( $adminssionSeat->retest_date))}}</td>
                         <td>{{ date('d-m-Y',strtotime( $adminssionSeat->result_date))}}</td>
                        <td><a href="{{ route('admin.adminssion.seat.download',$adminssionSeat->syllabus) }}" target="blank" style="margin:10px">{{ $adminssionSeat->syllabus?'Open the Syllabus!' : '' }}</a></td>
                         <td>
                          @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                          <a  onclick="callPopupLarge(this,'{{ route('admin.adminssion.seat.add',Crypt::encrypt($adminssionSeat->id)) }}')" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                          @endif
                          @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                          <a href="{{ route('admin.adminssion.seat.delete',Crypt::encrypt($adminssionSeat->id)) }}" title="Delete" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                          @endif
                        </td>

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
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
  <script>
     $(document).ready(function() {
       $('#admission_seat_table').DataTable( {
            
       } );
   } );  
   
  </script>
  
@endpush