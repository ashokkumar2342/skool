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
              <h3 class="box-title">Section List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_section">Add Section</button></span>
              <a href="{{ route('admin.section.pdf.generate') }}" style="float: right;margin-right: 10px" class="btn btn-primary btn-sm" title="Download PDF" target="blank">PDF</a>
            </div>
         
            <div class="box-body">
              <table id="class_section" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Section id</th>                
                  <th>Section Name</th>                   
                  <th>Section Code</th>                   
                  <th>Sorting Order No</th>                   
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                  @php 
                   $sectionId=1;
                  @endphp
                @foreach($sections as $section)
                <tr>
                  <td>{{ $sectionId ++ }}</td>
                  <td>{{ $section->name }}</td>                 
                  <td>{{ $section->code }}</td>                 
                  <td>{{ $section->sorting_order_id }}</td>                 
                  <td align="center">
                   @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)

                   <button class="btn btn-info btn-xs" onclick="callPopupMd(this,'{{ route('admin.section.edit',$section->id) }}')" ><i class="fa fa-pencil"></i></button>                    
                    
                    @endif
                     @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.section.delete',$section->id) }}"><i class="fa fa-trash"></i></a>
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
<div id="add_section" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    {!! Form::open(['route'=>@($sectionType)?['admin.section.update',$sectionType->id]:'admin.sectionType.add','class'=>"form-horizontal" ]) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@if(@$sectionType) Update @else Add @endif Section</h4>
      </div>
      <div class="modal-body">
         <div class="col">             
          <div class="form-group">
          {!! Form::label('name', 'Section Name : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('name', @$sectionType->name, ['class'=>"form-control",'placeholder'=>"Section Name",'autocomplete'=>'off','maxlength'=>'50',]) !!}
            <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('code', 'Section Code : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('code', @$sectionType->name,  ['class'=>"form-control",'placeholder'=>"Section Code",'autocomplete'=>'off','maxlength'=>'6',]) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('sorting_order_id', 'Sorting Order No : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('sorting_order_id', @$sectionType->sorting_order_id,  ['class'=>"form-control",'placeholder'=>"Sorting Order No",'autocomplete'=>'off','maxlength'=>'6',]) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
    $('#class_section').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    } );
} );
     @if(@$sectionType || $errors->first())
     $('#add_section').modal('show'); 
     @endif
 </script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
@endpush