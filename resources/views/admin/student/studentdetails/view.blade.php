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
    float: right; font-weight:750;padding-right: 10px;
}
</style>
@endpush
@section('body')
    <section class="content">
        <div class="box"> 
        @php
           $admissionApplication=App\Model\AdmissionApplication::where('student_id',$student->id)->first();
         @endphp 
         @if ($student->student_status_id==1)
           <button type="button" class="btn btn-xs btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.student.preview',$student->id) }}')" style="margin:5px">Preview</button>

          <a href="{{ route('admin.student.pdf.generate',$student->id) }}" class="btn btn-xs btn-success pull-right" title="Download Profile " target="_blank" style="margin:5px">PDF</a>
         @endif
         @if (!empty($admissionApplication))  
          @if ($admissionApplication->status>=2) 
          <a href="{{ route('admin.student.registration.profile.view',$student->id) }}" class="btn btn-xs btn-primary pull-right" title="Download Profile " target="_blank" style="margin:5px">View Details</a> 
          @endif
        @endif

           @php
             if ($userId->role_id==12){ 
               $hidden='hidden'; 
              }
              else{ 
               $hidden=''; 
              }
           @endphp

           
          
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home" id="student_tab"><i class="fa fa-user"></i> Student Details</a></li>
              <li><a data-toggle="tab" data-table="sibling_items" class="{{ $hidden }}" href="#sibling" id="sibling_info_tab"  onclick="callAjax(this,'{{ route('admin.sibling.table.show',$student->id) }}','sibling_info_list')"><i class="fa fa-users" id="sibling_info"></i> Sibling Detail</a></li>
              <li><a data-toggle="tab" data-table="parents_items" href="#parent" id="parent_info_tab" class="{{ $showHide }}" onclick="callAjax(this,'{{ route('admin.parents.list',$student->id) }}','parent_info_list')"><i class="fa fa-user-circle"></i> Parent Detail</a></li>

              <li><a data-toggle="tab" href="#address" data-table="address_info_table" id="address_info"class="{{ $showHide }}" onclick="callAjax(this,'{{ route('admin.parents.address',$student->id) }}','address_list')"><i class="fa fa-home"></i> Address</a></li>

              <li><a data-toggle="tab" data-table="medical_info_table" href="#medical" id="medical_info_tab" onclick="callAjax(this,'{{ route('admin.medical.info.list',$student->id) }}','medical_info_page')"><i class="fa fa-user-md" id="medical_info"></i> Medical Detail</a></li>
              <li><a data-toggle="tab" href="#subjects" id="subject_tab" onclick="callAjax(this,'{{ route('admin.studentSubject.list',$student->id) }}','subject_list')"><i class="fa fa-book" {{-- id="subject_tab" --}}></i>  Subjects</a></li>
              <li><a data-toggle="tab" href="#sport" id="sport_hobbies_tab" onclick="callAjax(this,'{{ route('admin.hobby.show',$student->id) }}','sport_hobbies_list')"><i class="fa fa-life-ring" id="sport_tab"></i> Sports/Hobbies</a></li>
              <li><a data-toggle="tab" href="#document"><i class="fa fa-file" id="document_tab"></i> Document</a></li>
              <li><a data-toggle="tab" href="#award_list"><i class="fa fa-angellist" id="award_list_tab"></i> Award</a></li>
            </ul>
            <div class="tab-content"  style="padding-left: 10px">
                <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-9">
                             <div class="row" style="padding-top: 20px">
                               <form action="{{ route('admin.student.view-update',$student->id) }}" method="post" accept-charset="utf-8" class="add_form" no-reset="true"> 
                               {{ csrf_field() }}
                                  @php
                                   $disabled='';
                                   if ($userId->role_id==12){ 
                                    $disabled='disabled'; 
                                   } 
                                 if(!empty($admissionApplication)){   
                                   $status='';
                                   if($admissionApplication->status==1){
                                     $status='New Application';
                                   }else if($admissionApplication->status==2){
                                     $status='Form Submited';
                                   }else if($admissionApplication->status==3){
                                     $status='Application Form Received';
                                   }else if($admissionApplication->status==4){
                                     $status='Accepted';
                                   }else if($admissionApplication->status==5){
                                     $status='Rejected';
                                   }else if($admissionApplication->status==6){
                                     $status='Pass';
                                   }else if($admissionApplication->status==7){
                                     $status='Retest';
                                   }else if($admissionApplication->status==8){
                                     $status='Fail';
                                   }else if($admissionApplication->status==9){
                                     $status='Admitted';
                                   }else if($admissionApplication->status==10){
                                     $status='Admission Close';
                                   }
                                 }
                                  @endphp
                                
                                   @if(!empty($admissionApplication))     
                                    @if ($userId->role_id==12) 
                                       <span style="margin-left: 10px">Application No. <b>{{ $admissionApplication->id }}</b></span>
                                     @endif  
                                    @endif  
                                      <div  class="col-lg-6">
                                       <li class="list-group-item" style="width:350px"><label>Name</label><span class="fa fa-asterisk"></span>
                                        <input type="text" value="{{ $student->name }}" maxlength="50" name="student_name" style="width: 290px;height: 28px" class="form-control"></li>
                                      </div>
                                      <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Nick Name</label><span class="fa fa-asterisk"></span>
                                        <input type="text" name="nick_name" value="{{$student->nick_name}}"  class="form-control" style="width: 290px;height: 28px"></li> 
                                      </div>
                                      <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Class</label><span class="fa fa-asterisk"></span>
                                        <select class="form-control" name="class" style="width: 290px;height: 28px"onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
                                          @foreach ($classes as $id=>$value)
                                           <option value="{{ $id }}"{{ $student->class_id==$id? 'selected' : ''}}>{{ $value }}</option> 
                                          @endforeach 
                                        </select>
                                        </li> 
                                      </div>
                                      <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Section</label><span class="fa fa-asterisk"></span>
                                        <select class="form-control" name="section" id="section_div" style="width: 290px;height: 28px" {{ $disabled }}>
                                        @foreach ($sections as $section)
                                          <option  value="{{ $section->id }}"{{ $student->section_id==$section->id? 'selected' : '' }}>{{ $section->name }}</option> 
                                            
                                         @endforeach 
                                        </select></li> 
                                      </div>
                                      <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Registration No.</label><span class="fa fa-asterisk"></span>
                                        <input type="text" {{ $disabled }} style="width: 290px;height: 28px" value="{{ $student->registration_no or ''}}" name="registration_no" id="registration_no" maxlength="{{ $schoolinfo->reg_length }}" class="form-control" min="{{ $schoolinfo->reg_length }}"></li> 
                                       </div>
                                       <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Admission No.</label><span class="fa fa-asterisk"></span>
                                        <input type="text" {{ $disabled }} style="width: 290px;height: 28px" value="{{ $student->admission_no }}" name="admission_no" class="form-control"></li>
                                       </div>
                                       <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Roll No.</label><span class="fa fa-asterisk"></span>
                                        <input type="text"maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' style="width: 290px;height: 28px" value="{{ $student->roll_no or ''}}" {{ $disabled }} name="roll_no" class="form-control"></li>
                                       </div>
                                       <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Date of Birth</label><span class="fa fa-asterisk"></span>
                                        <input type="text" maxlength="10" style="width: 290px;height: 28px" value="{{ Carbon\Carbon::parse($student->dob)->format('d-m-Y')  }}" name="date_of_birth" class="form-control"></li>
                                       </div>
                                       <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Date of Admission</label><span class="fa fa-asterisk"></span>
                                        <input type="date" {{ $disabled }} style="width: 290px;height: 28px" value="{{ $student->date_of_admission }}" name="date_of_admission" class="form-control"></li>
                                       </div>
                                       <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Date of Activation</label><span class="fa fa-asterisk"></span>
                                         <input type="date" {{ $disabled }}  style="width: 290px;height: 28px" value="{{$student->date_of_activation}}" name="date_of_activation" class="form-control"></li> 
                                       </div>
                                       <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Aadhaar No.</label><span class="fa fa-asterisk"></span>
                                         <input type="text" maxlength="12" style="width: 290px;height: 28px" value="{{ $student->adhar_no}}" name="aadhaar_no" class="form-control"></li> 
                                       </div>
                                       <div  class="col-lg-6">
                                        <li class="list-group-item" style="width:350px"><label>Gender</label><span class="fa fa-asterisk"></span>
                                         <select name="gender" class="form-control" style="width: 290px;height: 28px">
                                            @foreach ($genders as $gender)
                                               <option value="{{ $gender->id }}"{{ $gender->id==$student->gender_id?'selected' : '' }}>{{ $gender->genders }}</option> 
                                            @endforeach 
                                          </select></li> 
                                       </div>
                                       <div  class="col-lg-12">
                                        <li class="list-group-item" style="width: 92%"><label>House Name</label><span class="fa fa-asterisk"></span>
                                         <select name="house" class="form-control" {{ $disabled }}>
                                            @foreach ($houses as $house)
                                              <option  value="{{ $house->id }}"{{ $student->house_no==$house->id? 'selected' : '' }}>{{ $house->name }}</option> 
                                              
                                            @endforeach
                                          </select></li> 
                                       </div>

                                </div> 
                                <div class="text-center" style="margin :20px">
                                <input type="submit" class="btn btn-success btn-sm"  value="Update"> 
                                <button type="button" onclick="$('#sibling_info_tab').click()" class="btn btn-success btn-sm">Next</button>
                                </div>
                              </form>
                            </div>
                        
                        <div class="col-md-3" style="margin-top: 40px">
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
                      <span ><button type="button" class="add_btn_parets btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.parents.add.form',$student->id) }}')" style="margin: 10px">Add Parent Detail</button> 
                   <div class="table-responsive" id="parent_info_list">
                    </div> 
                </div>
                <div id="address" class="tab-pane fade"> 
                    
                   <div class="table-responsive" id="address_list">
                    </div> 
                </div>
                 <div id="medical" class="tab-pane fade">
                    <button type="button" class="btn btn-info btn-sm btn_add_medical_info" onclick="callPopupLarge(this,'{{ route('admin.medical.info.add.form',$student->id) }}')" style="margin: 10px">Add Medical Detail</button>
                     
                    <div class="table-responsive" id="medical_info_page">
                   
                   </div>
                     
                 </div>   
                <div id="sibling" class="tab-pane fade">
                 <button type="button" class="btn btn-info btn-sm btn_add_sibling_info"  onclick="callPopupLarge(this,'{{ route('admin.sibling.add.form',$student->id) }}')" style="margin: 10px">Add Sibling Detail</button>
                 
                 <div class="table-responsive" id="sibling_info_list">
                    </div> 
                </div>

                <div id="subjects" class="tab-pane fade">
                  <button type="button" class="btn btn-info btn-sm add_subject" style="margin: 10px" onclick="callPopupLarge(this,'{{ route('admin.studentSubject.add',$student->id) }}')" >Add Subject</button>
                  <div class="table-responsive" id="subject_list">
                    </div> 
                   <div class="text-center">
                      <button type="button" onclick="$('#medical_info_tab').click()" class="btn btn-success btn-sm">Previous</button> 
                      <button type="button" onclick="$('#sport_tab').click()" class="btn btn-success btn-sm">Next</button> 
                   </div>
                </div>
                <div id="sport" class="tab-pane fade">
                   <button type="button" class="btn btn-info btn-sm btn_add_sport_hobby" style="margin: 10px" onclick="callPopupLarge(this,'{{ route('admin.hobby.add',$student->id) }}')">Add Sport/Hobbies</button>
                   <div id="sport_hobbies_list">
                     
                   </div> 
                   <div class="text-center">
                     <button type="button" onclick="$('#subject_tab').click()" class="btn btn-success btn-sm">Previous</button> 
                     <button type="button" onclick="$('#document_tab').click()" class="btn btn-success btn-sm">Next</button> 
                  </div>
                </div>

                <div id="document" class="tab-pane fade">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" style="margin: 10px" data-target="#add_document">Add Document</button>
                      <button id="btn_student_document_list" hidden onclick="callAjax(this,'{{ route('admin.document.list',$student->id) }}','student_document_list')"></button>
                      <div id="student_document_list">
                        
                      </div>
                   <div class="text-center">
                     <button type="button" onclick="$('#sport_tab').click()" class="btn btn-success btn-sm">Previous</button> 
                     <button type="button" onclick="$('#award_list_tab').click()" class="btn btn-success btn-sm">Next</button> 
                  </div>
                </div>
                <div id="award_list" class="tab-pane fade"> 
                    <button type="button" class="btn btn-info pull-left" multi-select="true" onclick="callPopupLarge(this,'{{ route('admin.award.for.addform')}}')" style="margin:10px">Add</button> 
                            <button id="btn_event_type_table_show" hidden data-table="event_type_data_table" onclick="callAjax(this,'{{ route('admin.award.for.table.show',$student->id) }}','event_type_table_show_div')">show </button> 
                              <div class="" id="event_type_table_show_div"> 
                              </div>
                      
                    
                   <div class="text-center">

                     <button type="button" onclick="$('#document_tab').click()" class="btn btn-success btn-sm">Previous</button> 
                     <button type="button" onclick="$('#student_tab').click()" class="btn btn-success btn-sm">Student Details</button> 
                  </div>
                </div>
            </div>
        </div>
          <!-- /.box -->
          <!-- Trigger the modal with a button -->
               
