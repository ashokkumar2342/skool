@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endpush
@section('body')
<section class="content-header">
<h1>Upload Video\PDF</h1>
</section>
<section class="content">    
<div class="box"> 
<div class="box-body">
  <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#video">Video</a></li>
  <li><a data-toggle="tab" id="btn_pdf" href="#menu1" onclick="callAjax(this,'{{ route('admin.video.and.pdf.onclick') }}','pdf_div')">PDF</a></li>
</ul>
<form action="{{ route('admin.video.and.pdf.upload') }}" method="post" enctype="multipart/form-data" button-click="btn_pdf">
 {{ csrf_field() }}
<div class="tab-content">
  <div id="video" class="tab-pane fade in active">
    <div class="col-lg-3">
    <input type="file" multiple="true" name="video" style="margin-top:20px">
    </div>
    <div class="col-lg-1 col-md-1 col-xs-1">
      <input type="submit" class="btn btn-success btn-sm" style="margin-top: 20px">
    </div>
    <div class="col-lg-12 table-responsive" style="margin-top: 20px">
    <table class="table">
      <tbody>
    @foreach ($videos as $video)
        <tr>
        <td>
           <video width="300" controls controlsList="nodownload">
               <source src="{{ route('admin.video.and.pdf.play',$video->path) }}" type="video/mp4">
           </video>
           <a href="{{ route('admin.video.and.pdf.destroy',Crypt::encrypt($video->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-xs btn-danger" style="margin-top: -150px"><i class="fa fa-trash"></i></a>
        </td>
        <td>
        </td>
        </tr>
        @endforeach 
        </tbody>
        </table>
        </div>  
  </div>
  </form>
  <div id="menu1" class="tab-pane fade">
    <form action="{{ route('admin.video.and.pdf.upload') }}" method="post" enctype="multipart/form-data" button-click="btn_pdf" class="add_form">
    {{ csrf_field() }}
    <div id="pdf_div">
    
    </div>
  </form>
  </div>
</div>
</div>
</div>
</section>
@endsection
@push('scripts')
<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
crossorigin="anonymous"></script>
@endpush 