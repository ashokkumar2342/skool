<?php $__env->startPush('links'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css" media="screen">
.border_bottom{
  border-bottom: solid 1px #eee; 
}  
b{
  color:#275064;
  align-items: right;
}
.fs{
    float: right; font-weight:800;padding-right: 10px;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <section class="content">
        <div class="box">  
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-home"></i> Home</a></li>
              <li><a data-toggle="tab" href="#parent"><i class="fa fa-user-circle"></i> Parent Info</a></li>
              <li><a data-toggle="tab" href="#medical"><i class="fa fa-user-md"></i> Medical info</a></li>
              <li><a data-toggle="tab" href="#sibling"><i class="fa fa-users"></i> Siblling info</a></li>
              <li><a data-toggle="tab" href="#subjects"><i class="fa fa-book"></i>  Subjects</a></li>
              <li><a data-toggle="tab" href="#sport"><i class="fa fa-life-ring"></i> Sport hobby</a></li>
              <li><a data-toggle="tab" href="#document"><i class="fa fa-file"></i> Document</a></li>
            </ul>
            <div class="tab-content"  style="padding-left: 10px">
                <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-9">
                             <div class="row" style="padding-top: 20px">
                                <div class="col-md-6 border_bottom">
                                    <ul class="list-group">
                                      <li class="list-group-item">Username :-<span class="fs"><?php echo e($student->username); ?></span></li>
                                      <li class="list-group-item">Password :-<span class="fs"><?php echo e($student->tem_pass); ?></span></li>
                                      <li class="list-group-item">Name :-<span class="fs"><?php echo e($student->name); ?></span></li>
                                      <li class="list-group-item">Class :-<span class="fs"><?php echo e($student->classes->name); ?></span></li>
                                      <li class="list-group-item">Section :-<span class="fs"><?php echo e($student->sectionTypes->name); ?></span></li>
                                      <li class="list-group-item">Registration No :-<span class="fs"><?php echo e($student->registration_no); ?></span></li>
                                      <li class="list-group-item">Addmission No :-<span class="fs"><?php echo e($student->admission_no); ?></span></li>
                                      <li class="list-group-item">Date Of Addmission :-<span class="fs"><?php echo e(Carbon\Carbon::parse($student->date_of_admission)->format('d-m-Y')); ?></span></li>
                                      <li class="list-group-item">Date Of Leaving :-<span class="fs"><?php echo e(Carbon\Carbon::parse($student->date_of_leaving)->format('d-m-Y')); ?></span></li>
                                      <li class="list-group-item">Date Of Birth :-<span class="fs"><?php echo e(Carbon\Carbon::parse($student->dob)->format('d-m-Y')); ?></span></li>
                                      <li class="list-group-item">Gender :-<span class="fs"><?php echo e($student->genders->genders); ?></span></li>
                                      
                                      
                                    </ul>
                                    
                                </div>

                                <div class="col-md-6 border_bottom">
                                    <ul class="list-group">
                                      <li class="list-group-item">Father's Name :-<span class="fs"><?php echo e($student->father_name); ?></span></li>
                                      <li class="list-group-item">Mother's Name :-<span class="fs"><?php echo e($student->mother_name); ?></span></li>
                                      <li class="list-group-item">Father's Mobile :-<span class="fs"><?php echo e($student->father_mobile); ?></span></li>
                                      <li class="list-group-item">Mother's Mobile :-<span class="fs"><?php echo e($student->mother_name); ?></span></li>                                     
                                      
                                      <li class="list-group-item">Category :-<span class="fs"><?php echo e($student->categories->name); ?></span></li>
                                      <li class="list-group-item">Religion :-<span class="fs"><?php echo e($student->religions->name); ?></span></li>
                             
                                      <li class="list-group-item">P Address : :-<span class="fs"><?php echo e($student->p_address); ?></span></li>
                                      <li class="list-group-item">C Address :-<span class="fs"><?php echo e($student->c_address); ?></span></li>
                                      <li class="list-group-item">City :-<span class="fs"><?php echo e($student->city); ?></span></li>
                                      <li class="list-group-item">State :-<span class="fs"><?php echo e($student->state); ?></span></li>
                                      <li class="list-group-item">Pincode :-<span class="fs"><?php echo e($student->pincode); ?></span></li>

                                      
                                    </ul>
                                    
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-3">
                             <?php
                             $profile = route('admin.student.image',$student->picture);
                             ?>
                             <div class="col-md-12">
                                <div id="showImg">
                                     <div style="width: 150px; height: 180px;  background-color: #eee; border: 2px solid #d1f7ec">
                                       <img  src="<?php echo e(($student->picture)? $profile : asset('profile-img/user.png')); ?>" style="width: 150px; height: 180px;  border: 2px solid #d1f7ec">
                                     </div>
                                    <div style="padding-left: 15px; padding-top: 5px;">
                                       <a class="btn_change_image btn btn-success btn-xs" href="javascript:;">Change Image</a>                              
                                       <a class="btn_web btn btn-default btn-xs" href="javascript:;"><i class="fa fa-camera"></i></a>                              
                                    </div>
                                </div>                                  
                            </div>
                        </div>                        
                    </div>
                </div>
                <div id="parent" class="tab-pane fade">
                    <div class="box-header">                       
                      <span  ><button type="button" class="add_btn_parets btn btn-info btn-sm" data-toggle="modal" data-target="#add_parent">Add Parents info</button></span> 
                    </div>
                    <table class="table" id="parents_items"> 
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Relation</th>
                                <th>Education</th>
                                <th>Occupation</th>
                                <th>Income</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Dob</th>
                                <th>Doa</th>
                                <th>Office Address</th>
                                <th>Islive</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php $__currentLoopData = App\Model\ParentsInfo::where('student_id',$student->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                <td><?php echo e($parents->name); ?></td>
                                <td><?php echo e(isset($parents->relationType->name) ? $parents->relationType->name : ''); ?></td>
                                <td><?php echo e($parents->education); ?></td>
                                <td><?php echo e($parents->occupation); ?></td>
                                <td><?php echo e($parents->incomes->name); ?></td>
                                <td><?php echo e($parents->mobile); ?></td>
                                <td><?php echo e($parents->email); ?></td>
                                <td><?php echo e($parents->bob); ?></td>
                                <td><?php echo e($parents->doa); ?></td>
                                <td><?php echo e($parents->office_address); ?></td>
                                <td><?php echo e($parents->islive == 1? 'Yes' : 'No'); ?></td>                            
                                                        
                                 
                                <td>
                                  <?php
                             $image = route('admin.parents.image.show',$parents->photo);
                              
                             ?> 
                               <img  src="<?php echo e(($parents->photo)? $image : asset('profile-img/user.png')); ?>" style="width: 50px; height: 50px;  border: 2px solid #d1f7ec">

                                </td>
        

                                <td width="150px;">
                                    
                                    
                                   

                                    <button type="button" class="btn_parents_image btn btn-info btn-xs" data-toggle="modal" data-id="<?php echo e($parents->id); ?>" data-target="#image_parent"><i class="fa fa-image"></i> </button>

                                    <button type="button" class="parents_edit btn btn-warning btn-xs" data-toggle="modal" data-id="<?php echo e($parents->id); ?>" data-target="#add_parent"><i class="fa fa-edit"></i> </button>

                                    <button class="parents_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="<?php echo e($parents->id); ?>"  ><i class="fa fa-trash"></i></button>

                                                     
                                </td>                          
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>                        
                </div>
                 <div id="medical" class="tab-pane fade">
                    <button type="button" class="btn btn-info btn-sm btn_add_medical_info" data-toggle="modal" data-target="#add_medical">Add Medical info</button>
                    <table class="table" id="medical_items">                         
                         <thead>
                             <tr>
                                 <th>Ondate</th>
                                 <th>Blood Group</th>
                                 <th>HB</th>
                                 <th>Weight</th>
                                 <th>Height</th>
                                 <th>Narration</th>
                                 <th>Vision</th>
                                 <th>Complextion</th>
                                 <th>Alergey</th>
                                 <th>Alergey Vacc</th>
                                 <th>Physical Handicapped</th>
                                 <th>Dental</th>
                                 <th>BP</th>
                                 <th>Id Marks1</th>
                                 <th>Id Marks2</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php $__currentLoopData = App\Model\StudentMedicalInfo::where('student_id',$student->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicalInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr>
                                 <td><?php echo e(Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y')); ?></td>
                                 <td><?php echo e($medicalInfo->bloodgroups->name); ?></td>
                                 <td><?php echo e($medicalInfo->hb); ?></td>
                                 <td><?php echo e($medicalInfo->weight); ?></td>
                                 <td><?php echo e($medicalInfo->height); ?></td>
                                 <td><?php echo e($medicalInfo->narration); ?></td>
                                 <td><?php echo e($medicalInfo->vision); ?></td>
                                 <td><?php echo e($medicalInfo->complextion); ?></td>
                                 <td><?php echo e($medicalInfo->alergey); ?></td>
                                 <td><?php echo e($medicalInfo->alergeyvacc); ?></td>
                                 <td><?php echo e($medicalInfo->physical_handicapped); ?></td>
                                 <td><?php echo e($medicalInfo->dental); ?></td>                                  
                                 <td><?php echo e($medicalInfo->bp); ?></td> 
                                 <td><?php echo e($medicalInfo->id_marks1); ?></td>
                                 <td><?php echo e($medicalInfo->id_marks2); ?></td>
                                 <td>
                                    <button class="btn_medical_edit btn btn-warning btn-xs"  data-id="<?php echo e($medicalInfo->id); ?>"  ><i class="fa fa-edit"></i></button>  
                                     <button class="btn_medical_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="<?php echo e($medicalInfo->id); ?>"  ><i class="fa fa-trash"></i></button>
                                 </td>

                                                                  
                             </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                     </table> 
                 </div>   
                <div id="sibling" class="tab-pane fade">
                 <button type="button" class="btn btn-info btn-sm btn_add_sibling_info" data-toggle="modal" data-target="#add_sibling">Add Sibling info</button>
                 <table class="table" id="sibling_items">                         
                      <thead>
                          <tr>
                              <th>Sibling Registration No</th>
                              <th>Name</th>
                              <th>Class</th>
                              <th>Section</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php $__currentLoopData = App\Model\StudentSiblingInfo::where('student_id',$student->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sibling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr> 
                              <td><?php echo e($sibling->siblings->registration_no); ?></td>
                              <td><?php echo e(isset($sibling->siblings->name) ? $sibling->siblings->name : ''); ?></td>
                              <td><?php echo e(isset($sibling->siblings->classes->name) ? $sibling->siblings->classes->name : ''); ?></td>
                              <td><?php echo e(isset($sibling->siblings->sectionTypes->name) ? $sibling->siblings->sectionTypes->name : ''); ?></td> 
                              <td>
                                 <button class="btn_sibling_edit btn btn-warning btn-xs"  data-id="<?php echo e($sibling->id); ?>"  ><i class="fa fa-edit"></i></button>  
                                  <button class="btn_sibling_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="<?php echo e($sibling->id); ?>"  ><i class="fa fa-trash"></i></button>
                              </td>

                                                               
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                      </tbody>
                  </table>
                </div>

                <div id="subjects" class="tab-pane fade">
                  <button type="button" class="btn btn-info btn-sm add_subject" data-toggle="modal" data-target="#add_subject">Add Subject</button>
                  <table class="table" id="subject_items">                         
                       <thead>
                           <tr>
                               <th>Subject Name</th>
                               <th>ISOptional</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $__currentLoopData = App\Model\StudentSubject::where('student_id',$student->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentSubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                          <tr>
                              <td><?php echo e($studentSubject->SubjectTypes->name); ?></td>
                              <td><?php echo e($studentSubject->ISOptionals->name); ?></td>                             
                              <td>
                                
                                 <button class="btn_student_subject_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="<?php echo e($studentSubject->id); ?>"  ><i class="fa fa-trash"></i></button>
                          </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                   </table>
                </div>
                <div id="sport" class="tab-pane fade">
                   <button type="button" class="btn btn-info btn-sm btn_add_sport_hobby" data-toggle="modal"   data-target="#add_sport_hobby">Sport Hobby</button>
                  <table class="table" id="sport_hobby_items">                         
                       <thead>
                           <tr>
                               <th>Academic Year Prize</th>
                               <th>Sports Activity Name</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php $__currentLoopData = App\Model\StudentSportHobby::where('student_id',$student->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sportHobby): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                           <tr>
                               <td><?php echo e(Carbon\Carbon::parse($sportHobby->sessions->date)->format('d-m-Y')); ?></td>
                               <td><?php echo e($sportHobby->sports_activity_name); ?></td>
                               <td>
                                <button class="btn_sport_hobby_edit btn btn-warning btn-xs"  data-id="<?php echo e($sportHobby->id); ?>"  ><i class="fa fa-edit"></i></button>  
                                 <button class="btn_sport_hobby_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="<?php echo e($sportHobby->id); ?>"  ><i class="fa fa-trash"></i></button>
                               </td>
                           </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                   </table>
                </div>

                <div id="document" class="tab-pane fade">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_document">Add Document</button>
                 <table class="table" id="document_items">                         
                      <thead>
                          <tr>
                              <th>Document Type Name</th>
                              <th>Doc Nmae</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = App\Model\Document::where('student_id',$student->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                          <tr>
                              <td><?php echo e($document->documentTypes->name); ?></td>
                              <td><?php echo e($document->name); ?></td>                             
                              <td><a class="btn-success btn-xs"  href="<?php echo e(route('admin.document.download',$document->id)); ?>"  ><i class="fa fa-download"></i></a>
                                <a class="btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" href="<?php echo e(route('admin.document.delete',$document->id)); ?>"  ><i class="fa fa-trash"></i></a></td>
                          </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
          <!-- /.box -->
          <!-- Trigger the modal with a button -->
        <div class="row" id="crop-show">
            <div class="col-md-4 text-center">
                <div id="upload-demo" style="width:350px"></div>
            </div>
            <div class="col-md-4" style="padding-top:30px;">
                <strong>Select Image:</strong>
                <br/>
                <input type="file" id="upload">
                <br/>
                <button class="btn btn-success upload-result">Upload Image</button>
                <button class="btn btn-danger" id="crop-hide">Hide</button>
            </div>    
        </div>        

    </section>

   
 
<?php echo $__env->make('admin.student.studentdetails.include.webcam', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.student.studentdetails.include.add_parents_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.student.studentdetails.include.add_parents_image', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.student.studentdetails.include.add_medical_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.student.studentdetails.include.add_sibling_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.student.studentdetails.include.add_subject', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.student.studentdetails.include.add_sport_hobby', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.student.studentdetails.include.add_document', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
 <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
 
 <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
 <style type="text/css" media="screen">
   #camera {
     width: 100%;
     height: 350px;
   }
 </style>
<?php $__env->stopPush(); ?>
 <?php $__env->startPush('scripts'); ?>
 <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<script src="<?php echo e(asset('jpeg_camera/jpeg_camera_with_dependencies.min.js')); ?>" type="text/javascript"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        
          $('#show_webcam').hide('400')
         
      $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
        $('#dataTable').DataTable();

    });
     var errors = '<?php echo e($errors->first()); ?>';
     if (errors) {
      $("#addfee").modal('show');
     }
 </script>
 <script type="text/javascript"> 
  $(document).ready(function(){
    $("#crop-show").hide();
    $('#showImg').on('click','.btn_change_image',function(){
      $('#crop-show').show();            
    });
    
    $('#crop-hide').on('click',function(){
      $('#crop-show').hide();           
    });
  });
</script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 250,         
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
    $.ajax({
      url: "<?php echo e(route('admin.student.profilepic.update',$student->id)); ?>",
      type: "POST",
      data: {"image":resp},
      success: function (data) {        
        $("#showImg").load(location.href + ' #showImg');
         $('#crop-show').hide(); 
      }
    });
  });
});

</script>

 

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>