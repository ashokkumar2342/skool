<!DOCTYPE html>
<html>
<head>
  <title>

  </title>
  <style type="text/css" media="screen">
    @page{
        margin:0px
    }
    
    .page-breck{
      page-break-before:always; 
    } 
    li{
        font-size: 14px; 
        margin-left: 20px; 
    }
    .fontBold{
        font:12;
        font-weight: 600;
        padding-top: 5px
    }
    table td{
        padding-left: 5px;
        padding-bottom: 5px;
    }
</style>
</head>
 @include('admin.include.boostrap')
<body>
{{--  @include('admin.student.studentdetails.pdf_page_count') --}}
@php
$routeName= Route::currentRouteName(); 
$path =storage_path('app/student/profile/'.$student->picture);
$paths =storage_path('app/student/profile/'.''); 
// $profile = route('admin.student.image',$student->picture);
$admissionApplication=App\Model\AdmissionApplication::where('student_id',$student->id)->first();
if(!empty($admissionApplication)){
  $Application =storage_path('app/student/barcode/application/'.$admissionApplication->id.'.'.'png'); 
}else{
   $Application =storage_path('app/student/barcode/application/'.'1000010'.'.'.'png'); 
}
$Regisration =storage_path('app/student/barcode/'.$student->registration_no.'.'.'png');
$default_image =public_path('profile-img/user.png');
@endphp
 
 
<div class="container">
  <img src="{{$Regisration}}" width="20%" height="20%">
  <div class="panel panel-success">
    <div class="panel-heading">Student's Details</div>
    <div class="panel-body">
        <div class="row">
            <table style="width: 725px; height: 151px;" class="table-striped table-bordered">
            <tbody>
            <tr>
            <td style="width: 181px;">  Name : </td>
            <td style="width: 181px;" class="fontBold">{{ $student->name }}</td>
            <td style="width: 181px;">&nbsp;</td>
            <td style="width: 181px;" rowspan="6">
                <div style="margin-top:5px;text-align: center">
                    @if ($path==$paths)
                <img  src="{{ $default_image }}" alt=""  width="110px" height="130px" > 
                @else
                <img  src="{{ $path }}" align="center" alt="" width="110px" height="130px" style=" border:solid 2px #515452">
                @endif
                </div>
            </td>
            </tr>
            <tr>
            <td style="width: 181px;">Nick Name</td>
            <td style="width: 181px;"class="fontBold">{{ $student->nick_name }}</td>
            <td style="width: 181px;"></td>
            </tr>
            <tr>
            <td style="width: 181px;">Class</td>
            <td style="width: 181px;"class="fontBold">{{ $student->classes->name or '' }}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Section</td>
            <td style="width: 181px;"class="fontBold">{{ $student->sectionTypes->name or '' }}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Registration No.</td>
            <td style="width: 181px;"class="fontBold">{{ $student->registration_no }}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Admission No.</td>
            <td style="width: 181px;"class="fontBold">{{ $student->admission_no }}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Roll No.</td>
            <td style="width: 181px;"class="fontBold">{{ $student->roll_no }}</td>
            <td style="width: 181px;">Date Of Birth</td>
            <td style="width: 181px;"class="fontBold">{{date('d-M-Y',strtotime($student->dob ))}}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Date Of Admission</td>
            <td style="width: 181px;"class="fontBold">{{ date('d-m-Y',strtotime($student->date_of_admission))}}</td>
            <td style="width: 181px;">Date Of Activation</td>
            <td style="width: 181px;"class="fontBold">{{ date('d-m-Y',strtotime($student->date_of_activation))}}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Email</td>
            <td style="width: 181px;"class="fontBold">{{ $student->addressDetails->address->primary_email or ''}}</td>
            <td style="width: 181px;">Mobile No.</td>
            <td style="width: 181px;"class="fontBold">{{ $student->addressDetails->address->primary_mobile or ''}}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Aadhaar No.</td>
            <td style="width: 181px;"class="fontBold">{{ $student->adhar_no }}</td>
            <td style="width: 181px;">Gender</td>
            <td style="width: 181px;"class="fontBold">{{ $student->genders->genders or '' }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">House Name</td>
            <td style="width: 181px;"class="fontBold">{{$student->houses->name or ''}}</td>
            <td style="width: 181px;">State</td>
            <td style="width: 181px;"class="fontBold">{{ $student->addressDetails->address->state or ''}}</td>
            </tr>
            <tr>
            <td style="width: 181px;">City</td>
            <td style="width: 181px;"class="fontBold" colspan="3">{{ $student->addressDetails->address->city or ''}}</td>
           
            </tr>
            <tr>
            <td style="width: 181px;">Permanent Address</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $student->addressDetails->address->p_address or ''}}</td>
            </tr>
             <tr>
            <td style="width: 181px;">Permanent Pincode</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $student->addressDetails->address->p_pincode or ''}}</td>
            </tr>
             <tr>
            <td style="width: 181px;">Correspondence Address</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $student->addressDetails->address->c_address or ''}}</td>
            </tr>
             <tr>
            <td style="width: 181px;">Correspondence Pincode</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $student->addressDetails->address->c_pincode or ''}}</td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
@foreach ($student->parents as $parent) 
 @php 
 $data =storage_path('app/'.$parent->parentInfo->photo);
 $datas =storage_path('app/'.'');  
