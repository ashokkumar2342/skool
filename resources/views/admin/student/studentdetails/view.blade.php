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
          <button type="button" class="btn btn-xs btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.student.preview',$student->id) }}')" style="margin:5px">Preview</button>

          <a href="{{ route('admin.student.pdf.generate',$student->id) }}" class="btn btn-xs btn-success pull-right" title="Download Profile " target="_blank" style="margin:5px">PDF</a>
          
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home" id="student_tab"><i class="fa fa-user"></i> Student Details</a></li>
              <li><a data-toggle="tab" data-table="sibling_items" href="#sibling" id="sibling_info_tab"  onclick="callAjax(this,'{{ route('admin.sibling.table.show',$student->id) }}','sibling_info_list')"><i class="fa fa-users" id="sibling_info"></i> Siblling info</a></li>
              <li><a data-toggle="tab" data-table="parents_items" href="#parent" id="parent_info_tab"  onclick="callAjax(this,'{{ route('admin.parents.list',$student->id) }}','parent_info_list')"><i class="fa fa-user-circle"></i> Parent Info</a></li>

              <li><a data-toggle="tab" href="#address" data-table="address_info_table" id="address_info" onclick="callAjax(this,'{{ route('admin.parents.address',$student->id) }}','address_list')"><i class="fa fa-home"></i> Address</a></li>

              <li><a data-toggle="tab" data-table="medical_info_table" href="#medical" id="medical_info_tab" onclick="callAjax(this,'{{ route('admin.medical.info.list',$student->id) }}','medical_info_page')"><i class="fa fa-user-md" id="medical_info"></i> Medical info</a></li>
              <li><a data-toggle="tab" href="#subjects" id="subject_tab" onclick="callAjax(this,'{{ route('admin.studentSubject.list',$student->id) }}','subject_list')"><i class="fa fa-book" {{-- id="subject_tab" --}}></i>  Subjects</a></li>
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
                                     
                                      <li class="list-group-item">Class :-<span class="fs"> 
                                        {{-- <input type="text" maxlength="50"  value="{{ $student->classes->name or ''}}" name="nick_name"> --}}
                                        <select name="class" style="width: 202px" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
                                          @foreach ($classes as $id=>$value)
                                           <option value="{{ $id }}"{{ $student->class_id==$id? 'selected' : ''}}>{{ $value }}</option> 
                                          @endforeach
                                           
                                        </select>
                                        


                                      </span></li>
                                     
                                      <li class="list-group-item">Registration No :-<span class="fs"><input type="text" disabled="" value="{{ $student->registration_no or ''}}" > </span></li>
                                      
                                      <li class="list-group-item">Roll No :-<span class="fs"><input type="text" maxlength="50" value="{{ $student->roll_no or ''}}" name="roll_no" disabled> </span></li>
                                      <li class="list-group-item">Date Of Addmission :-<span class="fs"><input type="text" maxlength="50" value="{{Carbon\Carbon::parse($student->date_of_admission)->format('d-m-Y') }}" name="date_of_admission"> </span></li>
                                     
                                      <li class="list-group-item">Date Of Birth :-<span class="fs"><input type="text" maxlength="10" value="{{ Carbon\Carbon::parse($student->dob)->format('d-m-Y')  }}" name="date_of_birth"> </span></li>
                                      <li class="list-group-item">Aadhaar No :-<span class="fs"><input type="text" maxlength="12" value="{{ $student->adhar_no}}" name="aadhaar_no"> </span></li>
                                     
                                       
                                      

                                      
                                      
                                    </ul>
                                    
                                </div>

                                <div class="col-md-6 border_bottom">
                                    <ul class="list-group">
                                     <li class="list-group-item">Nick Name :-<span  class="fs"><input type="text" name="nick_name" maxlength="50" value="{{ $student->nick_name }}" name=""> </span></li>
                                      <li class="list-group-item">Section :-<span class="fs">{{-- <input type="text" maxlength="50"  value="{{ $student->sectionTypes->name or ''}}" >  --}}
                                        <select name="section" id="section_div" style="width: 202px">
                                        @foreach ($sections as $section)
                                          <option value="{{ $section->id }}"{{ $student->section_id==$section->id? 'selected' : '' }}>{{ $section->name }}</option> 
                                            
                                         @endforeach 
                                        </select>
                                      </span></li>
                                      <li class="list-group-item">Addmission No :-<span class="fs"><input type="text" disabled="" value="{{ $student->admission_no }}" > </span></li>
                                      <li class="list-group-item">E-mail ID :-<span class="fs"><input type="text" disabled="" value="{{ $student->email }}" name="email" > </span></li>
                                       <li class="list-group-item">Date of Activation :-<span class="fs"><input type="text" maxlength="50" value="{{ Carbon\Carbon::parse($student->date_of_activation)->format('d-m-Y') }}" name="date_of_activation"> </span></li> 
                                        <li class="list-group-item">Gender :-<span class="fs"><input type="text" value="{{ $student->genders->genders or ''}}" disabled=""> </span></li>
                                        <li class="list-group-item">House No :-<span class="fs">
                                          <select name="house" style="width: 202px">
                                            @foreach ($houses as $house)
                                              <option value="{{ $house->id }}"{{ $student->house_no==$house->id? 'selected' : '' }}>{{ $house->name }}</option> 
                                              
                                            @endforeach
                                          </select>
                                         {{--  <input type="text" value="{{ $student->houses->name or ''}}"  name="house"> --}} </span></li> 
                                    </ul>
                                    
                                </div> 
                                <div class="text-center" style="margin :20px">
                                <input type="submit" class="btn btn-success btn-sm"  value="Update"> 
                                <button type="button" onclick="$('#sibling_info_tab').click()" class="btn btn-success btn-sm">Next</button>
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
                                        
                      <span ><button type="button" class="add_btn_parets btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.parents.add.form',$student->id) }}')" style="margin: 10px">Add Parent</button>
                         
                        
                    
                   <div class="table-responsive" id="parent_info_list">
                    </div> 
                </div>
                <div id="address" class="tab-pane fade"> 
                    
                   <div class="table-responsive" id="address_list">
                    </div> 
                </div>
                 <div id="medical" class="tab-pane fade">
                    <button type="button" class="btn btn-info btn-sm btn_add_medical_info" onclick="callPopupLarge(this,'{{ route('admin.medical.info.add.form',$student->id) }}')" style="margin: 10px">Add Medical info</button>
                     
                    <div class="table-responsive" id="medical_info_page">
                   
                   </div>
                     
                 </div>   
                <div id="sibling" class="tab-pane fade">
                 <button type="button" class="btn btn-info btn-sm btn_add_sibling_info"  onclick="callPopupLarge(this,'{{ route('admin.sibling.add.form',$student->id) }}')" style="margin: 10px">Add Sibling info</button>
                 
                 <div class="table-responsive" id="sibling_info_list">
                    </div> 
                </div>

                <div id="subjects" class="tab-pane fade">
                  <button type="button" class="btn btn-info btn-sm add_subject" style="margin: 10px" onclick="callPopupLarge(this,'{{ route('admin.studentSubject.add',$student->id) }}')" >Add Subject</button>
                  <div class="table-responsive" id="subject_list">
                    </div> 
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
                              <td>{{ $document->documentTypes->name or ''}}</td>
                              <td>{{ $document->name }}</td>                             
                              <td> 
                                {{-- <a href="{{ route('admin.document.download',$document->document_url) }}" target="blank" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>  --}}
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
{{-- @include('admin.student.studentdetails.include.add_sibling_info') --}}
{{-- @include('admin.student.studentdetails.include.add_subject')
 --}}@include('admin.student.studentdetails.include.add_sport_hobby')
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
        $('#address_items').DataTable();

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