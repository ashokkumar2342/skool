@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Fee Collection </h1>
     
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body"> 
                <div class="row"> 
                  <form  action="{{ route('admin.studentFeeCollection.show') }}" class="add_form" no-reset="true" method="post" success-content-id="fee_collection_detail" @if (@$feedefaultvalue->sibiling_detail==1) button-click="siblig_chk" @endif> 
                   {{ csrf_field() }}
                   <div class="col-lg-12">
                      <div class="col-lg-4">                           
                           <div class="form-group">
                            {{ Form::label('student_id','Registration No',['class'=>' control-label']) }}
                            <input type="text" name="registration_no" id="registration_no" class="form-control" maxlength="{{ $schoolinfo->reg_length }}">
                             {{-- {{ Form::select('student_id',$students,null,['class'=>'form-control student_list_select','placeholder'=>"Select Registration",'required',]) }}
                             <p class="errorAmount1 text-center alert alert-danger hidden"></p> --}}
                           </div>    
                      </div>
                      <div class="col-lg-4">     
                           <div class="form-group"> 
                             <label >Fee Paid Upto:</label>  
                             <select name="fee_paid_upto" id="fee_paid_upto" class="form-control">      
                               <option disabled selected>-Select-</option>
                               @foreach ($uptoMonthYears as $uptoMonthYear)
                                <option value="{{date('d-m-Y',strtotime($uptoMonthYear)) }}"{{date('d-m-Y',strtotime($uptoMonthYear))==@$upto_month_year?'selected' : '' }}> {{date('M-Y',strtotime($uptoMonthYear)) }} </option>
                               @endforeach
                             </select>
                           </div> 
                      </div>                                                     
                     <div class="col-lg-4 form-group" style="padding-top: 24px;"> 
                     <input class="btn btn-success form-control" type="submit"  value="Show" id="btn_fee_collection_show"> 
                    </div>                     
                  </div>
                    <div class="col-lg-12 text-center">
                      <div class="btn-group">
                      <button style="width:128px" type="button" class="btn btn-default" success-popup="true" onclick="callPopupLarge(this,'{{ route('admin.studentFeeCollection.student.serch') }}'+'?fee_paid_upto='+$('#fee_paid_upto').val())"><i class="fa fa-search"></i> Search</button>
                      <a style="width:128px"  href="{{ route('admin.cashbook.list') }}" id="btn_student_ledger" class="btn btn-info">Ledger</a>
                      <button style="width:128px" type="button" class="btn btn-primary" onclick="callPopupLarge(this,'{{ route('admin.privious.reciept.show.model') }}'+'?student_id='+$('#student_id').val())">Previous Receipt</button>
                      <button style="width:128px" type="button" class="btn btn-danger"onclick="callPopupLarge(this,'{{ route('admin.privious.reciept.show.model') }}'+'?student_id='+$('#student_id').val())"><i class="fa fa-close"></i> Cancel Receipt</button>
                      <button style="width:128px" type="button" class="btn btn-success" data-table="previos_receipt_data_table" onclick="callPopupLarge(this,'{{ route('admin.privious.reciept.search') }}'+'?student_id='+$('#student_id').val())"><i class="fa fa-print"></i> Print Receipt</button>
                      <button style="width:128px" type="button" class="btn btn-warning" data-table="previos_receipt_data_table" onclick="callPopupLarge(this,'{{ route('admin.studentFeeCollection.previous.receipts') }}')">History Receipt</button>
                      <button style="width:128px" type="button" class="btn btn-danger" success-popup="true" onclick="callAjax(this,'{{ route('admin.studentFeeCollection.previous.receipts.remove') }}')"><i class="fa fa-trash"></i> History Clear</button>
                      </div>
                    </div>
                    </form>  
                 </div>  
            </div>
            <!-- /.box-body -->
         </div>
          <!-- /.box -->
          <div class="box">             
              <!-- /.box-header -->
              <div class="box-body">
              <form  method="post" class="add_form" action="{{ route('admin.studentFeeCollection.post') }}" success-content-id="reciept_detail" button-click="btn_print" success-content-msg="true" accept-charset="utf-8" print-data="true">
            
                  <div class="col-md-12" id="fee_collection_detail"> 
                     
                  </div>  
                </form>
                  <div class="col-md-12" id="fee_detail"> 
                     
                  </div>
                  <div class="col-md-12" id="reciept_detail" style="display: none"> 
                     
                  </div>
              </div>
              <!-- /.box-body -->
           </div>
            <!-- /.box -->

            <!-- Modal -->
           
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   {{-- <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2/select2.min.css') }}"> --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
 
  <script>
     
/////////////////////shwo fee detaila//////////////
   
     function RegistrationNoFill(val) {
         $("#registration_no").val(val);
      }
      function siblingDisabled(val) {  
     if (val==1){ 
      $('#siblig_chk').prop("disabled", false); 
      $('#siblig_chk').click();
      
     }
     else {  
      $('#siblig_chk').click(); 
      $('#siblig_chk').prop("disabled", true); 
      $('#sibling_table').prop("disabled", true); 
     }
  } 

    function showHide(){ 

          if ($('#siblig_chk').is(":checked")) {
              $("#siblig_div").show();
              $('.checkbox').prop('checked', $(this).prop("checked")); 
               
          } else {
              $("#siblig_div").hide();
             
          }
          $('.checked_all').on('change', function() {     
                  $('.checkbox').prop('checked', $(this).prop("checked"));              
          }); 
    } 
    function paymentmode(value){
        if(value==1){
            $('#payment_mode_detail').hide(500);
        }else{
            $('#payment_mode_detail').show(500);
        }
       
    }

    

    
    function feeCollectionPrint(){
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
         $.ajax({
             url: '{{ route('admin.studentFeeCollection.print') }}',
             type: 'post',       
             data: $('#fee_collection_submit_form').serialize() ,
        })
        .done(function(response) {
            
            // window.open('http://www.google.com');
            // window.location.attr(href) = 'http://www.google.com'
            // window.open('http://www.google.com', '_blank');
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        }); 
    }



  </script>
  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.student_list_select').select2();

    });
    function scrollCommentDiv(){ 
     
     $("html, body").animate({ scrollTop: $(document).height() }, 1000);
      

    }
  


  </script>
@endpush