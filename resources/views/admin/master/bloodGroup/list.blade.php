@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
               <button type="button" class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.bloodgroup.add') }}')">Add Blood Group</button>
               <a href="{{ route('admin.bloodgroup.report') }}" style="float: right;margin-right: 10px" class="btn btn-primary btn-sm" title="Download PDF" target="blank">PDF</a>
              <h3 class="box-title">Blood Groups List</h3>
            </div>
              

            <!-- /.box-header -->
            <div class="box-body"> 
                <div class="table-responsive col-lg-12" style="margin-top: 20px">
                    <table id="category_dataTable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SR.No.</th> 
                        <th>Blood Group</th>
                       
                        <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                        @php
                           
                        $completionsId=1;
                        @endphp
                      @foreach($completions as $completions)
                      <tr>
                        <td>{{ $completionsId++ }}</td>
                        
                        <td>{{ $completions->name }} </td>
                         
                        <td>
                         @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                            <button type="button" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.bloodgroup.add',$completions->id) }}')"><i class="fa fa-edit"></i></button> 
                          @endif
                          @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                          <a href="{{ route('admin.bloodgroup.delete',Crypt::encrypt($completions->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                          @endif
                        </td>
                       
                      </tr> 
                      @endforeach
                    </table>  
                </div>
              </div>
              
                  
            </div>
              
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" src="////cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script> 
   
 <script type="text/javascript">
   
   $(document).ready(function() {
       $('#category_dataTable').DataTable( {
            
       } );
   } );  
     
 </script>


 

      
 <script type="text/javascript">
  
     $(document).ready(function() {
  
         $('#multi-select-demo').multiselect();
  
     });
  
 </script>
@endpush