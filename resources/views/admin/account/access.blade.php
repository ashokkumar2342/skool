@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Access Menu</h3>
            </div>             

            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-4"> 
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
                                  <th>Class</th>
                                 </tr>
                            </thead>
                            <tbody  id="show_table_menu">

                            </tbody>
                        </table>   
                         
                     <button type="submit" class="btn btn-primary"> Save</button>
                   
              
                </div> 
                   {!! Form::close() !!}
            </div>
            <div class="col-md-8">
                 <table id="dataTable" class="table dataTable table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>Sn</th>
                     <th>User</th>
                     <th>Menu</th>                 
                   </tr>
                   </thead>
                   <tbody>
                   @foreach(App\Model\Minu::all() as $menu)
                   <tr>
                     <td>{{ $menu->id }}</td>                 
                     <td>{{ $menu->admins->email }}</td>                 
                     <td>{{ $menu->minutypes->name}}</td> 
                    </tr>
                    @endforeach
                </tbody>
                </table>
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

   $('#user_select').change(function(event) {
     $.ajax({
       url: '{{ route('admin.account.menuTable') }}',
       type: 'get',
        
       data: {id: $('#user_select').val()},
     })
     .done(function(response) {
        $('#show_table_menu').html(response)
     })
     .fail(function() {
       console.log("error");
     })
     .always(function() {
       console.log("complete");
     });
     
   });        
</script>
@endpush