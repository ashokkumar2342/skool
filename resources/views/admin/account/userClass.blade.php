@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Class assign</h3>
            </div>             

            <!-- /.box-header -->
            <div class="box-body">
               {!! Form::open(['route'=>'admin.userClass.add','class'=>"form-horizontal add_form" ]) !!}
              <div class="col-md-4"> 
               
                 
                  {{ Form::label('User','User',['class'=>' control-label']) }}
                  <select class="form-control"  multiselect-form="true"  name="user" id="user_id"  onchange="callAjax(this,'{{route('admin.account.classAllSelect')}}'+'?id='+this.value,'class_all')" > 
                   <option value="" disabled selected>Select User</option>
                  @foreach ($users as $user)
                       <option value="{{ $user->id }}">{{ $user->email }} &nbsp;&nbsp;&nbsp;&nbsp;( {{ $user->first_name }} )</option> 
                   @endforeach  
                  </select> 
                  <p class="text-danger">{{ $errors->first('user') }}</p>
                </div> 
                <div class="col-md-4" id="class_all">
                  
                </div>
                 <div class="col-md-4" id="class_list">
                  
                  
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