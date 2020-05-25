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
              <h3 class="box-title">Class List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_class" onclick="callPopupLarge(this,'{{ route('admin.class.edit') }}')">Add Class</button></span>
              <a href="{{ route('admin.class.pdf.generate') }}" style="float: right;margin-right: 10px" class="btn btn-primary btn-sm" title="Download PDF" target="blank">PDF</a>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
               
              </body>
              </html>
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sr.No.</th>                
                  <th>Class Name</th>
                  <th>Class Code</th>
                  <th>Sorting Order No</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                  @php 
                   $sectionId=1;
                  @endphp
                @foreach($classes as $class)
                <tr>
                  <td>{{ $sectionId++ }}</td>
                  <td>{{ $class->name }}</td>
                  <td>{{ $class->alias }}</td>
                  <td>{{ $class->shorting_id }}</td>
                  <td align="center">
                    @if(Auth::guard('admin')->user()->minus()->where('minu_id',2)->first()->w_status == 1)
                    <a class="btn btn-info btn-xs" href="#" onclick="callPopupLarge(this,'{{ route('admin.class.edit',$class->id) }}')"><i class="fa fa-edit"></i></a>
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->

<!-- Modal -->
{{-- <div id="add_class" class="modal fade" role="dialog">
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
            {!! Form::text('name', @$classType->name, ['class'=>"form-control",'placeholder'=>"Enter Class Name",'autocomplete'=>'off','maxlength'=>'20']) !!}
            <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('code', 'Class Code :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('code', @$classType->alias, ['class'=>"form-control",'placeholder'=>"Enter Class Code",'autocomplete'=>'off','maxlength'=>'5']) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
            </div>
          </div> 
          <div class="form-group">
          {!! Form::label('shorting_id', 'Sorting Order No :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('shorting_id', @$classType->shorting_id, ['class'=>"form-control",'placeholder'=>"Enter Sorting Order No",'autocomplete'=>'off','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) !!}
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
</div> --}}

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
  // $(document).ready(function(){
  //       $('#dataTable').DataTable();
  //   });
  $(document).ready(function() {
    $('#dataTable').DataTable( {
         
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ],
        aLengthMenu: [
        
        [200, "All"]
    ]
    } );
} );
    
     @if(@$classType || $errors->first())
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
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
@endpush