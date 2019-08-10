@extends('admin.layout.base')
@section('body')
<!-- Main content -->
<section class="content">
  <button type="button" class="hidden" id="btn_profile_show" onclick="callAjax(this,'{{ route('admin.profile.show') }}','profile_show')">Show</button>
          <div id="profile_show"> 
          </div> 
   
    <!-- /.row -->
  </section>
  <!-- /.content -->

  @endsection
@push('scripts')
<script type="text/javascript">
  
    $('#btn_profile_show').click();
     

</script>
@endpush