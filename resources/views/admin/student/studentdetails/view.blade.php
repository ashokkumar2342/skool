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
          <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.student.preview',$student->id) }}')" style="margin:5px">Preview</button>

          <a href="{{ route('admin.student.pdf.generate',$student->id) }}" class="btn btn-success pull-right" title="Pdf" target="_blank" style="margin:5px">Download Profile</a>
          
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home" id="student_tab"><i class="fa fa-home"></i> Student Details</a></li>
              <li><a data-toggle="tab" data-table="parents_items" href="#parent" id="parent_info"  onclick="callAjax(this,'{{ route('admin.parents.list',$student->id) }}','parent_info_list')"><i class="fa fa-user-circle"></i> Parent Info</a></li>
              <li><a data-toggle="tab" data-table="medical_info_table" href="#medical" id="medical_info_tab" onclick="callAjax(this,'{{ route('admin.medical.info.list',$student->id) }}','medical_info_page')"><i class="fa fa-user-md" id="medical_info"></i> Medical info</a></li>
              <li><a data-toggle="tab" href="#sibling"><i class="fa fa-users" id="sibling_info"></i> Siblling info</a></li>
              <li><a data-toggle="tab" href="#subjects"><i class="fa fa-book" id="subject_tab"></i>  Subjects</a></li>
              <li><a data-toggle="tab" href="#sport"><i class="fa fa-life-ring" id="sport_tab"></i> Sport hobby</a></li>
              <li><a data-toggle="tab" href="#document"><i class="fa fa-file" id="document_tab"></i> Document</a></li>
            </ul>
            <div class="tab-content"  style="padding-left: 10px">
                <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-9">
                             <div class="row" style="padding-top: 20px">
                               <form action="{{ route('admin.student.view-update',$student->id) }}" method="post" accept-charset="utf-8" class="add_form" no-reset="true"> 
                               {{ csrf_field() }}
                                <div class="col-md-6 border_bottom">
                                    <ul class="list-group">
                                     
                                      <li class="list-group-item">Name :-<span class="fs"><input type="text" value="{{ $student->name }}" maxlength="50" name="student_name"> </span></li>
                                      <li class="list-group-item">Nick Name :-<span  class="fs"><input type="text" maxlength="50" value="{{ $student->nick_name }}" name=""> </span></li>
                                      <li class="list-group-item">Email :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->email }}" disabled> </span></li>
                                      <li class="list-group-item">Class :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->classes->name }}" name="nick_name"> </span></li>
                                      <li class="list-group-item">Section :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->sectionTypes->name }}" > </span></li>
                                      <li class="list-group-item">Registration No :-<span class="fs"><input type="text" disabled="" value="{{ $student->registration_no }}" > </span></li>
                                      <li class="list-group-item">Addmission No :-<span class="fs"><input type="text" disabled="" value="{{ $student->admission_no }}" > </span></li>
                                      <li class="list-group-item">Date Of Addmission :-<span class="fs"><input type="text" maxlength="50" value="{{Carbon\Carbon::parse($student->date_of_admission)->format('d-m-Y') }}" name="date_of_admission"> </span></li>
                                      <li class="list-group-item">Date of Activation :-<span class="fs"><input type="text" maxlength="50" value="{{ Carbon\Carbon::parse($student->date_of_activation)->format('d-m-Y') }}" name="date_of_activation"> </span></li>
                                      <li class="list-group-item">Date Of Birth :-<span class="fs"><input type="text" maxlength="10" value="{{ Carbon\Carbon::parse($student->dob)->format('d-m-Y')  }}" name="date_of_birth"> </span></li>
                                      <li class="list-group-item">Gender :-<span class="fs"><input type="text" value="{{ $student->genders->genders }}" disabled=""> </span></li>
                                       
                                      <li class="list-group-item" style="min-height: 90px">Parmanent Address  :-<span class="fs"><textarea  name="p_address" maxlength="200" rows="3"> {{ $student->p_address }}</textarea></span></li>

                                      
                                      
                                    </ul>
                                    
                                </div>

                                <div class="col-md-6 border_bottom">
                                    <ul class="list-group">
                                       <li class="list-group-item">User Name :-<span class="fs"><input type="text" value="{{ $student->username }}" disabled=""> </span></li>
                                      <li class="list-group-item">Password :-<span class="fs"><input type="text" disabled="" value="{{ $student->tem_pass }}" name=""> </span></li>
                                      <li class="list-group-item">Father's Name :-<span class="fs"><input type="text" maxlength="10" value="{{ $student->father_name }}" name="father_name"> </span></li>
                                      <li class="list-group-item">Mother's Name :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->mother_name }}" name="mother_name"> </span></li>
                                      <li class="list-group-item">Father's Mobile :-<span  class="fs"><input type="text" maxlength="10" value="{{ $student->father_mobile }}" name="father_mobile"></span></li>
                                      <li class="list-group-item">Mother's Mobile :-<span class="fs"><input type="text" maxlength="10" value="{{ $student->mother_mobile}}" name="mother_mobile"> </span></li>                                     
                                      
                                      <li class="list-group-item">Category :-<span class="fs"><input type="text" value="{{ $student->categories->name }}" disabled=""> </span></li>
                                      <li class="list-group-item">Religion :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->religions->name }}" disabled=""> </span></li> 
                                      <li class="list-group-item">City :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->city }}" name="city"> </span></li>
                                      <li class="list-group-item">State :-<span class="fs"><input type="text" value="{{ $student->state }}" name="state"> </span></li>
                                      <li class="list-group-item">Pincode :-<span class="fs"><input type="text" maxlength="6" value="{{ $student->pincode }}" name="pincode"> </span></li> 
                                      {{-- <li class="list-group-item">Status :-<span class="fs"><input type="text" value="{{ $student->StudentStatus->name }}" disabled="" name=""> </span></li> --}}
                                      <li class="list-group-item" style="min-height: 90px">Corespondance Address :-<span class="fs"><textarea rows="3" name="c_address" maxlength="200"> {{ $student->c_address }}</textarea></span></li>

                                     
                                    </ul>
                                    
                                </div> 
                                <div class="text-center">
                                <input type="submit" class="btn btn-success btn-sm"  value="Update"> 
                                <button type="button" onclick="$('#parent_info').click()" class="btn btn-success btn-sm">Next</button>
                                </div>
                              </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                             @php
                             $profile = route('admin.student.image',$student->picture);
                             @endphp
                             <div class="col-md-12 center-block">
                                <div id="showImg">
                                     <div style="width: 150px; height: 180px;  background-color: #eee; border: 2px solid #d1f7ec">
                                       <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" style="width: 150px; height: 180px;  border: 2px solid #d1f7ec">
                                     </div>
                                    <div style="padding-left: 15px; padding-top: 5px; padding-bottom: 15px">
                                       <a class="btn_change_image btn btn-success btn-xs" href="javascript:;">Upload Image </a>                              
                                       <a class="btn_web btn btn-default btn-xs" onclick="callPopupMd(this,'{{ route('admin.student.camera',$student->id) }}')" href="javascript:;"><i class="fa fa-camera" style="margin: 10px"></i></a>                              
                                    </div>
                                </div>                                  
                            </div>
                            <div id="crop-show" > 
                                <div id="upload-demo"></div> 
                                <div>
                                    <strong>Select Image:</strong>
                                    <br/>
                                    <input type="file" id="upload" accept="image/x-png,image/jpeg">
                                    <br/>
                                    <button class="btn btn-success upload-result">Upload Image</button>
                                    <button class="btn btn-danger" id="crop-hide">Hide</button>
                                </div>    
                            </div>
                           <div id="camera_div">
                              @include('admin.student.studentdetails.include.webcam')
                            </div> 
                        </div>                        
                    </div>
                </div>
                <div id="parent" class="tab-pane fade">
                                        
                      <span ><button type="button" class="add_btn_parets btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.parents.add.form',$student->id) }}')" style="margin: 10px">Add Parents info</button></span> 
                    
                   <div class="table-responsive" id="parent_info_list">
                    </div> 
                </div>
                 <div id="medical" class="tab-pane fade">
                    <button type="button" class="btn btn-info btn-sm btn_add_medical_info" onclick="callPopupLarge(this,'{{ route('admin.medical.info.add.form',$student->id) }}')" style="margin: 10px">Add Medical info</button>
                     
                    <div class="table-responsive" id="medical_info_page">
                   
                   </div>
                     
                 </div>   
                <div id="sibling" class="tab-pane fade">
                 <button type="button" class="btn btn-info btn-sm btn_add_sibling_info" data-toggle="modal" data-target="#add_sibling" style="margin: 10px">Add Sibling info</button>
                 <div class="col-lg-12 table-responsive">
                 <table class="table" id="sibling_items">                         
                      <thead>
                          <tr>
                              <th><span class="text-nowrap">Sibling Registration No</span></th>
                              <th><span class="text-nowrap">Name</span></th>
                              <th><span class="text-nowrap">Class</span></th>
                              <th><span class="text-nowrap">Section</span></th>
                              <th><span class="text-nowrap">Action</span></th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach (App\Model\StudentSiblingInfo::where('student_id',$student->id)->get() as $sibling)
                          <tr> 
                              <td>{{ $sibling->siblings->registration_no or '' }}</td>
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
                  <div class="text-center">
                     <button type="button" onclick="$('#subject_tab').click()" class="btn btn-success btn-sm">Next</button> 
                  </div>
                </div>

                <div id="subjects" class="tab-pane fade">
                  <button type="button" class="btn btn-info btn-sm add_subject" style="margin: 10px" data-toggle="modal" data-target="#add_subject">Add Subject</button>
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
                              <td>{{ $studentSubject->SubjectTypes->name or ''}}</td>
                              <td>{{ $studentSubject->ISOptionals->name or ''}}</td>                             
                              <td>
                                {{-- <button class="btn_student_subject_edit btn btn-warning btn-xs"  data-id="{{ $studentSubject->id }}"  ><i class="fa fa-edit"></i></button>   --}}
                                 <button class="btn_student_subject_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $studentSubject->id }}"  ><i class="fa fa-trash"></i></button>
                          </tr>
                         @endforeach
                       </tbody>
                   </table>
                   <div class="text-center">
                      <button type="button" onclick="$('#sport_tab').click()" class="btn btn-success btn-sm">Next</button> 
                   </div>
                </div>
                <div id="sport" class="tab-pane fade">
                   <button type="button" class="btn btn-info btn-sm btn_add_sport_hobby" style="margin: 10px" data-toggle="modal"   data-target="#add_sport_hobby">Sport Hobby</button>
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
                               <td>{{$sportHobby->sessions->date or ''  }}</td>
                               <td>{{ $sportHobby->sports_activity_name }}</td>
                               <td>
                                <button class="btn_sport_hobby_edit btn btn-warning btn-xs"  data-id="{{ $sportHobby->id }}"  ><i class="fa fa-edit"></i></button>  
                                 <button class="btn_sport_hobby_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $sportHobby->id }}"  ><i class="fa fa-trash"></i></button>
                               </td>
                           </tr>
                         @endforeach
                       </tbody>
                   </table>
                   <div class="text-center">
                     <button type="button" onclick="$('#document_tab').click()" class="btn btn-success btn-sm">Next</button> 
                  </div>
                </div>

                <div id="document" class="tab-pane fade">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" style="margin: 10px" data-target="#add_document">Add Document</button>
                 <table class="table" id="document_items">                         
                      <thead>
                          <tr>
                              <th>Document Type Name</th>
                              <th>Doc Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach (App\Model\Document::where('student_id',$student->id)->get() as $document) 
                          <tr>
                              <td>{{ $document->documentTypes->name }}</td>
                              <td>{{ $document->name }}</td>                             
                              <td> 
                                <a href="{{ url('storage/'.$document->document_url) }}" target="blank" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>
                                <a class="btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" href="{{ route('admin.document.delete',$document->id) }}"  ><i class="fa fa-trash"></i></a></td>
                          </tr>
                         @endforeach
                      </tbody>
                  </table>
                   <div class="text-center">
                     <button type="button" onclick="$('#student_tab').click()" class="btn btn-success btn-sm">Student Details</button> 
                  </div>
                </div>
            </div>
        </div>
          <!-- /.box -->
          <!-- Trigger the modal with a button -->
               

    </section>

   
 

{{-- @include('admin.student.studentdetails.include.add_parents_info') --}}
@include('admin.student.studentdetails.include.add_parents_image')
{{-- @include('admin.student.studentdetails.include.add_medical_info') --}}
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
        $('#medical_items').DataTable();
        $('#parents_items').DataTable();
        $('#sibling_items').DataTable();

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
      $('#show_webcam').hide();           
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
        width: 210,
        height: 260
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