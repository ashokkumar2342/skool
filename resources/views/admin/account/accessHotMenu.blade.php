@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quick Links</h3>
               
            </div>             

            <!-- /.box-header -->
            <div class="box-body"> 
                
               <form action="{{ route('admin.userAccess.hotMenuAdd') }}" method="post" class="add_form form-horizontal" no-reset="true" select-triger="user_select_box" accept-charset="utf-8"> 
                 {{ csrf_field() }}
              <div class="col-md-4">
                <div class="form-group col-md-12">
                  {{ Form::label('User','Users',['class'=>' control-label']) }}                         
                  <div class="form-group">  
                         <select class="form-control select2" id="user_select_box"  multiselect-form="true"  name="user"  onchange="callAjax(this,'{{route('admin.account.access.hotmenuTable')}}'+'?id='+this.value,'menu_list')" > 
                          <option value="" disabled selected>Select User</option>
                         @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->email }} &nbsp;&nbsp;&nbsp;&nbsp;( {{ $user->first_name }} )</option> 
                          @endforeach  
                         </select> 
                    
                    </div>
                </div> 
              </div>

              <div id="menu_list">  
                 
              </div>
              

           </form>

               
             
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
      
 </script>
 <script>
     $(function() {
         $('#ms').change(function() {
             console.log($(this).val());
         }).multipleSelect({
             width: '100%'
         });
     });
 </script>
<script type="text/javascript">
            
</script>
@endpush