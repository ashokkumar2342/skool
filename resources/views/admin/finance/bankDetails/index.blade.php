@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <button class="btn btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.finance.bank.detail.add.form') }}')">Add Bank Detail</button>
    <h1>Bank Details </h1>
</section>
<section class="content">
    <div class="box">             
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="school_bank_detail_data_table">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Bank Name</th>
                            <th class="text-nowrap">Ifsc Code</th>
                            <th class="text-nowrap">Account No.</th>
                            <th class="text-nowrap">Account Name</th>
                            <th class="text-nowrap">Contact No.</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Contact Person Name</th>
                            <th class="text-nowrap">Branch</th>
                            <th class="text-nowrap">Branch Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($SchoolBankDetails as $SchoolBankDetail)
                            <tr>
                                <td>{{ $SchoolBankDetail->Banks->name or '' }}</td>
                                <td>{{ $SchoolBankDetail->ifsc_code }}</td>
                                <td>{{ $SchoolBankDetail->account_no }}</td>
                                <td>{{ $SchoolBankDetail->account_nane }}</td>
                                <td>{{ $SchoolBankDetail->contact_no }}</td>
                                <td>{{ $SchoolBankDetail->email }}</td>
                                <td>{{ $SchoolBankDetail->contact_person_name }}</td>
                                <td>{{ $SchoolBankDetail->branch }}</td>
                                <td>{{ $SchoolBankDetail->bank_address }}</td>
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
