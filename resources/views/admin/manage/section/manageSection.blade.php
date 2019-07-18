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
              <h3 class="box-title">Class Section</h3>
              {{-- <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_section">Manage Section</button></span> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('admin.section.add') }}" method="post" redirect-to="{{ route('admin.manageSection.list') }}" class="add_form" accept-charset="utf-8">
               {{ csrf_field() }} 
              
               {{-- {!! Form::open(['route'=>@($sectionType)?['',$sectionType->id]:'admin.section.add','class'=>"form-horizontal" ]) !!} --}}
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      {{ Form::label('class','Class',['class'=>' control-label']) }} 
                      
                      <select class="form-control"  multiselect-form="true"  name="class"  onchange="callAjax(this,'{{route('admin.section.selectList')}}'+'?id='+this.value,'section_list')" > 
                        <option value="" selected="" disabled>Class Select</option>
                        @foreach ($classes as $key=>$value)
                           <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach  
                      </select>                        
                       
                       
                  </div> 
                </div>
                <div class="col-md-4" id="section_list">
                   
                </div>
              </div>
              </form>
              <hr>
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th> id</th>                
                  <th>class Name</th>                   
                  <th>Section Name</th>                   
                  {{-- <th width="80px">Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($manageSections as $manageSection)
                <tr>
                  <td>{{ $manageSection->id }}</td>
                  <td>{{ $manageSection->classes->name }}</td>                 
                  <td>{{ $manageSection->sectionTypes->name }}</td>                 
                  {{-- <td align="center">                     --}}
                    {{-- <a class="btn btn-info btn-xs" href="{{ route('admin.manageSection.edit',$manageSection->id) }}"><i class="fa fa-pencil"></i></a> --}}
               {{--      <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.manageSection.delete',$manageSection->id) }}"><i class="fa fa-trash"></i></a>  --}}                    
                  {{-- </td>                  --}}
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
   
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@if(@$sectionType) Update @else Add @endif Section</h4>
    </div>
      <div class="modal-body">
        <div class="col-md-12">             
            <div class="form-group">
                {{ Form::label('class','Class',['class'=>' control-label']) }}                         
                {!! Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'---choose Class---','required']) !!}
                <p class="text-danger">{{ $errors->first('class') }}</p>
            </div> 
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td><input  class="checked_all" type="checkbox"> All</td>
                            <th>S.N</th>
                            <th>Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($sections as $section)
                        <tr>
                            <td><input type="checkbox" class="checkbox" name="section_id[]" value="{{$section->id}}"></td>
                            <td>{{$i}}</td>
                            <td>{{$section->name}}</td>
                        </tr>
                        @php($i++)
                        @endforeach
                    </tbody>
                </table>
              
            </div>          
      </div> 
     <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary ">@if(@$sectionType) Update @else Save @endif</button>

     </div>
   
       

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
     @if(@$sectionType || $errors->first())
     $('#add_section').modal('show'); 
     @endif
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
 $(document).ready(function() {
    $('#class_section').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
     
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