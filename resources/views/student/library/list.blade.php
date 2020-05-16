  @extends('admin.layout.base')
  @section('body')
    <!-- Main content -->
    <section class="content-header">  
    <a href="#" class="btn btn-success pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('student.book.reserve') }}')" style="margin: 4px">Reserve</a>    
      <h1>Book Reserve </h1>     
       
      </section>  
      <section class="content">
        <div class="box"> 
             <div class="box-body"> 
                <div class="row">
                  <div class="col-xs-12">    
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
             </div>
        </div>    
      </section>
      <!-- /.content -->

  @endsection
  @push('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

  @endpush
  @push('scripts')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
          $('#book_reserve_table').DataTable();
      }); 
    </script>
  @endpush
       
   
   