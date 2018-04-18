@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Class + Subject</h3>
            </div>             

            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-4"> 
                 {{-- {!! Form::open(['route'=>'admin.subject.add','class'=>"form-horizontal" ]) !!} --}}
                    <div class="form-group col-md-12">
                      {{ Form::label('class','Class',['class'=>' control-label']) }}                         
                      {!! Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'---choose Class---','required']) !!}
                      <p class="text-danger">{{ $errors->first('class') }}</p>
                    </div> 
                    <div class="col-md-12">
                    <form id="saveSubject" action="javascript:;">
                    {{ csrf_field() }}
                      <table class="table table-bordered">
                         <thead>                  
                         <tr>
                             <th style="width: 10px">Code</th>
                             <th> <input  class="checked_all" type="checkbox"></th>
                            <td><b>Subject</b></td>                         
                             <th><button type="button" data-click="compulsory" class="btn btn-success btn-xs"><i class="fa fa-check"></i> compulsory</button> </th>
                             <th ><button type="button" data-click="optional" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Optinal</button>  </th>   
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
            </div>
            <div class="col-md-8">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th> id</th>                
                  <th>class Name</th>                   
                  <th>Subject Name</th>                   
                  <th>IsOptinal</th>                   
                  <th width="80px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($manageSubjects as $manageSubject)
                <tr>
                  <td>{{ $manageSubject->id }}</td>
                  <td>{{ $manageSubject->classTypes->name }}</td>                 
                  <td>{{ $manageSubject->subjectTypes->name }}</td>                 
                  <td>{{ $manageSubject->isoptional->name }}</td>                 
                  <td align="center">                    
                    {{-- <a class="btn btn-info btn-xs" href="{{ route('admin.manageSubject.edit',$manageSubject->id) }}"><i class="fa fa-pencil"></i></a> --}}
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.manageSubject.delete',$manageSubject->id) }}"><i class="fa fa-trash"></i></a>                     
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
<script type="text/javascript">
  $("#class").change(function(){   
 
        
        $.ajax({
          method: "get",
          url: "{{ route('admin.subject.search') }}",
          data: $(this).serialize(),

        }) 
        .done(function( response ) {            
            if(response.length>0){
                $('#searchResult').html('');
                for (var i = 0; i < response.length; i++) {
                  $('#searchResult').append(response[i]);
                  
                } 
            }
            else{
                $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
            }            
        }) 
      
  });
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
@endpush