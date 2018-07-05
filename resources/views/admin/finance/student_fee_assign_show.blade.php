@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Fee Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
         

    <div class="box">             
      <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-responsive"> 
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Concession</th>
                        <th>Concession Amount</th>  
                        <th>Fee Amount</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Last Date</th>
                        <th>Refundable</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentFeeDetails as $studentFeeDetail)
                      <tr>
                         <td><input type="checkbox" name="id" value="{{ $studentFeeDetail->id }}"></td>
                         <td>
                            {!! Form::select('concession',$concession, null, ['class'=>'form-control concession','placeholder'=>'Select Concession','required']) !!} 
                         </td>
                         <td><input type="text" class="form-control" name="concession_amount" id="concession_amount" value="{{ $studentFeeDetail->concession_amount }}"></td> 
                         <td><input type="text" class="form-control" name="fee_amount" value="{{ $studentFeeDetail->fee_amount }}"> </td> 
                         <td><input type="text" class="form-control" name="from_date" value="{{ $studentFeeDetail->from_date }}"></td>
                         <td><input type="text" class="form-control" name="to_date" value="{{ $studentFeeDetail->to_date }}"></td>
                         <td><input type="text" class="form-control" name="last_date" value="{{ $studentFeeDetail->last_date }}"> </td> 
                         <td><input type="checkbox" {{ $studentFeeDetail->refundable==1?'checked':'' }} value="{{ $studentFeeDetail->refundable }}" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="default"></td>
                         <td><input type="checkbox" {{ $studentFeeDetail->paid==1?'checked':'' }} value="{{ $studentFeeDetail->paid }}" data-toggle="toggle" data-on="Paid" data-off="Unpaid" data-onstyle="success" data-offstyle="default"></td>
                           
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
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
 <script> 
    $( ".datepicker").datepicker();   
 
   $('.concession').change(function(event) {
     
     event.preventDefault();
   
     $.ajax({
         url: '{{ route('admin.concession.search') }}',
         type: 'get', 
         data: {concession: $('.concession').val()},
     })
     .done(function(data) {

         $("#concession_amount").val(data.amount);
          
     })
     .fail(function() {
         console.log("error");
     })
     .always(function() {
         console.log("complete");
     });
   
   });
     
  </script>
@endpush