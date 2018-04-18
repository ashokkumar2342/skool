@extends('admin.layout.base')
@section('body')
    <section class="content">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Class List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_class">Add Subject</button></span>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Subject id</th>                
                  <th>Subject Name</th>
                  <th>Subject Code</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                <tr>
                  <td>{{ ++$loop->index }}</td>
                  <td>{{ $subject->name }}</td>
                  <td>{{ $subject->code }}</td>
                  <td >                    
                    <a class="btn btn-info btn-xs col-md-4 col-md-offset-2" href="{{ route('admin.subjectType.edit',$subject->id) }}"><i class="fa fa-pencil"></i></a>
                    {!! Form::open(['method' => 'delete', 'route' => ['admin.subjectType.delete', $subject->id]]) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs col-md-4', 'onclick'=>"return confirm('Are you sure to delete this data ?')"]) !!}
                    {!! Form::close() !!}
                    
            
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
     <div class="modal-content">
    {!! Form::open(['route'=>@($subjectType)?['admin.subjectType.update',$subjectType->id]:'admin.subjectType.add','class'=>"form-horizontal" ]) !!}
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <a class="close" type="button" href="{{ route('admin.subjectType.list') }}"  >&times;</a>

        <h4 class="modal-title">{{ @($subjectType)? 'Subject Update' : 'Subject add' }}</h4>
      </div>
      <div class="modal-body">
         <div class="col">             
          <div class="form-group">
          {!! Form::label('SubjectName', 'Subjcet Name : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('subjectName',@$subjectType->name, ['class'=>"form-control",'placeholder'=>"Subject Name",'autocomplete'=>'off']) !!}
            <p class="text-danger">{{ $errors->first('subjectName') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('Code', 'Code :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('code', @$subjectType->code, ['class'=>"form-control",'placeholder'=>"Subject Code",'autocomplete'=>'off']) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
            </div>
          </div>   
         </div>
      </div>
     <div class="modal-footer">
            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
            <a class="btn btn-default" href="{{ route('admin.subjectType.list') }}"  >Close</a>
            <button type="submit" class="btn btn-primary ">{{ @($subjectType)? 'Update' : 'Save'}}</button>

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
     @if(@$subjectType || $errors->first())
     $('#add_class').modal('show'); 
     @endif
     
 </script>
@endpush