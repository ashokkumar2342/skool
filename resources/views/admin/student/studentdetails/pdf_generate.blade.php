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
    span{
       font-size:bold; 
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
@endphp
<div class="small-box bg-primary text-center" style="font-size: 15.5px;margin-top: -20px"><h3>Student's Details</h3></div>
 <div class="row">
    <div class="col-lg-3">
        <li>Name</li>
    </div>
    <div class="col-lg-5">
       <span><b>{{ $student->name }}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Nick Name</li>
    </div>
    <div class="col-lg-5">
       <span><b>{{ $student->nick_name }}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Class</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $student->classes->name or '' }}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Section</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $student->sectionTypes->name or '' }}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Registration No.</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $student->registration_no}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Admission No.</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $student->admission_no}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Roll No.</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $student->roll_no}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Date Of Admission</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Date Of Activation</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ date('d-m-Y',strtotime($student->date_of_activation))}}</b></span>
    </div> 
 </div>
 <div class="row"> 
     <div class="col-lg-3" style="float: right;">
           @if ($path==$paths)
           <img  src="''" alt="" alt="" width="153px" height="153px" style="margin-top: -20%; border:solid 1px Black"> 
           @else
           <img  src="{{ $path }}" alt="" width="153px" height="153px" style="margin-top: -20%; border:solid 1px Black"> 
           @endif
     </div>
</div> 
 <div class="row" style="margin-top: -18px">
    <div class="col-lg-3">
        <li>Email</li>
    </div>
    <div class="col-lg-3">
        <span><b>{{ $student->addressDetails->address->primary_email or ''}}</b></span>
    </div>
    <div class="col-lg-2">
        <li>Date of Birth</li>
    </div>
    <div class="col-lg-2">
        <span><b>{{date('d-M-Y',strtotime($student->dob ))}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Aadhaar No.</li>
    </div>
    <div class="col-lg-3">
        <span><b>{{$student->adhar_no}}</b></span>
    </div>
    <div class="col-lg-2">
        <li>Mobile No.</li>
    </div>
    <div class="col-lg-2">
        <span><b>{{ $student->addressDetails->address->primary_mobile or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Gender</li>
    </div>
    <div class="col-lg-3">
        <span><b>{{ $student->genders->genders or '' }}</b></span>
    </div>
    <div class="col-lg-2">
        <li>House Name</li>
    </div>
    <div class="col-lg-2">
        <span><b>{{$student->houses->name or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>State</li>
    </div>
    <div class="col-lg-3">
        <span><b>{{ $student->addressDetails->address->state or ''}}</b></span>
    </div>
    <div class="col-lg-2">
        <li>City</li>
    </div>
    <div class="col-lg-2">
        <span><b>{{ $student->addressDetails->address->city or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Permanent Address</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $student->addressDetails->address->p_address or ''}}</b></span>
    </div> 
 </div> 
 <div class="row">
    <div class="col-lg-3">
        <li>Permanent Pincode</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $student->addressDetails->address->p_pincode or ''}}</b></span>
    </div> 
 </div> 
 <div class="row">
    <div class="col-lg-3">
        <li>Correspondence Address</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $student->addressDetails->address->c_address or ''}}</b></span>
    </div> 
 </div> 
 <div class="row">
    <div class="col-lg-3">
        <li>Correspondence Pincode</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $student->addressDetails->address->c_pincode or ''}}</b></span>
    </div> 
 </div>
 @php
 $admissionApplication=App\Model\AdmissionApplication::where('student_id',$student->id)->first();
 if(!empty($admissionApplication)){
   $Application =storage_path('app/student/barcode/application/'.$admissionApplication->id.'.'.'png'); 
 }else{
    $Application =storage_path('app/student/barcode/application/'.'1000010'.'.'.'png'); 
 }
 $Regisration =storage_path('app/student/barcode/'.$student->registration_no.'.'.'png');
 @endphp 
 <div class="row" style="margin-top: 100px">
    <div class="col-lg-6">
      <div style="margin:20px">Regisration No. <img src="{{$Regisration}}" width="40%" height="40%" style="margin-top: 20px"> </div>          
    </div>
    <div class="col-lg-6">
      <div style="margin:20px">Application No. <img src="{{$Application}}" width="40%" height="40%" style="margin-top: 20px"> </div>          
    </div> 
 </div>

 @if (!empty($student->parents))
  <div class="page-breck"></div> 
 @endif
 @php
     $withid=1;
 @endphp
