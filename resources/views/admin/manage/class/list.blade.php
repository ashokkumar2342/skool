@extends('admin.layout.base')
@section('body')
    <section class="content">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Class List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_class">Add Class</button></span>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              

              </body>
              </html>
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Class id</th>                
                  <th>Class Name</th>
                  <th>Sort Name</th>
                  <th>Shorting Order No</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $class)
                <tr>
                  <td>{{ $class->id }}</td>
                  <td>{{ $class->name }}</td>
                  <td>{{ $class->alias }}</td>
                  <td>{{ $class->shorting_id }}</td>
                  <td align="center">
                    @if(Auth::guard('admin')->user()->minus()->where('minu_id',2)->first()->w_status == 1)
                    <a class="btn btn-info btn-xs" href="{{ route('admin.class.edit',$class->id) }}"><i class="fa fa-pencil"></i></a>
                    @endif
                    @if(Auth::guard('admin')->user()->minus()->where('minu_id',2)->first()->d_status == 1)
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.class.delete',$class->id) }}"><i class="fa fa-trash"></i></a>
                    @endif
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="add_class" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    {!! Form::open(['route'=>@($classType)?['admin.class.update',$classType->id]:'admin.class.add','class'=>"form-horizontal" ]) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@if(@$classType) Update @else Add @endif Class</h4>
      </div>
      <div class="modal-body">
         <div class="col">             
          <div class="form-group">
          {!! Form::label('name', 'Class Name : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('name', @$classType->name, ['class'=>"form-control",'placeholder'=>"Class Name",'autocomplete'=>'off','maxlength'=>'50']) !!}
            <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('shortName', 'Short Name :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('shortName', @$classType->alias, ['class'=>"form-control",'placeholder'=>"Numeric Name",'autocomplete'=>'off','maxlength'=>'50']) !!}
            <p class="text-danger">{{ $errors->first('shortName') }}</p>
            </div>
          </div> 
          <div class="form-group">
          {!! Form::label('shorting_id', 'Shorting Order No :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('shorting_id', @$classType->shorting_id, ['class'=>"form-control",'placeholder'=>"Shorting id",'autocomplete'=>'off','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) !!}
            <p class="text-danger">{{ $errors->first('shorting_id') }}</p>
            </div>
          </div>    

                 
         </div>
         
         
      </div>
     <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary ">@if(@$classType) Update @else Save @endif</button>

         </div>
         {!! Form::close() !!}
       

  </div>
</div>

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
    
     @if(@$classType || $errors->first())
     $('#add_class').modal('show'); 
     @endif
 </script>
  
@endpush