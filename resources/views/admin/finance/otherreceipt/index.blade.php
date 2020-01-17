@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    {{-- <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.other.receipt.addform')}}')" style="margin:10px">Add Form</button> --}}
    <h1>Other Receipt<small>List</small> </h1> 
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12"> 
         {{--  <button id="btn_event_type_table_show" hidden data-table="event_type_data_table" onclick="callAjax(this,'{{ route('admin.event.type.table.show') }}','event_type_table_show_div')">show </button> --}}
          <div class="box"> 
            <div class="box-body">
                <form action="{{ route('admin.other.receipt.store') }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                         {{ csrf_field() }}
                         <div class="row">
                          <div class="col-lg-6 form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="" maxlength="100"> 
                          </div>
                          <div class="col-lg-6 form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="" maxlength="6"> 
                          </div>
                          <div class="col-lg-6 form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" placeholder=""> 
                          </div>
                          <div class="col-lg-6 form-group">
                            <label>Description</label>
                            <textarea  name="description" class="form-control" placeholder="" maxlength="200"></textarea>
                            
                          </div> 
                          <div class="col-md-12">
                                  <table class="table table-striped" style="font-size: 100%;margin-bottom:0px;">
                                  
                                     <tr id="id1" class="tr_clone">
                                         <td style="width: 200px;">
                                           <label class="control-label mb-2 text-left">Payment Mode <span style="color:red;">*</span></label> 
                                             <select name="payment_mode[]" class="form-control" id="payment_mode">
                                              @foreach ($paymentModes as $mode)
                                                <option value="{{ $mode->id }}"{{ @$feedefaultvalue->payment_mode==$mode->id?'selected' : '' }}>{{ $mode->name }}</option> 
                                              @endforeach 
                                            </select>  
                                         </td>
                                         {{-- <td style="width: 200px;">
                                           <label class="control-label mb-2 text-left">Amount <span style="color:red;">*</span></label> 
                                             <input type="text"  name="amount[]" onkeyup="feeSum()" value="" class="form-control fee_sum">    
                                         </td style="width: 250px;"> --}}
                                         <td><label class="control-label mb-2 text-left">Transaction / Cheque No </label> 
                                          <input type="text"  name="cheeque_no[]" class="form-control"></td>
                                         <td><label class="control-label mb-2 text-left">Bank Name </label> 
                                             <input type="text"  name="bank_name[]" class="form-control"></td>
                                         <td><label class="control-label mb-2 text-left">Remarks </label> 
                                             <textarea type="text" name="remarks[]" class="form-control"></textarea></td>
                                         <td> <br><br> 
                                          
                                      </td> 
                                     </tr>
                                     {{-- <tr>
                                      <td>Amount Deposit</td>
                                      <td>
                                              
                                        <input type="text" id="amount_deposit" readonly  name="amount_deposit[]"  class="form-control">
                                        
                                      </td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                     </tr> --}}
                                   
                                  </table>
                         </div>
                         <div class="row">
                          <div class="col-lg-12 text-center" style="padding-top: 10px">
                            <input type="submit" class="btn btn-success">
                          </div>
                           
                         </div>
                       
                      
                    </form>
            </div>
          </div>
        </div>
      </div>
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
        $('#event_type_data_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
 