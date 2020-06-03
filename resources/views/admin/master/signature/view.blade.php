@extends('admin.layout.base')
@section('body')
<!-- Main content -->
<section class="content-header">
    <button type="button" class="btn btn-sm btn-info pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.signature.stamp.add.form')}}')">Add Signature Stamp</button>
    <button type="button" class="btn btn-sm btn-primary pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.signature.stamp.report')}}')" style="margin-right: 5px;width: 100px">PDF Report</button>
    <h1>Signature Stamp<small>List</small> </h1> 
</section>  
<section class="content"> 
    <div class="box"> 
        <div class="box-body">
            <form action="{{ route('admin.signature.stamp.table.show') }}" method="post" class="add_form" success-content-id="stamp_table_show" no-reset="true" >
            {{ csrf_field() }} 
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Certificate Type</label>
                    <select name="certificate_type"  class="form-control">
                        <option  selected disabled>Select Certificate</option>
                        @foreach ($CertificateTypes as $CertificateType)
                        <option value="{{ $CertificateType->id }}"{{ @$signatureStamps->certificate_type_id==$CertificateType->id?'selected':'' }}>{{ $CertificateType->name}}</option>   
                        @endforeach  
                    </select> 
                </div>
                <div class="form-group col-lg-4">
                    <label>Authority Type</label>
                    <select name="authority_type" class="form-control">
                        <option selected disabled>Select Option</option> 
                        @foreach ($IssueAthortiTypes as $IssueAthortiType)
                        <option value="{{ $IssueAthortiType->id }}"{{ @$signatureStamps->stamp_type==$IssueAthortiType->id?'selected':'' }}>{{ $IssueAthortiType->name}}</option> 
                        @endforeach  
                    </select>  
                </div>
                <div class="col-lg-4 form-group">
                 <input type="submit" id="btn_stamp_table_show" value="Show" class="btn btn-success form-control" style="margin-top: 24px">
                 </div>
              </div>
             </form>
             <div class="table-responsive" id="stamp_table_show" style="margin-top: 20px">
                   
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
        $('#event_type_data_table').DataTable();
    });

    $('#btn_event_type_table_show').click();
</script>
@endpush


