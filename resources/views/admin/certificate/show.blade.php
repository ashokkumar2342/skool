@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Certificate  <small>Show</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a target="blank" href="{{ route('admin.student.certificateIssu.print', $certificate->id) }}" class="btn btn-info btn-sm" >Print</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body" style="padding-left: 100px;padding-right: 100px;"> 
              <table > 
                <thead>
                  <tr>
                    <th style="width: 1200px;" colspan="7"><h1 align="center">ABCD High School, Rohtak<br><br></h1></th>
                     
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Wesf fdfdf </b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                  </tr>
                    <tr>
                    <td>  <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                  </tr>
                  <tr>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                  </tr>
                   <tr>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                  </tr>
                   <tr>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                  </tr>
                   <tr>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                    <td>Name <b>{{ $certificate->students->name }}</b></td>
                  </tr>
                  <tr><br>
                    <td colspan="7" class="text-right" style="padding-right: 50px;">Principal</b></td>
                  
                  </tr>
                </tbody>
              </table> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button --> 
@include('admin.certificate.Remarks') 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<style>
  td{
    padding-top: 30px;
  }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     
 </script>
@endpush