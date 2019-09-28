@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Income Slab</h3>
            </div>
              

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-lg-4">
                      <form action="{{ route('admin.incomeSlab.store') }}" redirect-to="{{ route('admin.incomeSlab.list') }}" method="post" class="add_form form-horizontal" accept-charset="utf-8"> 
                        {{ csrf_field() }} 
                    <label>Income Slab</label>
                     <input type="text" name="range" maxlength="30" class="form-control" placeholder="Enter Income Slab" required="">
                     <label>Code</label>
                     <input type="text" name="code" maxlength="5" class="form-control" placeholder="Enter Income Slab" required="">
                     <div class="text-right" style="padding-top: 5px">
                       <input type="submit" value="save" class="btn btn-success btn-sm">
                     </div>
                     

                  </form>
                  
                </div>
                <div class="col-lg-8">
                    <table id="dataTable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Sn</th>
                         
                        <th>Income Slab</th>
                        <th>Code</th>
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
                          <a class="btn btn-success btn-xs"  onclick="callPopupMd(this,'{{$url}}')"><i class="fa fa-edit"></i></a>
                          @endif 
                          @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                          <a href="{{ route('admin.incomeSlab.delete',Crypt::encrypt($incomeSlab->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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