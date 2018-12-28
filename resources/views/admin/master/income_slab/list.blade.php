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
                <div class="col-lg-6">
                      <form action="{{ route('admin.incomeSlab.store') }}" redirect-to="{{ route('admin.incomeSlab.list') }}" method="post" class="add_form form-horizontal" accept-charset="utf-8"> 
                        {{ csrf_field() }} 
                        <label>Income Slab</label>
                     <input type="text" name="range" maxlength="50" class="form-control" placeholder="Enter Income Slab" required="">
                     <div class="text-right" style="padding-top: 5px">
                       <input type="submit" value="save" class="btn btn-success btn-sm">
                     </div>
                     

                  </form>
                  
                </div>
                <div class="col-lg-6">
                    <table id="dataTable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Sn</th>
                         
                        <th>Income Slab</th>
                        <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                      @foreach($incomeSlabs as $incomeSlab)
                      <tr>
                        <td>{{ $incomeSlab->id }}</td>
                        
                        <td>{{ $incomeSlab->range }} </td>
                        <td> 
                            <?php $url = route('admin.incomeSlab.edit',Crypt::encrypt($incomeSlab->id)) ?>
                          <a class="btn btn-success btn-xs"  onclick="callPopupMd(this,'{{$url}}')"><i class="fa fa-edit"></i></a> 
                         
                          <a href="{{ route('admin.incomeSlab.delete',Crypt::encrypt($incomeSlab->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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