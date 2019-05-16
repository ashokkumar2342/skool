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
            <h1>Fee Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right"> 
              <li class="breadcrumb-item"><a href="#">Home</a></li> 
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
                     <table class="table m-0">
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
                 <!-- /.card-body --> 
                 
                </div>
              </div>
          </div>      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
 
    </section>
    <!-- /.content -->


@endsection
@push('scripts')
 
@endpush