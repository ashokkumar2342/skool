{{-- @extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Role List</h3>
            </div>
              

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-lg-6">
                  <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sn</th>
                       
                      <th>Name</th>
                       </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                      <td>{{ $role->id }}</td>
                      
                      <td>{{ $role->name }} </td>
                     
                    </tr> 
                    @endforeach
                  </tbody>
                  </table>
                </div>
                <div class="col-lg-6">
                      <form action="{{ route('admin.roleAccess.subMenu') }}" method="post" class="add_form form-horizontal" accept-charset="utf-8"> 
                        {{ csrf_field() }}
                     <div class="col-md-4">
                       <div class="form-group col-md-12">
                         {{ Form::label('role','Role',['class'=>' control-label']) }}                         
                         <div class="form-group">  
                                <select class="form-control multiselect" multiselect-form="true"  name="role"  onchange="callAjax(this,'{{route('admin.account.roleMenuTable')}}'+'?id='+this.value,'menu_list')" > 
                                 <option value="" disabled selected>Select Role</option>
                                @foreach($roles as $role)
                                     <option value="{{ $role->id }}">{{ $role->name }}</option> 
                                 @endforeach  
                                </select> 
                           
                           </div>
                       </div> 
                     </div>

                     <div class="col-md-6" id="menu_list">  
                        
                     </div>
                     <div class="col-md-2">  
                        <br>
                       <button type="submit" class="btn btn-primary btn-xm"> Save</button>

                     </div> 

                  </form>
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
       $('#dataTable').DataTable( {
           dom: 'Bfrtip',
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print'
           ]
       } );
   } );  
     
 </script>


 

      
 <script type="text/javascript">
  
     $(document).ready(function() {
  
         $('#multi-select-demo').multiselect();
  
     });
  
 </script>
@endpush --}}
@extends('admin.layout.base')
@section('body')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Default User Permission</h3>
            </div>             

            <!-- /.box-header -->
            <div class="box-body"> 
              <div class="row">
                {{-- <div class="col-lg-6">
                  <table  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr.No.</th>
                       
                      <th>Name</th>
                       </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                      <td>{{ $role->id }}</td>
                      
                      <td>{{ $role->name }} </td>
                     
                    </tr> 
                    @endforeach
                  </tbody>
                  </table>
                </div> --}}
                <div class="col-lg-12">
                  
               <form action="{{ route('admin.roleAccess.subMenu') }}" call-back="triggerSelectBox" method="post" class="add_form form-horizontal" no-reset="true" > 
                 {{ csrf_field() }}
              <div class="col-md-4">
                <div class="form-group col-md-12">
                  {{ Form::label('role','Role',['class'=>' control-label']) }}                         
                  <div class="form-group">  
                         <select class="form-control" id="role_select_box" data-table-without-pagination-disable-sorting="menu_role_table" multiselect-form="true"  name="role"  onchange="callAjax(this,'{{route('admin.account.roleMenuTable')}}'+'?id='+this.value,'menu_list')" > 
                          <option value="" disabled selected>Select User</option>
                         @foreach ($roles as $role)
                              <option value="{{ $role->id }}">{{ $role->name }}</option> 
                          @endforeach  
                         </select> 
                    
                    </div>
                </div> 
              </div>

                
                 <div id="menu_list">
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
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript">

     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
      
        $('#menu_role_table').DataTable();
         function triggerSelectBox(){  
          $("#role_select_box" ).trigger("change");

        }
        function f1(objButton){  
    alert(objButton.value);
}
 </script>
 
<script type="text/javascript">
            
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
@endpush