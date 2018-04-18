@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Search Student :  <b>{{ $results->count() }}</b> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.student.report') }}" class="btn btn-success btn-sm" >Back</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>Registration No</th>                  
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th>Father Mobile</th> 
                  <th>Mother Mobile</th>                                    
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                <tr>
                  <td>{{ $result->registration_no }}</td>               
                  <td>{{ $result->name }}</td>
                  <td>{{ $result->father_name }}</td>
                  <td>{{ $result->father_mobile }}</td>
                  <td>{{ $result->mother_mobile }}</td> 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

 <script type="text/javascript">
    //  $(document).ready(function(){
    //     $('#dataTable').DataTable();
    // });
     $(document).ready(function() {
     $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
     
 </script>
@endpush