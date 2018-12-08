
@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"> 
@endpush
@section('body')
<section class="content-header">
    <h1> Student Birthday</h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                   <div class="col-lg-12">
                   		<table id="birthday_dataTable" class="table table-bordered table-striped table-hover">
                   		  <thead>
                   		  <tr>               
                   		    <th>Registration No</th>                  
                   		    <th>Name</th>
                   		    <th>Father Name</th> 
                   		    <th>Father Mobile</th> 
                   		    <th>Mother Mobile</th>                                    
                   		    <th>Action</th>                                    
                   		  </tr>
                   		  </thead>
                   		  <tbody>
                   		  @foreach($students as $student)
                   		  <tr>
                   		    <td>{{ $student->registration_no }}</td>               
                   		    <td>{{ $student->name }}</td>
                   		    <td>{{ $student->father_name }}</td>
                   		    <td>{{ $student->father_mobile }}</td>
                   		    <td>{{ $student->mother_mobile }}</td> 
                   		    <td>
                   		    	<a href="#" title="Print Birthday Card"></a>
                   		    </td> 
                   		  </tr>
                   		  @endforeach
                   		  </tbody>
                   		   
                   		</table>
                   </div>
                </div> 
            </div>
            <!-- /.box-body -->
            
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script>
 	 
  
 	$(document).ready( function () {
 	    $('#birthday_dataTable').DataTable({
 	    	'iDisplayLength': 10,
 	    	dom: 'Bfrtip',

			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
 	    });
 	} );
 </script>

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

@endpush