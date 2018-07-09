<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Student Search </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  <form class="form-vertical">
                         <div class="col-lg-6">                           
                               
                            <div class="input-group">
                              <div class="input-group-addon"> Student Search
                                
                              </div>
                               <input type="text" class="form-control" name="search" id="search">
                               <?php echo e(csrf_field()); ?> 
                            </div>  
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
                             <table id="student_search_table" placeholder="Search here..." class="display table">                     
                                 <thead>
                                     <tr>
                                         <th>Sn</th>
                                         <th>Student Name</th>
                                         <th>Registration No</th> 
                                         <th>Father's Name</th>                               
                                         <th>Mother's Name</th>                               
                                         <th>Date of Birth</th>                               
                                         <th>Mobile</th>                               
                                         <th>Action</th>                                                            
                                     </tr>
                                 </thead>
                                 <tbody id="searchResult">
                                                                    
                                 </tbody>
                                 
                             </table>
                            

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
    $('#search').keyup(function(event) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#searchResult').show()
        var search = $('#search').val();
         
        $.ajax({
            url: '<?php echo e(route('admin.student.search')); ?>',
            type: 'post',
           
            data: {'search':search},
        })
        .done(function(response) {
            $('#searchResult').find('td').remove();
            $.each(response.students, function(index, student) {
                 $('#searchResult').append(
                    '<tr>'+
                    '<td>'+ student.id + '</td>'+
                    '<td>'+ student.name + '</td>'+
                    '<td>'+ student.registration_no + '</td>'+
                    '<td>'+ student.father_name + '</td>'+
                    '<td>'+ student.mother_name + '</td>'+
                    '<td>'+ student.dob + '</td>'+
                    '<td>'+ student.father_mobile + '</td>'+ 
                    '<td><a href="<?php echo e(route('admin.student.search')); ?>/'+ student.id +'"><button class="btn_delete btn btn-success btn-xs"><i class="fa fa-eye"></i></button></a></td>'
                    +'</tr>' 
                    );
            });
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        

      
    }) 
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>