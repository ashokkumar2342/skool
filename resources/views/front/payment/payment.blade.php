 @extends('front.layout.base')
 @push('links')
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
   <style type="text/css" media="screen">
       .fa-asterisk{
        color:red;
       }
   </style>
 @endpush
 
@section('body')
   <section class="content-header">
         <h1>
           Payment 
           <small>Details</small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li class="active">Dashboard</li>
         </ol>
       </section>

     <!-- Main content -->
    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <form action="{{ route('payment.store') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4"> 
                  <input type="number" name="price" class="form-control" value="500" placeholder="Enter Rupees"> 
                </div> 
                <div class="col-lg-2">
                   <input type="submit" value="Pay" class="btn btn-success">
                 </div> 
              </div>
               
              </form>   
            </div> 
            <div class="row">
               <div class="col-lg-12">
                 <table class="table">
                   <thead>
                     <tr>
                       <th>Order Id</th>
                       <th>Transaction</th>
                       <th>Status</th>
                       <th>Rupees</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach ($orders as $order)
                     <tr>
                       <th>{{ $order->order_id }}</th>
                       <th>{{ $order->transaction_id }}</th>
                       <th>{{ $order->status }}</th>
                       <th>{{ $order->price }}</th>
                     
                     </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div>
            </div>
        </div>

     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
  
@endsection
@push('scripts')
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
       $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
   </script>
@endpush
