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
<h1>  Staff Attendence  </h1>
     
</section>
    <section class="content">
      	<div class="box">    
        {{ $errors->first() }}         
            <!-- /.box-header -->
            <div class="box-body"> 
                     <form id="search" action="">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-lg-4">
                          <label>Staff Name</label>
                          <input type="text" class="form-control" > 
                        </div>
                        <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
                        
                      </div>

                             
                      {{ Form::close() }}

            </div>
            

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