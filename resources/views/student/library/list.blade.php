@extends('student.layouts.app')
@section('contant')
@push('links')
<style>
  .table td, .table th {
      padding: .0rem; 
      vertical-align: top;
      border-top: 1px solid #dee2e6;
  }
  .border_bottom{
    border-bottom: solid 1px #eee; 
  }  
  b{
    color:#275064;
    align-items: right;
  }
  .fs{
      float: right; font-weight:800;padding-right: 10px;
  }
</style>
@endpush 
 <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book Reserve</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> 
              {{-- ==============button Reserve============================ --}}
               <a href="#" class="btn btn-success pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('student.book.reserve') }}')" style="margin: 4px">Reserve</a>

              <li class="breadcrumb-item" style="margin: 8px"><a href="#">Home</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
           <div class="row">
              <div class="col-md-12">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table m-0" id="book_reserve_table">
                       <thead>
                       <tr> 
                           <th>Book Name</th>
                           <th>Accession No</th>
                           <th>Request Date</th>
                           <th>Reserve Date</th>
                           <th>Reserve Upto Date</th>
                           <th>Status</th>
                           
                       </tr>
                       </thead>
                       <tbody>
                        @foreach ($bookReserves as $bookReserve)   
                       <tr>
                          
                         <td> {{ $bookReserve->booktype->name or ''}} </td>
                         <td> {{ $bookReserve->bookAccession->accession_no or '' }} </td>                         
                         <td> {{ $bookReserve->request_date==null? '' : date('d-m-Y',strtotime($bookReserve->request_date))}} </td>
                         <td> {{ $bookReserve->reserve_date==null? '' : date('d-m-Y',strtotime($bookReserve->reserve_date)) }} </td> 
                         <td> {{$bookReserve->reserve_upto_date==null? '' : date('d-m-Y',strtotime($bookReserve->reserve_upto_date)) }} </td>  
                         <td>
                          <span class="{{ $bookReserve->bookReserveStatus->color  or ''}}">{{ $bookReserve->bookReserveStatus->name or '' }}</span>
                        </td> 
                         
                         
                          
                       </tr>
                       @endforeach
                      
                       </tbody>
                     </table>
                   </div>
                 </div>
                 <!-- /.card-body --> 
                 
                </div>
              </div>
          </div>      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
 
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
        $('#class_fee_details_data_table').DataTable();
    });

     
  </script>
  @endpush