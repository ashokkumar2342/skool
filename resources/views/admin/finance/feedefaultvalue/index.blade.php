@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Fee Default Value<small>Details</small> </h1> 
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <button type="button" id="btn_fee_default_value_form" class="hidden" text-editor="summernote" onclick="callAjax(this,'{{ route('admin.finance.fee.default.value.form') }}','fee_default_value_form')">Form</button>
              <div id="fee_default_value_form">
                
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
        $('#btn_fee_default_value_form').click();
    }); 
  </script>
  @endpush
     
 
 