@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Class Test Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12">
                  <div class="col-lg-3">                         
                      <div class="form-group">
                        <label>Academic Year</label>
                           <select name="academic_year_id" id="academic_year_id" class="form-control" onchange="callAjax(this,'{{ route('admin.academic.wise.class.test') }}'+'?academic_year_id='+$('#academic_year_id').val(),'class_test_value')">
                             <option selected disabled>Select Academic Year</option>
                             @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                             @endforeach 
                           </select>
                      </div>
                  </div>    
                    
                   <div class="col-lg-4" id="class_test_value">                         
                      
                  </div>
                   
	                </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                
                    <form class="add_form" content-refresh="route_table" action="{{ route('admin.exam.classdetail.store') }}" method="post">              
                  {{ csrf_field() }}  
                  
                    <table id="route_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>  
                                <th>student Name</th> 
                                <th>student Registration No</th>                             
                                <th>Marks</th>                                               
                                <th>any remarks</th>                                        
                            </tr>
                        </thead>
                        <tbody id="student_details_Result">
                        
                           
                        </tbody>
                             

                    </table>
                    <div class="text-center">
                      <a href="#" title="" onclick="callPopupLevel2(this,'{{ route('admin.medical.template.view',4) }}')" >Template View</a>&nbsp;&nbsp;
                       Send Sms
                       <input type="checkbox" name="send_sms" value="1">&nbsp;&nbsp;
                       Send Email
                       <input type="checkbox" name="send_email" value=2>&nbsp;&nbsp;
                      <input type="submit" class="btn btn-success " value="submit">
                    </div>
                    </form>
                </div>
            </div>    

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
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
     
     if ($("#class").val() > 0) {
         sectionSearch($("#class").val()); 
     }
     
      
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
     
 </script>
    
@endpush