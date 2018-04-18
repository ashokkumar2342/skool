@extends('admin.layout.base')
@section('body')
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Section List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_section">Manage Section</button></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
    {!! Form::open(['route'=>@($sectionType)?['admin.section.update',$sectionType->id]:'admin.section.add','class'=>"form-horizontal" ]) !!}
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