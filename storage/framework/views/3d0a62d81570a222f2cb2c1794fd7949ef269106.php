<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Student Fee Assign </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  <form class="form-vertical" action="<?php echo e(route('admin.studentFeeAssign.show')); ?>" method="get">
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('academic_year_id','Academic Year',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control','placeholder'=>"Select Academic Year",'required'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                       
                        <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('student_id','Registration No',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('student_id',$students,null,['class'=>'form-control student_list_select','placeholder'=>"Select Registration",'required'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>                                                             
                       <div class="col-lg-2" style="padding-top: 20px;">
                       <input type="submit" class="btn btn-success"  value="Show">                                             
                       
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
               

                </div>
            </div>    

           
 
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?> 
 <?php $__env->startPush('scripts'); ?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <script> 
    $( ".datepicker").datepicker();   
 
 </script>
  <script>
    $('#btn_student_fee_detail_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '<?php echo e(route('admin.studentFeeAssign.post')); ?>',
           type: 'POST',       
           data: $('#form_student_fee_detail').serialize() ,
      })
      .done(function(data) {
        if (data.class === 'error') {                 
             $.each(data.errors, function(index, val) {
                 toastr[data.class](val) 
             }); 
        }
          else {                 
            toastr[data.class](data.message)  
            $("#form_student_fee_detail")[0].reset(); 
            $("#student_fee_detail_table").load(location.href + ' #student_fee_detail_table'); 
        } 
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      }); 
    });/////////////////delete///////////////////
    $('#student_fee_detail_table').on('click', '.btn_delete', function(event) {
      var cm = confirm("Are you Sure Delete!");
      if (cm == true) {
           event.preventDefault();  
           var id = $(this).data("id");
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });      
           $.ajax({
               url: '<?php echo e(route('admin.feeStructureLastDate.delete')); ?>',
               type: 'delete',
               data: {id: id},
           })
           .done(function(data) {
               toastr[data.class](data.message)
               $("#student_fee_detail_table").load(location.href + ' #student_fee_detail_table'); 
           })
           .fail(function() {
               console.log("error");
           })
           .always(function() {
               console.log("complete");
           });
      } else {
          console.log("cancel");
      }
        
    });///////////////////edit//////////// 
     $('#student_fee_detail').on('click', '.btn_edit', function(event) {
         event.preventDefault();  
         $('.modal-title').text('Edit');
         $('#edit_id').val($(this).data('id'));        
         $('#edit_code').val($(this).data('code'));        
         $('#edit_name').val($(this).data('name'));        
        $('#edit_fee_account').val($(this).data('feeaccount'));   
         $('#edit_fine_scheme').val($(this).data('finescheme'));        
         $('#edit_Is_refundable').val($(this).data('refundable')); 
         $('#fee_structure_model').modal('show');
    });////////////////update/////////////
   $('#fee_structure_model').on('click', '.btn_update', function(event) {
       event.preventDefault(); 
       $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '<?php echo e(route('admin.feeStructureLastDate.update')); ?>',
           type: 'put',       
           data: $('#form_model_fee_structure').serialize() ,
      })
      .done(function(data) {
        if (data.class === 'error') {                 
             $.each(data.errors, function(index, val) {
                 toastr[data.class](val) 
             }); 
        }
          else {                 
            toastr[data.class](data.message)  
            $("#form_model_student_fee_detail")[0].reset();
            $('#student_fee_detail_model').modal('hide');

            $("#student_fee_detail_table").load(location.href + ' #student_fee_detail_table'); 
        } 
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });  
  });
 
   $('#academic_year_id').change(function(event) {
     
     event.preventDefault();
   
     $.ajax({
         url: '<?php echo e(route('admin.academic.year.search')); ?>',
         type: 'get', 
         data: {academic_year_id: $('#academic_year_id').val()},
     })
     .done(function(data) {

         $("#from_date").val(data.start_date);
         $("#to_date").val(data.end_date);
     })
     .fail(function() {
         console.log("error");
     })
     .always(function() {
         console.log("complete");
     });
   
   });
     
  </script>
  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.student_list_select').select2();
    });
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>