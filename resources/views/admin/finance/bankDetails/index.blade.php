@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <button class="btn btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.finance.bank.detail.add.form') }}')">Add Bank Detail</button>
    <h1>Bank Details </h1>
</section>
<section class="content">
    <div class="box">             
        <div class="box-body">
            <button type="button" class="hidden" id="btn_bank_details_show" onclick="callAjax(this,'{{ route('admin.finance.bank.detail.show') }}','bank_details_show')"></button>
       <div id="bank_details_show">
       </div>         
                 
    </div>
</div>
</section>
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#school_bank_detail_data_table').DataTable();
    });
     $('#btn_bank_details_show').click();
  </script>
  @endpush
