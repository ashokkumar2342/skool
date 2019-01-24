@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Reset Roll No  <small>List</small> </h1>
      <ol class="breadcrumb"> 
      </ol>
</section> 
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
          <div class="box-body"> 
           <form action="{{ route('admin.student.reset.roll.no.show') }}" success-content-id="student_roll_show_div" method="post" class="add_form" no-reset="true">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-5">
                        <label for="sel1">Class:</label>
                        <select name="class" onchange="callAjax(this,'{{ route('admin.section.selectBox') }}','sectionSelectBox')" class="form-control" required="">
                         <option value="" selected disabled>Select Class</option>
                         @foreach ($classes as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                         @endforeach 
                         </select>   
                    </div>
                    <div class="col-lg-5" id="sectionSelectBox">                         
                         <div class="form-group"> 
                          <label>Section</label>
                            
                         </div>
                     </div>
                    <div class="col-lg-2" id="sectionSelectBox">                         
                         <div class="form-group">
                         <br>
                           <input type="submit" class="btn btn-success" value="show">
                            
                         </div>
                     </div>
                         
                </form>
                <form action="{{ route('admin.student.reset.roll.no.update') }}" method="post" class="add_form" no-reset="true">
                {{ csrf_field() }}
                <div id="student_roll_show_div">
             
             	 </div>
                  </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



    </section>
    <!-- /.content -->
@endsection
@push('links')
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