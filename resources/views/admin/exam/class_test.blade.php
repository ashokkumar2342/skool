@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Class Test Show <small>List</small></h1>
      <ol class="breadcrumb">
        <button type="button" class="btn btn-primary btn-sm" onclick="callPopupLarge(this,'{{ route('admin.exam.test.add.form') }}')">Add New</button>
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" success-content-id="class_test_show" action="{{ route('admin.exam.classtest.table.show') }}" method="post" no-reset="true">              
                  {{ csrf_field() }}                  
                   <div class="col-lg-3">                         
                      <div class="form-group">
                        <label>Academic Year</label>
                           <select name="academic_year_id" class="form-control">
                             <option selected disabled>Select Academic Year</option>
                             @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                             @endforeach 
                           </select>
                      </div>
                  </div>
                  <div class="col-lg-3">                         
                      <div class="form-group"> 
                        <label>Class</label>
                        <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
                           <option disabled selected>Select Class</option>
                           @foreach ($classTypes as $classType)
                            <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                           @endforeach
                         </select> 
                      </div>
                      </div> 
                      <div class="col-lg-3">
                        <div class="form-group">
                        <label>Section</label>
                         <select name="section_id" class="form-control" id="section_div"> 
                         </select> 
                      </div>
                  </div> 
                  <div class="col-lg-3">                         
                     <div class="form-group">
                      <label>Subject</label>
                     <select name="subject" class="form-control">
                        <option selected disabled>Select Subject</option>
                        @foreach ($subjects as $subject)
                         <option value="{{ $subject->id }}">{{ $subject->name }}</option> 
                        @endforeach 
                      </select> 
                  </div>
                  </div>                  
	                   
	                 
                       
	                     <div class="col-lg-12 text-center"> 
	                     <button class="btn btn-success" type="submit" id="btn_class_test_details_show">Show</button> 
	                    </div>                     
	                </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
               
                <div class="box-body">
                   <div id="class_test_show">
                     
                   </div>
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