@foreach ($student->parents as $parent) 
 @php 
 $data =storage_path('app/'.$parent->parentInfo->photo);
 $datas =storage_path('app/'.'');  
@endphp
<div class="small-box bg-primary text-center" style="font-size: 15.5px"><h3>{{ $parent->relation->name or ''}}'s Details</h3></div> 
 <div class="row">
    <div class="col-lg-3">
        <li>Name</li>
    </div>
    <div class="col-lg-5">
       <span><b>{{ $parent->parentInfo->name  or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Mobile No.</li>
    </div>
    <div class="col-lg-5">
       <span><b>{{ $parent->parentInfo->mobile or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Date of Birth</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ date('d-m-Y', strtotime($parent->parentInfo->dob or ''))}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Date of Anniversary</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ date('d-m-Y', strtotime($parent->parentInfo->doa or ''))}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Education</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $parent->parentInfo->education or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Annual Income</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $parent->parentInfo->incomes->range or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Profession</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $parent->parentInfo->profetions->name or ''}}</b></span>
    </div> 
 </div>
 <div class="row">
    <div class="col-lg-3">
        <li>Alive</li>
    </div>
    <div class="col-lg-5">
        <span><b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b></span>
    </div> 
 </div> 
 <div class="row"> 
     <div class="col-lg-3" style="float: right;">
           @if ($data==$datas)
           <img  src="''" alt="" alt="" width="153px" height="153px" @if ($withid==3)style="margin-top: -40%; border:solid 1px Black" @else style="margin-top: -20%; border:solid 1px Black"@endif> 
           @else
           <img  src="{{ $data }}" alt="" width="153px" height="153px" style="margin-top: -15%; border:solid 1px Black"> 
           @endif
     </div>
</div> 
 <div class="row" style="margin-top: -40px">
    <div class="col-lg-3">
        <li>Office Address</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $parent->parentInfo->office_address or ''}}</b></span>
    </div> 
 </div> 
 <div class="row">
    <div class="col-lg-3">
        <li>Organization Name</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $parent->parentInfo->organization_address or ''}}</b></span>
    </div> 
 </div> 
 <div class="row">
    <div class="col-lg-3">
        <li>Designation</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $parent->parentInfo->f_designation or ''}}</b></span>
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
<div class="small-box bg-primary text-center" style="font-size: 15.5px"><h3>Medical's Details</h3></div> 
<div class="row" > 
    <div class="col-lg-3"> 
        <li>On Date</li>
    </div> 
    <div class="col-lg-3">
        <span><b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b></span>
    </div>
    <div class="col-lg-3">
        <li>Blood Group</li>
    </div>
    <div class="col-lg-1" style="margin-right: 30px">
        <span><b>{{ $studentMedicalInfo->bloodgroups->name or ''}}</b></span>
    </div>
</div>
<div class="row" > 
    <div class="col-lg-3"> 
        <li>HB</li>  
    </div> 
    <div class="col-lg-3">
        <span><b>{{ $studentMedicalInfo->hb }}</b></span>
    </div>
    <div class="col-lg-3">
        <li>BP</li>
    </div>
    <div class="col-lg-1" style="margin-right: 30px">
        <span><b>{{ $studentMedicalInfo->bp_lower }}/{{ $studentMedicalInfo->bp_uper }}</b></span>
    </div>
</div>
<div class="row" > 
    <div class="col-lg-3"> 
        <li>Height</li>  
    </div> 
    <div class="col-lg-3">
        <span><b>{{ $studentMedicalInfo->height }}</b></span>
    </div>
    <div class="col-lg-3">
        <li>Weight</li>
    </div>
    <div class="col-lg-3">
        <span><b>{{ $studentMedicalInfo->weight }}</b></span>
    </div>
