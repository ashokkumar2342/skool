@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Student  Medical Details Add<small></small> </h1>
       
</section>

    <section class="content">
        <div class="box"> 
          <div class="box-body"> 
                <div class="row">
                  <div class="col-lg-4" style="margin-left: 20px">
                     <label>Registration No</label>
                       <input type="text" class="form-control"  autocomplete="off" name="registration_no" id="registration_no" autofocus onkeyup="Medical(this)" > 
                        </div>
                  </div>
                  <form  action="{{ route('admin.medical.add') }}"  method="post" button-click="btn_close,medical_info_tab" class="add_form">
                  {{ csrf_field() }} 
                  <div id="dd_div_show" style="margin-top: 40px">
                  </div> 
                </form>
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
  function Medical(obj) { 
   
    if (obj.value.length=={{ $schoolinfo }}) {  
        callAjax(this,'{{ route('admin.medical.student.show') }}'+'?registration_no='+$('#registration_no').val(),'dd_div_show'); 
        document.getElementById("registration_no").value= '';
    }


  }
   // $('#btn_save_attendance_barcode').click();  
   // $('#btn_click_form_blade').click();  
 </script>

 
 
  
@endpush