<div class="col-lg-4 text-center">
@if (!empty($admissionApplication)) 
  @if ($admissionApplication->status==2)
   
    @else
    <a href="{{ route('admin.student.registration.final.submit',$student->id) }}" title="Final Submit" class="btn btn-primary">Final Submit</a>
  @endif
 @endif   
  
  
</div>
    </section>

   
 

{{-- @include('admin.student.studentdetails.include.add_parents_info') --}}
{{-- @include('admin.student.studentdetails.include.add_parents_image') --}}
{{-- @include('admin.student.studentdetails.include.add_medical_info') --}}
{{-- @include('admin.student.studentdetails.include.add_sibling_info') --}}
{{-- @include('admin.student.studentdetails.include.add_subject')
 --}}
@include('admin.student.studentdetails.include.add_document')
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
 
 {{-- <link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet"> --}}
 
 <style type="text/css" media="screen">
   #camera {
     width: 100%;
     height: 350px;
   }
 </style>
@endpush
 @push('scripts')

<script src="{{ asset('jpeg_camera/jpeg_camera_with_dependencies.min.js') }}" type="text/javascript"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
   $("#registration_no").keypress(function(event) {
    var character = String.fromCharCode(event.keyCode);
    return isValid(character);     
});

function isValid(str) {
    return !/[~`!@#$%\^&*()+=\-\_[\]\\';,./{}|\\":<>\?]/g.test(str);
}
     $(document).ready(function(){
        
          $('#show_webcam').hide('400')
         
      $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
        $('#medical_items').DataTable();
        $('#parents_items').DataTable();
        $('#sibling_items').DataTable();
        $('#address_items').DataTable();
        $('#btn_event_type_table_show').click();
        $('#btn_student_document_list').click();
        $('#btn_image_refrash').click();

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