@endphp
<div class="panel panel-success">
    <div class="panel-heading">{{ $parent->relation->name or ''}}'s Details</div>
    <div class="panel-body">
        <div class="row">
            <table style="width: 725px; height: 151px;" class="table-striped table-bordered">
            <tbody>
            <tr>
            <td style="width: 181px;">  Name : </td>
            <td style="width: 181px;" class="fontBold">{{ $parent->parentInfo->name  or ''}}</td>
            <td style="width: 181px;">&nbsp;</td>
            <td style="width: 181px;" rowspan="6">
                <div style="margin-top:5px;text-align: center">
                    @if ($data==$datas)
                <img  src="{{ $default_image }}" alt=""  width="110px" height="130px" > 
                @else
                <img  src="{{ $data }}" align="center" alt="" width="110px" height="130px" style=" border:solid 2px #515452">
                @endif
                </div>
            </td>
            </tr>
            <tr>
            <td style="width: 181px;">Mobile No.</td>
            <td style="width: 181px;"class="fontBold">{{ $parent->parentInfo->mobile or ''}}</td>
            <td style="width: 181px;"></td>
            </tr>
            <tr>
            <td style="width: 181px;">Date of Birth</td>
            <td style="width: 181px;"class="fontBold">{{$parent->parentInfo->dob? date('d-m-Y', strtotime($parent->parentInfo->dob)) : null}}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Date of Anniversary</td>
            <td style="width: 181px;"class="fontBold">{{$parent->parentInfo->dob? date('d-m-Y', strtotime($parent->parentInfo->doa)) : null}}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Annual Income</td>
            <td style="width: 181px;"class="fontBold">{{ $parent->parentInfo->incomes->range or ''}}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Education</td>
            <td style="width: 181px;"class="fontBold">{{ $parent->parentInfo->education or ''}}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Profession</td>
            <td style="width: 181px;"class="fontBold">{{ $parent->parentInfo->profetions->name or ''}}</td>
            <td style="width: 181px;">&nbsp;</td>
            </tr>
            <tr>
            <td style="width: 181px;">Alive</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</td>
            
            </tr>
            
            <tr>
            <td style="width: 181px;">Office Address</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $parent->parentInfo->office_address or ''}}</td>
            </tr>
             <tr>
            <td style="width: 181px;">Organization Name</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $parent->parentInfo->organization_address or ''}}</td>
            </tr>
             <tr>
            <td style="width: 181px;">Designation</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $parent->parentInfo->f_designation or ''}}</td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach
@if (!empty($student->parents))
  <div class="page-breck"></div> 
 @endif
@php
$studentMedicalDetails=App\Model\StudentMedicalInfo::where('student_id',$student->id)->first();
@endphp 
@foreach($studentMedicalInfos as $studentMedicalInfo)
<div class="panel panel-success">
    <div class="panel-heading">Medical Details</div>
    <div class="panel-body">
        <div class="row">
            <table style="width: 725px; height: 151px;" class="table-striped table-bordered">
            <tbody>
            <tr>
            <td style="width: 181px;">On Date</td>
            <td style="width: 181px;"class="fontBold">{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</td>
            <td style="width: 181px;">Blood Group</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->bloodgroups->name or ''}}</td>
            </tr>
            <tr>
            <td style="width: 181px;">HB</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->hb}}</td>
            <td style="width: 181px;">BP</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->bp_uper }}/{{ $studentMedicalInfo->bp_lower }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Height</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->height }}</td>
            <td style="width: 181px;">Weight</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->weight }}/{{ $studentMedicalInfo->bp_lower }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Complexion</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->complextions->name or '' }}</td>
            <td style="width: 181px;">Dental</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->dental }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">ID Mark 1</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->id_marks1 }}</td>
            <td style="width: 181px;">ID Mark 2</td>
            <td style="width: 181px;"class="fontBold">{{ $studentMedicalInfo->id_marks2 }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Physical Handicapped</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $studentMedicalInfo->ishandicapped==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->handi_percent }}% &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->physical_handicapped }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Allergy</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $studentMedicalInfo->isalgeric==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->alergey }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->alergey_vacc }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Vision</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $studentMedicalInfo->vision }}</td>
            </tr>
            <tr>
            <td style="width: 181px;">Narration</td>
            <td style="width: 181px;" colspan="3" class="fontBold">{{ $studentMedicalInfo->narration }}</td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach
<div class="panel panel-success">
    <div class="panel-heading">Sibling's Details</div>
    <div class="panel-body">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Registration No.</th>
                        <th>Class</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentSiblingInfos as $studentSiblingInfo)
                    <tr>
                        <td>{{ $studentSiblingInfo->studentSiblings->name or ''  }}</td>
                        <td>{{ $studentSiblingInfo->studentSiblings->registration_no or ''  }}</td>
                        <td>{{ $studentSiblingInfo->studentSiblings->classes->name  or '' }}</td>
                        <td>{{ $studentSiblingInfo->studentSiblings->sectionTypes->name or ''   }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@php
$studentSubjectDetails=App\Model\StudentSubject::where('student_id',$student->id)->first();
@endphp
<div class="panel panel-success">
    <div class="panel-heading">Subject's Details</div>
    <div class="panel-body">
        <div class="row">
            <table class="table"> 
            <thead>
            <tr>
            <th>Subject Name</th>
            <th>ISOptional</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($studentSubjects as $studentSubject)

            <tr>
            <td> {{ $studentSubject->SubjectTypes->name or '' }}</td>
            <td>{{ $studentSubject->ISOptionals->name or ''}}</td>
            </tr>
            @endforeach 

            </tbody>
            </table>
        </div>
    </div>
</div>
</div>   
</body>
</html>
 