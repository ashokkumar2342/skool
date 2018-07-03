@extends('admin.layout.base')
@section('body')
@push('links') 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
      .radio label {
    padding-right: 20px;
}
  </style>
@endpush
<section class="content-header">
<h1>  Student Attendence  </h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
     </ol>
</section>
    <section class="content">
      	<div class="box">    
        {{ $errors->first() }}         
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">  
                         <form id="search" action="javascript:;">
                          {{ csrf_field() }}
                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',$classes,null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-2">                         
                                               <div class="form-group">
                                                   {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                   {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                   <p class="text-danger">{{ $errors->first('session') }}</p>
                                               </div>
                                            </div>
                                             
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('date','Date',['class'=>' control-label']) }}   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date',date('d-m-Y'),array('class' => 'form-control','data-inputmask'=>"'alias': 'dd/mm/yyyy'", 'id="datepicker"', 'required' )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="row">                              
                              <div class="col-md-12 text-right">
                                <button class="btn btn-success " type="submit">Show Records</button>
                              </div>
                            </div>                            
                       {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                       <form id="saveAttendance" action="javascript:;">
                       {{ csrf_field() }}
                         <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="ng-binding"></th>
                                <th colspan="5">Attendance</th>
                            </tr>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Student Name</th>
                                 @foreach($attendancetypes = App\Model\AttendanceType::all() as $attendancetype)
                                <th ><button type="button" data-click="{{ str_replace(' ', '_', strtolower($attendancetype->name)) }}"  class="btn btn-{{ $attendancetype->color }} btn-xs" ><i class="fa fa-{{ $attendancetype->icon }}"></i> {{ $attendancetype->name }}</button></th>
                                @endforeach
                                
                            </tr>
                            </thead>
                            <tbody id="searchResult">
                              
                            </tbody>
                           <tfoot>
                             <tr>
                                <td colspan="7">
                                    
                                 <div class="row">                              
                                  <div class="col-md-12 text-center">
                                   <button class="btn btn-success " id="studentAttendanceBtn">Save attendance</button>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    
@endsection
 @push('scripts')

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
   $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
   $("#class").change(function(){
       $('#section').html('<option value="">Searching ...</option>');
       $.ajax({
         method: "get",
         url: "{{ route('admin.manageSection.search') }}",
         data: { id: $(this).val() }
       })
       .done(function( response ) {            
           if(response.length>0){
               $('#section').html('<option value="">Select Section</option>');
               for (var i = 0; i < response.length; i++) {
                   $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
               } 
           }
           else{
               $('#section').html('<option value="">Not found</option>');
           }            
       });
   });

   $("#class").change(function(){
       sectionSearch($(this).val());
   });   
   function sectionSearch (value,selectVal=null){
       var selected = null;
       $('#section').html('<option value="">Searching ...</option>'); 
     
       $.ajax({
         method: "get",
         url: "{{ route('admin.manageSection.search2') }}",
         data: { id: value }
       })
       .done(function(response ) {            
            if(response.section.length>0){
               $('#section').html('<option value="">Select section</option>');
              for (var i = 0; i < response.section.length; i++) {
                   if(selectVal>0){
                       selected = (selectVal==response.section[i].id)?'selected':''; 
                   }
                   $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>'); 
               }
           }
           else{
               $('#section').html('<option value="">Not found</option>');
           } 
                  
       });
   }
    $("#search").submit(function(e){
        e.preventDefault();
        $('#searchResult').html('Searching ...');
        $.ajax({
          method: "post",
          url: "{{ route('admin.attendance.student.search') }}",
          data: $(this).serialize(),
        })
        .done(function(response) {            
            if(response.length>0){
                $('#searchResult').html('');
                for (var i = 0; i < response.length; i++) {
                  $('#searchResult').append(response[i]);
                  
                } 
            }
            else{
                $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
            }
            
        }).error(function(){
          $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
        });
    });
    $("#saveAttendance").submit(function(e){
        e.preventDefault();
        $('#studentAttendanceBtn').html('<i class="fa fa-refresh fa-spin"></i> Mark Attendance');
        $.ajax({
          method: "post",
          url: "{{ route('admin.attendance.student.save') }}",
          data: $(this).serialize()+'&date='+$("#datepicker").val(),
        })
        .done(function( data ) {            
            if(data.length>0){
                toastr[data.class](data.message) 

                $('#studentAttendanceBtn').html('Mark Attendance');

            }
            else{
                toastr[data.class](data.message) 
                $('#studentAttendanceBtn').html('Mark Attendance');
            }
            
        });
    });
</script>
  
 <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    $("#search input").change(function(){
      if ($("#searchResult").has('tr')) {
        $("#searchResult").html('');
      }
      
    });
    $('button').click(function(){
        $('#searchResult input:radio:checked').filter(':checked').click(function () {
          $(this).prop('checked', false);
        });
        $('.'+$(this).attr('data-click')).prop('checked', true);
      });
    });
  </script>

@endpush