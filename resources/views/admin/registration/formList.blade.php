@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
   <style type="text/css" media="screen"> 
         #category{
        display:none;
       } 
        #religion{
        display:none;
       }
         #gender{
        display:none;
       }
        #class{
        display:none;
       }
        
   </style>
@endpush
@section('body')
<section class="content-header">
    <h1> Registration Form List</h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        {{Form::close()}}
        <div class="box">        
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-lg-12 ">                  
                      <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#home">Registration Filter</a></li>
                          <li><a data-toggle="tab" href="#approved_div" onclick="callAjax(this,'{{ route('registration.approved.show') }}','approved_div')">Approved</a></li>
                          <li><a data-toggle="tab" href="#menu2">Pending</a></li>
                          <li><a data-toggle="tab" href="#menu3">Reject</a></li>
                        </ul>

                        <div class="tab-content">
                          <div id="home" class="tab-pane fade in active">
                            @include('admin.registration.registrationList')
                           <div id="report_result"> 
                            </div>
                          </div>
                          <div id="approved_div" class="tab-pane fade">
                             
                          </div>
                          <div id="menu2" class="tab-pane fade">
                            @include('admin.registration.pending')
                           
         
                          </div>
                          <div id="menu3" class="tab-pane fade">
                            @include('admin.registration.reject')
                          
                          </div>
                        </div> 

                    
                    </div>
                </div>
                
            </div>
            <!-- /.box-body -->
            
        </div>
        <!-- /.box -->
        @include('admin.registration.remarks')

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
       $("#blood").hide();
       $("#cate").hide();
        $("#cl").hide();        
        $("#se").hide(); 
    });
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
     
    
    $( "#report_for" ).change(function() { 
        var report = $("#report_for").val();                
         
        switch (report) {
            case '1':
            console.log('1'); 
                $("#class").show(); 
                $("#cate").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#classgroup").show();              
                $("#category").hide();  
                $("#incomeSlab").hide();
                 $("#professions").hide();
                break;
            case '2': 
            console.log('2'); 
                 $("#cate").show(); 
                 $("#class").hide();
                $("#classgroup").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#category").show(); 
                $("#incomeSlab").hide();
                 $("#professions").hide();
                break;
            case '3':
               $("#cate").hide(); 
                $("#class").hide();
                $("#classgroup").hide();  
                $("#category").show(); 
                $("#rel").show(); 
                $("#gen").hide();
                $("#religion").show(); 
                $("#gender").hide(); 
                $("#incomeSlab").hide();
                 $("#professions").hide();

                 
                break;
            case '4':
                $("#cate").hide(); 
                 $("#class").hide();
                 $("#classgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").show();
                 $("#religion").hide(); 
                 $("#gender").show();
                 $("#incomeSlab").hide();
                 $("#professions").hide();
                break;
            case '5':
                 $("#cate").hide(); 
                  $("#class").hide();
                  $("#classgroup").hide();  
                  $("#category").hide(); 
                  $("#rel").hide(); 
                  $("#gen").hide();
                  $("#religion").hide(); 
                  $("#gender").hide();
                  $("#incomeSlab").show();
                  $("#professions").hide();
                  $("#incomeSlab").show();
                 $("#professions").hide();
                 break;
            case '6':
                $("#cate").hide(); 
                 $("#class").hide();
                 $("#classgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").hide();
                 $("#religion").hide(); 
                 $("#gender").hide();
                 $("#incomeSlab").hide();
                 $("#professions").show();
                break;
            case '7':
                $("#cate").hide(); 
                 $("#class").hide();
                 $("#classgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").hide();
                 $("#religion").hide(); 
                 $("#gender").hide();
                 $("#incomeSlab").hide();
                 $("#professions").hide();
        }    
       // if($("#report_for").val() == 1){
       //   $("#class").show(); 
       //   $("#cate").remove();
       // }
       // else if($("#report_for").val() == 2){
       //  $("#class").remove();
       //  $("#cate").show(); 
       // }
         
    });
    $( "#report_form" ).on( "click", "#school_class", function() { 
       if($("#school_class").val() == 1){                  
        $("#cl").hide('slow');        
        $("#se").hide('slow');
        $("#class").hide('slow');        
        $("#section").hide('slow');
       }
       else if($("#school_class").val() == 2){   

        $("#cl").show('slow');        
        $("#se").show('slow');
         $("#class").show('slow');        
        $("#section").show('slow');  
       }
       else{ 
       } 
    });
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
     var text_max = 0;
     $('#textarea_feedback').html(text_max + ' characters ');

     $('#textarea').keyup(function() {
         var text_length = $('#textarea').val().length;
          

         $('#textarea_feedback').html(text_length + ' characters');
     });
 }); 
     function classWise(){
       
       if($('#class_wise').is(":checked")) {
               $('.class_div').show(400);
               $('.number_div').hide(400);
       } else {
           $('.class_div').hide(400);
           $('.number_div').show(400);
       }
     }
     function SectionWise(){
       if($('#class_wise').is(":checked") && $('#section_wise').is(":checked")) {
               $('.section_div').show();
       } else {
           $('.section_div').hide();
       }
     }
  
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

       function classChange(id){ alert(id);
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search') }}",
          data: { id: id }
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
       }
     
 </script>

@endpush

