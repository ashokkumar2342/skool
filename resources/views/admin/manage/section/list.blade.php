@extends('admin.layout.base')
@section('body')
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Section List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_section">Add Section</button></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Section id</th>                
                  <th>Section Name</th>                   
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($sections as $section)
                <tr>
                  <td>{{ $section->id }}</td>
                  <td>{{ $section->name }}</td>                 
                  <td align="center">                    
                    <a class="btn btn-info btn-xs" href="{{ route('admin.section.edit',$section->id) }}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.section.delete',$section->id) }}"><i class="fa fa-trash"></i></a>                     
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
<div id="add_section" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    {!! Form::open(['route'=>@($sectionType)?['admin.section.update',$sectionType->id]:'admin.section.add','class'=>"form-horizontal" ]) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@if(@$sectionType) Update @else Add @endif Section</h4>
      </div>
      <div class="modal-body">
         <div class="col">             
          <div class="form-group">
          {!! Form::label('sectionName', 'Section Name : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('sectionName', @$sectionType->name, ['class'=>"form-control",'placeholder'=>"Section Name",'autocomplete'=>'off']) !!}
            <p class="text-danger">{{ $errors->first('sectionName') }}</p>
            </div>
          </div>
           
          </div>   
 
     <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary ">@if(@$sectionType) Update @else Save @endif</button>

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
     @if(@$sectionType || $errors->first())
     $('#add_section').modal('show'); 
     @endif
 </script>
@endpush