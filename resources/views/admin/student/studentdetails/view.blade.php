@extends('admin.layout.base')
@push('links')
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
@endpush
@section('body')
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
                                      <li class="list-group-item">Username :-<span class="fs">{{ $student->username }}</span></li>
                                      <li class="list-group-item">Password :-<span class="fs">{{ $student->tem_pass }}</span></li>
                                      <li class="list-group-item">Name :-<span class="fs">{{ $student->name }}</span></li>
                                      <li class="list-group-item">Class :-<span class="fs">{{ $student->classes->name }}</span></li>
                                      <li class="list-group-item">Section :-<span class="fs">{{ $student->sectionTypes->name }}</span></li>
                                      <li class="list-group-item">Registration No :-<span class="fs">{{ $student->registration_no }}</span></li>
                                      <li class="list-group-item">Addmission No :-<span class="fs">{{ $student->admission_no }}</span></li>
                                      <li class="list-group-item">Date Of Addmission :-<span class="fs">{{Carbon\Carbon::parse($student->date_of_admission)->format('d-m-Y') }}</span></li>
                                      <li class="list-group-item">Date Of Leaving :-<span class="fs">{{ Carbon\Carbon::parse($student->date_of_leaving)->format('d-m-Y') }}</span></li>
                                      <li class="list-group-item">Date Of Birth :-<span class="fs">{{ Carbon\Carbon::parse($student->dob)->format('d-m-Y')  }}</span></li>
                                      <li class="list-group-item">Gender :-<span class="fs">{{ $student->genders->genders }}</span></li>
                                      
                                      
                                    </ul>
                                    
                                </div>

                                <div class="col-md-6 border_bottom">
                                    <ul class="list-group">
                                      <li class="list-group-item">Father's Name :-<span class="fs">{{ $student->father_name }}</span></li>
                                      <li class="list-group-item">Mother's Name :-<span class="fs">{{ $student->mother_name }}</span></li>
                                      <li class="list-group-item">Father's Mobile :-<span class="fs">{{ $student->father_mobile }}</span></li>
                                      <li class="list-group-item">Mother's Mobile :-<span class="fs">{{ $student->mother_name }}</span></li>                                     
                                      
                                      <li class="list-group-item">Category :-<span class="fs">{{ $student->categories->name }}</span></li>
                                      <li class="list-group-item">Religion :-<span class="fs">{{ $student->religions->name }}</span></li>
                             
                                      <li class="list-group-item">P Address : :-<span class="fs">{{ $student->p_address }}</span></li>
                                      <li class="list-group-item">C Address :-<span class="fs">{{ $student->c_address }}</span></li>
                                      <li class="list-group-item">City :-<span class="fs">{{ $student->city }}</span></li>
                                      <li class="list-group-item">State :-<span class="fs">{{ $student->state }}</span></li>
                                      <li class="list-group-item">Pincode :-<span class="fs">{{ $student->pincode }}</span></li>

                                      {{-- <li class="list-group-item">Status :-<span class="fs">{{ $student->StudentStatus->name }}</span></li> --}}
                                    </ul>
                                    
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-3">
                             @php
                             $profile = route('admin.student.image',$student->picture);
                             @endphp
                             <div class="col-md-12">
                                <div id="showImg">
                                     <div style="width: 150px; height: 180px;  background-color: #eee; border: 2px solid #d1f7ec">
                                       <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" style="width: 150px; height: 180px;  border: 2px solid #d1f7ec">
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
                           
                            @foreach (App\Model\ParentsInfo::where('student_id',$student->id)->get() as $parents) 
                            <tr>
                                <td>{{ $parents->name }}</td>
                                <td>{{ $parents->relationType->name or ''}}</td>
                                <td>{{ $parents->education }}</td>
                                <td>{{ $parents->occupation }}</td>
                                <td>{{ $parents->incomes->name }}</td>
                                <td>{{ $parents->mobile }}</td>
                                <td>{{ $parents->email }}</td>
                                <td>{{ $parents->bob }}</td>
                                <td>{{ $parents->doa }}</td>
                                <td>{{ $parents->office_address }}</td>
                                <td>{{ $parents->islive == 1? 'Yes' : 'No' }}</td>                            
                                                        
                                 
                                <td>
                                  @php
                             $image = route('admin.parents.image.show',$parents->photo);
                              
                             @endphp 
                               <img  src="{{ ($parents->photo)? $image : asset('profile-img/user.png') }}" style="width: 50px; height: 50px;  border: 2px solid #d1f7ec">

                                </td>
        

                                <td width="150px;">
                                    {{-- <a class="btn btn-warning btn-xs"  title="Edit Parents"><i class="fa fa-edit"></i></a> --}}
                                    
                                   {{--  <a href="{{ route('admin.parents.image',$parents->id) }}" title="" class="btn btn-success btn-xs"><i class="fa fa-image"></i></a> --}}

                                    <button type="button" class="btn_parents_image btn btn-info btn-xs" data-toggle="modal" data-id="{{ $parents->id }}" data-target="#image_parent"><i class="fa fa-image"></i> </button>

                                    <button type="button" class="parents_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $parents->id }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button>

                                    <button class="parents_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $parents->id }}"  ><i class="fa fa-trash"></i></button>

                                                     
                                </td>                          
                            </tr>
                            @endforeach
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
                            @foreach (App\Model\StudentMedicalInfo::where('student_id',$student->id)->get() as $medicalInfo)
                             <tr>
                                 <td>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</td>
                                 <td>{{ $medicalInfo->bloodgroups->name }}</td>
                                 <td>{{ $medicalInfo->hb }}</td>
                                 <td>{{ $medicalInfo->weight }}</td>
                                 <td>{{ $medicalInfo->height }}</td>
                                 <td>{{ $medicalInfo->narration }}</td>
                                 <td>{{ $medicalInfo->vision }}</td>
                                 <td>{{ $medicalInfo->complextion }}</td>
                                 <td>{{ $medicalInfo->alergey }}</td>
                                 <td>{{ $medicalInfo->alergeyvacc }}</td>
                                 <td>{{ $medicalInfo->physical_handicapped }}</td>
                                 <td>{{ $medicalInfo->dental }}</td>                                  
                                 <td>{{ $medicalInfo->bp }}</td> 
                                 <td>{{ $medicalInfo->id_marks1 }}</td>
                                 <td>{{ $medicalInfo->id_marks2 }}</td>
                                 <td>
                                    <button class="btn_medical_edit btn btn-warning btn-xs"  data-id="{{ $medicalInfo->id }}"  ><i class="fa fa-edit"></i></button>  
                                     <button class="btn_medical_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $medicalInfo->id }}"  ><i class="fa fa-trash"></i></button>
                                 </td>

                                                                  
                             </tr>
                             @endforeach
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
                         @foreach (App\Model\StudentSiblingInfo::where('student_id',$student->id)->get() as $sibling)
                          <tr> 
                              <td>{{ $sibling->siblings->registration_no  }}</td>
                              <td>{{ $sibling->siblings->name  or ''}}</td>
                              <td>{{ $sibling->siblings->classes->name  or '' }}</td>
                              <td>{{ $sibling->siblings->sectionTypes->name or ''  }}</td> 
                              <td>
                                 <button class="btn_sibling_edit btn btn-warning btn-xs"  data-id="{{ $sibling->id }}"  ><i class="fa fa-edit"></i></button>  
                                  <button class="btn_sibling_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $sibling->id }}"  ><i class="fa fa-trash"></i></button>
                              </td>

                                                               
                          </tr>
                          @endforeach
                        {{--    @foreach (App\Student::find($student->id)->siblings as $sibling)
                          <tr> 
                              <td>{{ $sibling->registration_no  }}</td>
                              <td>{{ $sibling->name  or ''}}</td>
                              <td>{{ $sibling->classes->name  or '' }}</td>
                              <td>{{ $sibling->sectionTypes->name or ''  }}</td> 
                              <td>
                                 <button class="btn_sibling_edit btn btn-warning btn-xs"  data-id="{{ $sibling->id }}"  ><i class="fa fa-edit"></i></button>  
                                  <button class="btn_sibling_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $sibling->id }}"  ><i class="fa fa-trash"></i></button>
                              </td>

                                                               
                          </tr>
                          @endforeach --}}
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
                           @foreach (App\Model\StudentSubject::where('student_id',$student->id)->get() as $studentSubject) 
                          <tr>
                              <td>{{ $studentSubject->SubjectTypes->name }}</td>
                              <td>{{ $studentSubject->ISOptionals->name }}</td>                             
                              <td>
                                {{-- <button class="btn_student_subject_edit btn btn-warning btn-xs"  data-id="{{ $studentSubject->id }}"  ><i class="fa fa-edit"></i></button>   --}}
                                 <button class="btn_student_subject_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $studentSubject->id }}"  ><i class="fa fa-trash"></i></button>
                          </tr>
                         @endforeach
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
                        @foreach (App\Model\StudentSportHobby::where('student_id',$student->id)->get() as $sportHobby) 
                           <tr>
                               <td>{{ Carbon\Carbon::parse($sportHobby->sessions->date)->format('d-m-Y')   }}</td>
                               <td>{{ $sportHobby->sports_activity_name }}</td>
                               <td>
                                <button class="btn_sport_hobby_edit btn btn-warning btn-xs"  data-id="{{ $sportHobby->id }}"  ><i class="fa fa-edit"></i></button>  
                                 <button class="btn_sport_hobby_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $sportHobby->id }}"  ><i class="fa fa-trash"></i></button>
                               </td>
                           </tr>
                         @endforeach
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
                        @foreach (App\Model\Document::where('student_id',$student->id)->get() as $document) 
                          <tr>
                              <td>{{ $document->documentTypes->name }}</td>
                              <td>{{ $document->name }}</td>                             
                              <td><a class="btn-success btn-xs"  href="{{ route('admin.document.download',$document->id) }}"  ><i class="fa fa-download"></i></a>
                                <a class="btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" href="{{ route('admin.document.delete',$document->id) }}"  ><i class="fa fa-trash"></i></a></td>
                          </tr>
                         @endforeach
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

   
 
@include('admin.student.studentdetails.include.webcam')
@include('admin.student.studentdetails.include.add_parents_info')
@include('admin.student.studentdetails.include.add_parents_image')
@include('admin.student.studentdetails.include.add_medical_info')
@include('admin.student.studentdetails.include.add_sibling_info')
@include('admin.student.studentdetails.include.add_subject')
@include('admin.student.studentdetails.include.add_sport_hobby')
@include('admin.student.studentdetails.include.add_document')
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
 <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
 {{-- <link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet"> --}}
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <style type="text/css" media="screen">
   #camera {
     width: 100%;
     height: 350px;
   }
 </style>
@endpush
 @push('scripts')
 <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<script src="{{ asset('jpeg_camera/jpeg_camera_with_dependencies.min.js') }}" type="text/javascript"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        
          $('#show_webcam').hide('400')
         
      $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
        $('#dataTable').DataTable();

    });
     var errors = '{{ $errors->first() }}';
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
      url: "{{ route('admin.student.profilepic.update',$student->id) }}",
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

 

@endpush