@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="box-header">
              <h3 class="box-title">Menu Assign</h3>      
       </div>         
          <div class="box"> 
            <div class="box-body"> 
                
               <form action="{{ route('admin.userAccess.add') }}" method="post" class="add_form form-horizontal" accept-charset="utf-8" no-reset="true" select-triger="user_select_box"> 
                 {{ csrf_field() }}
              <div class="col-md-4">
                <div class="form-group col-md-12">
                  {{ Form::label('User','User',['class'=>' control-label']) }}                         
                  <div class="form-group">  
                         <select class="form-control select2" id="user_select_box"  multiselect-form="true"  name="user"  onchange="callAjax(this,'{{route('admin.account.menuTable')}}'+'?id='+this.value,'menu_list')" > 
                          <option value="" disabled selected>Select User</option>
                         @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->email }} &nbsp;&nbsp;&nbsp;&nbsp;( {{ $user->first_name }} )</option> 
                          @endforeach  
                         </select> 
                    
                    </div>
                </div> 
              </div>

              <div  id="menu_list">  
                 
              </div>
               

           </form>

              {{-- <div class="col-md-12"> 
                 {!! Form::open(['route'=>'admin.userAccess.add','class'=>"form-horizontal add_form" ]) !!}
                    <div class="form-group col-md-12">
                      {{ Form::label('User','User',['class'=>' control-label']) }}                         
                      {!! Form::select('user',$users, null, ['class'=>'form-control','placeholder'=>'---choose User---','required','id'=>'user_select']) !!}
                      <p class="text-danger">{{ $errors->first('user') }}</p>
                    </div> 
                    <div class="col-md-12">
                       <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <td><input  class="checked_all" type="checkbox"> All</td>
                                  <th>S.N</th>
                                  <th>Menu</th>
                                  <th>Sub Menu</th>
                                 </tr>
                            </thead>
                            <tbody  id="show_table_menu">

                            </tbody>
                        </table>   
                         
                     <button type="submit" class="btn btn-primary"> Save</button>
                   
              
                </div> 
                   {!! Form::close() !!}
            </div> --}}
             
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