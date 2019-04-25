@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Reset Admission  Number <small></small> </h1>
      <ol class="breadcrumb">
              
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
            	<form action="{{ route('admin.student.reset.adminssion.student.show') }}" success-content-id="student_list_div" method="post" no-reset="true" class="add_form">
            	{{ csrf_field() }}
            	<div class="row">
            		<div class="col-lg-4">
                        <label>Admission No</label>
                        <input type="text" name="admission_no" class="form-control" maxlength="20">
            			{{-- <label for="sel1">Class:</label>
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
		                    
		                 </div> --}}
		             </div>
             		<div class="col-lg-8" id="sectionSelectBox">                         
 		                 <div class="form-group">
 		                 <br>
 		                   <input type="submit" class="btn btn-success" value="show">
 		                    
 		                 </div>
 		             </div>
             			 
            	</form>  
            	</div>	
            <form action="{{ route('admin.student.reset.roll.no.show.update') }}" method="post" class="add_form" no-reset="true">
            	{{ csrf_field() }}
            	<div id="student_list_div">
            		
            	</div> 
            </form>	
           
            </div>
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