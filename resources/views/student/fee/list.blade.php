  @extends('admin.layout.base')
  @section('body')
    <!-- Main content -->
    <section class="content-header">     
      <h1>Fee Details<small>List</small> </h1>       
      </section>  
      <section class="content">
        <div class="box"> 
             <div class="box-body"> 
                <div class="row">
                  <div class="col-xs-12">    
                      <table class="table m-0" id="class_fee_details_data_table">
                         <thead>
                         <tr> 
                           <th>Receipt Date</th>
                           <th>Receipt No</th>
                           <th>Receipt Amount</th>
                           <th>Deposit Amount</th>
                           <th>Balance Amount</th>
                           <th>Action</th> 
                         </tr>
                         </thead>
                         <tbody>
                          @foreach ($fees as $fee)   
                         <tr>
                           <td>{{ date('d-m-Y',strtotime($fee->receipt_date)) }}</td>
                           <td> {{ $fee->receipt_no }} </td>
                           <td> {{ $fee->receipt_amount }} </td>                         
                           <td> {{ $fee->deposit_amount }} </td>
                           <td> {{ $fee->balance_amount }} </td> 
                           
                           <td>
                              
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
          $('#class_fee_details_data_table').DataTable();
      }); 
    </script>
  @endpush
       
   
   