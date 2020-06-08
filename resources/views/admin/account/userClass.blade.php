@extends('admin.layout.base')
@section('body')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Class Assign</h3>
                
            </div>             

            <!-- /.box-header -->
            <div class="box-body">
               <form action="{{ route('admin.userClass.add') }}" no-reset="true" method="post" class="add_form" select-triger="user_id">
               {{ csrf_field() }} 
              <div class="col-md-4"> 
               
                 
                  {{ Form::label('User','Users',['class'=>' control-label']) }}
                  <select class="form-control select2"  multiselect-form="true" data-table-all-record="class_section_list" name="user" id="user_id"  onchange="callAjax(this,'{{route('admin.account.classAllSelect')}}'+'?id='+this.value,'class_all')" > 
                   <option value="" disabled selected>Select User</option>
                  @foreach ($users as $user)
                  @if ($user->role_id!=12) 
                       <option value="{{ $user->id }}">{{ $user->email }} &nbsp;&nbsp;&nbsp;&nbsp;( {{ $user->first_name }} )</option>
                  @endif      
                   @endforeach  
                  </select> 
                  <p class="text-danger">{{ $errors->first('user') }}</p>
                </div> 
                <div id="class_all">
                  
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
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript">
   $(document).ready(function() {
    $('#class_section_list').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    } );
} );
     
      
 </script>
<script type="text/javascript">
        $('.checked_all').on('change', function() {     
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('.checked_all').prop('checked',true);
            }else{
                   $('.checked_all').prop('checked',false);
            }
        });       
</script>
@endpush