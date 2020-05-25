@extends('admin.layout.base')
@section('body')
<section class="content-header">
         <?php $url = route('admin.paymentMode.edit') ?>
         <a class="btn btn-info btn-sm pull-right"  onclick="callPopupMd(this,'{{$url}}')">Add Payment Mode</a>
         <a href="{{ route('admin.paymentMode.pdf.generate') }}" class="btn btn-sm btn-primary pull-right" target="blank"  title="Download PDF" style="margin-right: 10px">PDF</a>
    <h1>Payment Mode List</h1>
     
</section>
    <section class="content"> 
            <div class="box"> 
                <div class="box-body">
                  <div class="row">
                  <div class="table-responsive col-lg-12"> 
                    <table class="table" id="table_payment_mode">
                         
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Payment Mode</th>
                                <th>Code</th>
                                <th>Sorting Order No</th>
                                <th class="text-nowrap">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          @php
                            $arrayId=1;
                          @endphp
                            @foreach ($paymentmodes as $paymentmode) 
                                <tr>
                                    <td>{{ $arrayId++ }}</td>
                                    <td>{{ $paymentmode->name }}</td>
                                    <td>{{ $paymentmode->code }}</td>
                                    <td>{{ $paymentmode->sorting_order_id}}</td>
                                    <td class="text-nowrap"> @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                                        <?php $url = route('admin.paymentMode.edit',Crypt::encrypt($paymentmode->id)) ?>
                                      <a class="btn btn-info btn-xs"  onclick="callPopupMd(this,'{{$url}}')"><i class="fa fa-edit"></i></a> 
                                        @endif
                                        @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                                      <a href="{{ route('admin.paymentMode.delete',Crypt::encrypt($paymentmode->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                      @endif
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
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

 <script>
   $(document).ready(function() {
       $('#table_payment_mode').DataTable( {
            
       } );
   } );  
 
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
   
     
    $('#btn_academic_year_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{ route('admin.paymentMode.store') }}',
           type: 'POST',       
           data: $('#form_academic_year').serialize() ,
      })
      .done(function(data) {
        if (data.class === 'error') {                 
             $.each(data.errors, function(index, val) {
                 toastr[data.class](val) 
             }); 
        }
          else {                 
            toastr[data.class](data.message)  
            $("#form_academic_year")[0].reset(); 
            $("#table_academic_year").load(location.href + ' #table_academic_year'); 
        } 
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      }); 
    });/////////////////isapplicable///////////////////
 
    /////////////////delete///////////////////
   
  </script>
  <script>
   $( function() {
     
     $('button').click(function(){
         $('#searchResult input:radio:checked').filter(':checked').click(function () {
           $(this).prop('checked', false);
         });
         $('.'+$(this).attr('data-click')).prop('checked', true);
       });
     });
   </script>
@endpush