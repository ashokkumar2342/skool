@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Payment Mode List</h1>
      <ol class="breadcrumb">
         <a href="{{ route('admin.paymentMode.pdf.generate') }}" class="btn btn-sm btn-success pull-right" target="blank"  title="Download PDF">PDF</a>
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  <form class="form-vertical" id="form_academic_year">                     
                        <div class="col-lg-4">                           
                             <div class="form-group">
                              {{ Form::label('name','Payment Mode',['class'=>' control-label']) }}
                               {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Payment Mode Name','maxlength'=>'50']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                        <div class="col-lg-3">                           
                             <div class="form-group">
                              {{ Form::label('sorting_order_id','Sorting Order No',['class'=>' control-label']) }}
                               {{ Form::text('sorting_order_id',null,['class'=>'form-control','placeholder'=>'Enter Sorting Order No','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         
                        <div class="col-lg-2">                           
                             <div class="form-group" style="padding-top: 20px;">
                              <button class="btn btn-success" type="button" id="btn_academic_year_create">Create</button> 
                             </div>    
                        </div>             
                  </form> 
                </div> 
            </div>
            <!-- /.box-body -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table class="table" id="table_academic_year">
                         
                        <thead>
                            <tr>
                                <th>Payment Mode</th>
                                <th>Sorting Order No</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentmodes as $paymentmode) 
                                <tr>
                                    <td>{{ $paymentmode->name }}</td>
                                    <td>{{ $paymentmode->sorting_order_id}}</td>
                                    <td> @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                                        <?php $url = route('admin.paymentMode.edit',Crypt::encrypt($paymentmode->id)) ?>
                                      <a class="btn btn-success btn-xs"  onclick="callPopupMd(this,'{{$url}}')"><i class="fa fa-edit"></i></a> 
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
         
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script>
 
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