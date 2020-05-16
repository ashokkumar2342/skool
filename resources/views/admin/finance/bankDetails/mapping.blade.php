@extends('admin.layout.base')
@section('body')
<section class="content-header">
   <h1>Mapping Bank Account</h1>
</section>
<section class="content">
    <div class="box">             
        <div class="box-body">
        <form action="{{ route('admin.finance.mapping.store') }}" method="post" class="add_form" content-refresh="mapping_table_list">
            {{csrf_field()}}
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
                    <select name="bank_account" class="form-control">
                        @foreach ($SchoolBankDetail as $SchoolBankDetai)
                         <option value="{{ $SchoolBankDetai->id }}">{{ $SchoolBankDetai->account_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <input type="submit" class="btn btn-success" style="margin-top: 24px">
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table" id="mapping_table_list">
                <thead>
                    <tr>
                        <th>Fee Account</th>
                        <th>Bank Account</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($MappingBankAccounts as $MappingBankAccount)
                    <tr>
                        <td>{{$MappingBankAccount->FeeAccount->name or ''}}</td>
                        <td>{{$MappingBankAccount->SchoolBankDetail->account_name or ''}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
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
