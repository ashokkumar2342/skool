 
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
              <h3 class="box-title">Default Role Quick Menu</h3>
            </div> 
            <div class="box-body"> 
              <div class="row">
                 
                <div class="col-lg-12">
                  
               <form action="{{ route('admin.roleAccess.quick.role.menu.store') }}" call-back="triggerSelectBox" method="post" class="add_form form-horizontal" no-reset="true" > 
                 {{ csrf_field() }}
              <div class="col-md-4">
                <div class="form-group col-md-12">
                  {{ Form::label('role','Role',['class'=>' control-label']) }}                         
                  <div class="form-group">  
                         <select class="form-control" id="role_select_box"  data-table-without-pagination-disable-sorting="menu_role_table" multiselect-form="true"  name="role"  onchange="callAjax(this,'{{route('admin.account.role.default.menu')}}'+'?id='+this.value,'menu_list')" > 
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
             

           </form>
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