</div>
<div class="row" > 
    <div class="col-lg-3">
        <li>Complexion</li>
    </div>
    <div class="col-lg-9"> 
        <span><b>{{ $studentMedicalInfo->complextions->name or '' }}</b></span>  
    </div> 
</div>
<div class="row" > 
    <div class="col-lg-3"> 
        <li>Dental</li>  
    </div>
    <div class="col-lg-9"> 
        <span><b>{{ $studentMedicalInfo->dental }}</b></span>  
    </div> 
</div> 
<div class="row" > 
    <div class="col-lg-3"> 
        <li>Physical Handicapped</li> 
    </div> 
    <div class="col-lg-9">
        <span><b>{{ $studentMedicalInfo->ishandicapped==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->handi_percent }}% &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->physical_handicapped }}</b></span>
    </div>
</div> 
<div class="row" > 
    <div class="col-lg-3"> 
        <li>Allergy</li> 
    </div> 
    <div class="col-lg-9">
        <span><b>{{ $studentMedicalInfo->isalgeric==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->alergey }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->alergey_vacc }}</b></span> 
    </div>
</div> 
<div class="row" > 
    <div class="col-lg-3"> 
        <li>ID Mark 1</li>  
    </div> 
    <div class="col-lg-9">
        <span><b>{{ $studentMedicalInfo->id_marks1 }}</b></span>
    </div>
</div>
<div class="row" > 
    <div class="col-lg-3"> 
        <li>ID Mark 2</li>  
    </div> 
    <div class="col-lg-9">
        <span><b>{{ $studentMedicalInfo->id_marks2 }}</b></span>
    </div>
</div>
<div class="row" > 
    <div class="col-lg-3">
        <li>Vision</li>
    </div>
    <div class="col-lg-9">
        <span><b>{{ $studentMedicalInfo->vision }}</b></span>
    </div>
</div> 
<div class="row" > 
    <div class="col-lg-3">
        <li>Narration</li>
    </div>
    <div class="col-lg-8">
        <span><b>{{ $studentMedicalInfo->narration }}</b></span>
        </div>
    </div> 
    @endforeach
@if (!empty($studentSiblingInfos))
<div class="page-breck"></div>
<div class="small-box bg-primary text-center" style="font-size: 15.5px"><h3>Sibling's Details</h3></div>  
@foreach ($studentSiblingInfos as $studentSiblingInfo) 
<div class="row" > 
<div class="col-lg-6"> 
<li>Registration No :-<b> {{ $studentSiblingInfo->studentSiblings->registration_no or ''  }}</b> </li>   
</div>
<div class="col-lg-6"> 
<li>Name :-<b>{{ $studentSiblingInfo->studentSiblings->name  or ''}}</b> </li>  
</div>
</div>
<div class="row" > 
<div class="col-lg-6"> 
<li>Class:-<b> {{ $studentSiblingInfo->studentSiblings->classes->name  or '' }}</b> </li>  
</div>
<div class="col-lg-6"> 
<li>Section :-<b>{{ $studentSiblingInfo->studentSiblings->sectionTypes->name or ''   }}</b> </li>  
</div>
</div><hr>
@endforeach
</div>
</div>
</div> 
@endif
@if (empty($studentSiblingInfos))
<div class="page-breck"></div>
@endif
@php
$studentSubjectDetails=App\Model\StudentSubject::where('student_id',$student->id)->first();
@endphp
@if (!empty($studentSubjectDetails)) 
<div class="small-box bg-primary text-center" style="font-size: 15.5px"><h3>Subject's Details</h3></div>  
<div class="row" > 
<div class="col-lg-12">  
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
</div>

@endif 
@php
$studentDocument=App\Model\Document::where('student_id',$student->id)->first();
@endphp
@if (!empty($studentDocument))
<div class="small-box bg-primary text-center" style="font-size: 15.5px"><h3>Document's Details</h3></div>  
<div class="row" > 
<div class="col-lg-12">  
<table class="table">
<thead>
<tr>
<th>Document Name</th>
</tr>
</thead>
<tbody>
@foreach ($documents as $document)
<tr>
<td>{{ $document->documentTypes->name or ''  }}</td>
</tr>
@endforeach
</tbody>
</table>  
</div>
</div>
@endif 
</body>
</html>
 