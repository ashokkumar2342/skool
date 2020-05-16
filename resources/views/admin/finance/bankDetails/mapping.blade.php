@extends('admin.layout.base')
@section('body')
<section class="content-header">
   <h1>Mapping</h1>
</section>
<section class="content">
    <div class="box">             
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4 form-group">
                    <label>Fee Account</label>
                    <select name="fee_account" class="form-control">
                        @foreach ($feeAccounts as $feeAccount)
                         <option value="{{ $feeAccount->id }}">{{ $feeAccount->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 form-group">
                    <label>Bank Account</label>
                    <select name="fee_account" class="form-control">
                        @foreach ($SchoolBankDetail as $SchoolBankDetai)
                         <option value="{{ $SchoolBankDetai->id }}">{{ $SchoolBankDetai->account_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <input type="submit" class="btn btn-success" style="margin-top: 24px">
                    
                </div>
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
  </script>
  @endpush
