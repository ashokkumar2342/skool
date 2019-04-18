@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
 
@endpush
@section('body')
<section class="content-header">
    <h1> QR code & Barcode</h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">    
      	<div class="box"> 
      	 <div class="box-body"> 
  	 	 <form class="form-group col-md-11 add_form" action="{{ route('barcode.Generator') }}" method="post" success-content-id="div_barcode_show">
        {{ csrf_field() }} 	
      	 	 
            <div class="row">
              <div class="col-lg-1"> 
                <input type="radio" name="generate" checked value="barcode"> Barcode
              </div>
               <div class="col-lg-1">
                <input type="radio" name="generate" value="qrcode">QR Code 
              </div>
            </div>
            <div class="row">
              <div class="col-md-6"> 
              	<textarea class="form-group form-control" name="text_name"></textarea>
              </div>
              <button type="submit" class="btn btn-success">Generate</button> 
            </div>
             
            </form> 
         
     </div>
     <div id="div_barcode_show">
     	
     </div>
  </div>
             
           
       
        <!-- /.box -->
 
    </section>

    <!-- /.content -->
@endsection
@push('scripts')
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
@endpush 