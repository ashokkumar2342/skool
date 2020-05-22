@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@section('body')
<section class="content-header">
    <h1>Student Document Verify<small></small> </h1>       
</section>
<section class="content">        
    <div class="box"> 
        <div class="box-body">
            <div class="btn-group btn-group-justified">
              <div class="btn-group">
                <button type="button" id="btn_studet_image_upload_list_1" class="btn btn-warning" button-click-by-class="checked" onclick="callAjax(this,'{{ route('admin.student.document.verify.list',1) }}','studet_image_upload_list')">Not Verify</button>
              </div>
              <div class="btn-group">
                <button type="button" id="btn_studet_image_upload_list_2" class="btn btn-success" onclick="callAjax(this,'{{ route('admin.student.document.verify.list',2) }}','studet_image_upload_list')">Verified</button>
              </div>
              <div class="btn-group">
                <button type="button" id="btn_studet_image_upload_list_3" class="btn btn-primary" onclick="callAjax(this,'{{ route('admin.student.document.verify.list',3) }}','studet_image_upload_list')">All</button>
              </div>
            </div>
            <div id="studet_image_upload_list">
                
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   $('#btn_studet_image_upload_list_1').click();
</script>

@endpush