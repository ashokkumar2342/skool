@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Class</h3>
            </div>             

            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-4"> 
                 {!! Form::open(['route'=>'admin.userClass.add','class'=>"form-horizontal" ]) !!}
                    <div class="form-group col-md-12">
                      {{ Form::label('User','User',['class'=>' control-label']) }}                         
                      {!! Form::select('user',$users, null, ['class'=>'form-control','placeholder'=>'---choose User---','required']) !!}
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
                            <tbody>
                              @php($i=1)
                              @foreach($classes as $class)
                              <tr>
                                  <td><input type="checkbox"  class="checkbox" name="class_id[]" value="{{$class->id}}"></td>
                                  <td>{{$i}}</td>
                                  <td>{{$class->name}}</td>
                              </tr>
                              @php($i++)
                              @endforeach
                              </tbody>
                        </table>   
                         <p class="text-danger">{{ $errors->first('class_id') }}</p>
                     <button type="submit" class="btn btn-primary "> Save</button>
                 {!! Form::close() !!}
                </div> 
            </div>
            <div class="col-md-8">
                 <table id="dataTable" class="table dataTable table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>Sn</th>
                     <th>User</th>
                     <th>Class</th>                 
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($userClass as $data)
                   <tr>
                     <td>{{ $data->id }}</td>                 
                     <td>{{ $data->admins->first_name }}</td>                 
                     <td>{{ $data->classes->name}}</td>
                          
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
</script>
@endpush