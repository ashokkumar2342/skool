@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')
    <section class="content">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Subjects List</h3>
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
                  @php
                     
                  $subjectId=1;
                  @endphp
                @foreach($subjects as $subject)
                <tr>
                  <td>{{$subjectId++}}</td>
                  <td>{{ $subject->name }}</td>
                  <td>{{ $subject->code }}</td>
                  <td > 
                  {{--  @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)  --}}                  
                    <a class="btn btn-info btn-xs col-md-4 col-md-offset-2" href="{{ route('admin.subjectType.edit',$subject->id) }}"><i class="fa fa-pencil"></i></a>
                   {{--  @endif --}}
                    {{--  @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) --}}
                    {!! Form::open(['method' => 'delete', 'route' => ['admin.subjectType.delete', $subject->id]]) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs col-md-4', 'onclick'=>"return confirm('Are you sure to delete this data ?')"]) !!}
                    {!! Form::close() !!}
                   {{--  @endif --}}
                    
            
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
            {!! Form::text('subjectName',@$subjectType->name, ['class'=>"form-control",'placeholder'=>"Subject Name",'autocomplete'=>'off','maxlength'=>'50',]) !!}
            <p class="text-danger">{{ $errors->first('subjectName') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('Code', 'Code :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('code', @$subjectType->code, ['class'=>"form-control",'placeholder'=>"Subject Code",'autocomplete'=>'off','maxlength'=>'6',]) !!}
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
     $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
     @if(@$subjectType || $errors->first())
     $('#add_class').modal('show'); 
     @endif
     
 </script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"> 

@endpush