@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content"> 
          <div class="box">
            <div class="box-header">
              <?php $url = route('admin.incomeSlab.edit') ?>
              <a class="btn btn-info btn-sm pull-right"  onclick="callPopupMd(this,'{{$url}}')"></i>Add Income Slab</a>
              <h3 class="box-title">Income Slab</h3>
            </div> 
            <div class="box-body">
              <div class="row">
                <div class="table-responsive col-lg-12"> 
                    <table id="dataTable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SR.No.</th>
                         
                        <th>Income Slab</th>
                        <th>Income Code</th>
                        <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                        @php
                           $incomeSlabId=1;
                        @endphp
                      @foreach($incomeSlabs as $incomeSlab)
                      <tr>
                        <td>{{ $incomeSlabId++ }}</td>
                        
                        <td>{{ $incomeSlab->range }} </td>
                        <td>{{ $incomeSlab->code }} </td>
                        <td> 
                           @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                            <?php $url = route('admin.incomeSlab.edit',Crypt::encrypt($incomeSlab->id)) ?>
                          <a class="btn btn-info btn-xs"  onclick="callPopupMd(this,'{{$url}}')"><i class="fa fa-edit"></i></a>
                          @endif 
                          @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                          <a href="{{ route('admin.incomeSlab.delete',Crypt::encrypt($incomeSlab->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                          @endif
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
 
   
 <script type="text/javascript">
   
   $(document).ready(function() {
       $('#dataTable').DataTable( {
            
       } );
   } );  
     
 </script>


 

      
 <script type="text/javascript">
  
     $(document).ready(function() {
  
         $('#multi-select-demo').multiselect();
  
     });
  
 </script>
@endpush