@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
               <form action="{{ route('admin.manageSubject.pdf.generate') }}" method="post" target="blank">
                {{ csrf_field() }}
               <div class="col-md-4 pull-right">
               <div class="panel panel-default">
                <div class="panel-body" style="height: 50px">
                  <label class="radio-inline"><input type="radio" name="optradio" value="class_wise">Class Wise</label>
                  <label class="radio-inline"><input type="radio" name="optradio" checked value="all">All</label>
                 <input type="submit" value="PDF" class="btn btn-primary pull-right">
                </div>
              </div>  
               </div> 
                 </form>
              <h3 class="box-title">Class  Subject</h3>
            </div>             

            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-4"> 
                 {{-- {!! Form::open(['route'=>'admin.subject.add','class'=>"form-horizontal" ]) !!} --}}
                    <div class="form-group col-md-12">
                      {{ Form::label('class','Class',['class'=>' control-label']) }}   
                      <select name="class" id="class" class="form-control" onchange="callAjax(this,'{{ route('admin.subject.search') }}','searchResult')">
                        <option  selected disabled>Select Class</option>
                        @foreach ($classes as $id=>$class)                         
                        <option value="{{ $id }}">{{ $class }}</option>
                        @endforeach 
                      </select>                      
                       
                    </div> 
                    
                    <form id="saveSubject" action="javascript:;">
                    {{ csrf_field() }}
                      <table class="table table-bordered">
                         <thead>                  
                         <tr>
                             <th style="width: 10px">Code</th>
                             <th> <input  class="checked_all" type="checkbox"></th>
                            <td><b>Subject</b></td>                         
                             <th><button type="button" data-click="compulsory" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Compulsory</button> </th>
                             <th ><button type="button" data-click="optional" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Elective</button>  </th>   
                         </tr>
                         </thead>
                         <tbody id="searchResult">                      
                         </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5">                                 
                              <div class="row">                              
                               <div class="col-md-12 text-center">
                                <button class="btn btn-success " id="subjectBtn">Save Subject</button>
                               </div>
                              </div>  
                            </td>
                         </tr>
                        </tfoot>
                       </tbody>
                   </table>
                 {{ Form::close() }}
                 
                
            </div>
           
            <div class="table-responsive col-md-7 pull-right">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sr.No.</th>                
                  <th>class Name</th>                   
                  <th>Subject Name</th>                   
                  <th>Compulsory/Elective</th>                   
                  <th width="80px">Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                     
                  $subjectId=1;
                  @endphp
                @foreach($manageSubjects as $manageSubject)
                <tr>
                  <td>{{ $subjectId++ }}</td>
                  <td>{{ $manageSubject->classTypes->name or ''}}</td>                 
                  <td>{{ $manageSubject->subjectTypes->name or ''}}</td>                 
                  <td>{{ $manageSubject->isoptional->name or ''}}</td>                 
                  <td align="center">                    
                    {{-- <a class="btn btn-info btn-xs" href="{{ route('admin.manageSubject.edit',$manageSubject->id) }}"><i class="fa fa-pencil"></i></a> --}}
                     @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.manageSubject.delete',$manageSubject->id) }}"><i class="fa fa-trash"></i></a>
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
     $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    } );
} );     
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
<script type="text/javascript">
   
  $("#saveSubject").submit(function(e){
        e.preventDefault();
        $('#studentAttendanceBtn').html('<i class="fa fa-refresh fa-spin"></i> Mark Attendance');
        $.ajax({
          method: "post",
          url: "{{ route('admin.subject.add') }}",
          data: $(this).serialize()+'&class='+'&class='+$("#class").val(),

        })
        .done(function( response ) {            
            if(response.length>0){
                $('#subjectBtn').html('Mark Subject');                 
                 toastr.success('Subject Add Succesfully')                
            }
            else{
                $('#subjectBtn').html('Mark Subject'); 
                 toastr.success('Subject Add Succesfully')

             

                 

            }
            
        });
    });
     
</script>
<script>
 $( function() {
   
   $('button').click(function(){
       $('#searchResult input:radio:checked').filter(':checked').click(function () {
         $(this).prop('checked', false);
       });
       $('.'+$(this).attr('data-click')).prop('checked', true);
     });
   });
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