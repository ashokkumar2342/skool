<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<style type="text/css" media="screen">
    @page{
        margin:0px
    }
    li:before {
       /* vertical-align: sub ;*/
        content:' * ';
        font-size: 20px;
        font:center;
        

    }
    li{
        list-style: none;

    }
    .panel{
       margin-right: 10px
    }
    .page-breck{
      page-break-before:always; 
    }
      
    @include('admin.include.boostrap')

</style>
<body>
  @if ($student->student_status_id!=1)
  <div style="margin:20px">Application No. <img src="data:image/png;base64,{{ base64_encode($data)}}" width="20%" height="20%" alt="{{ $data }}" />    </div>
   
  @endif
    <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
      Student Details</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
         <div class="row"> 
           <div class="col-lg-3"> 
            <li>Name           
            <li>Nick Name           
            <li>Class  </li>
            <li>Section</li>
            <li>Registration No. </li>
            <li>Admission No </li>           
            <li>Date Of Admission </li>
            <li>Date Of Activation </li>
            <li>Category</li> 
            <li>Religion</li>
            <li>Date Of Birth </li> 
            <li>Mobile No.</li>
            <li>Aadhaar No.</li>           
            <li>User Name </li>   
            <li>Password </li>
            <li>Email</li> 
            <li>Gender</b></li>
            <li> House Name </li> 
            <li>State</li>
            <li>City </li>  
             
           </div>
           <div class="col-lg-6"> 
           <li><b> {{ $student->name }}  </b> </li> 
           <li><b>{{ $student->nick_name }}</b></li>
           <li><b>{{ $student->classes->name or '' }}</b></li>
           <li><b>{{ $student->sectionTypes->name or '' }}</b></li>
           <li><b>{{ $student->registration_no }}</b></li>
           <li><b>{{ $student->admission_no }}</b></li>
           <li><b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li>
           <li><b>{{date('d-m-Y',strtotime($student->date_of_activation ))}}</b></li>
           <li><b> {{ $student->addressDetails->address->categories->name or ''}} </b> </li>
           <li><b> {{ $student->addressDetails->address->religions->name or ''}} </b></li>
           <li><b>{{date('d-m-Y',strtotime($student->dob ))}}</b></li> 
           <li><b>{{ $student->addressDetails->address->primary_mobile  or ''}}</b></li>
           <li><b>{{ $student->adhar_no }}</b></li>
           <li><b>{{ $student->username }}</b></li>   
           <li><b>{{ $student->tem_pass }}</b></li>
           <li><b> {{ $student->addressDetails->address->primary_email or ''}} </b></li>
           <li><b>{{ $student->genders->genders or '' }}</b></li>
           <li><b>{{$student->houses->name or ''}}</b></li>
           <li><b> {{ $student->addressDetails->address->state or ''}} </b> </li> 
           <li><b>{{ $student->addressDetails->address->city or ''}}</b></li>
           
           </div>
           <div class="col-lg-3" style="margin-right: 10">
             @php
            $routeName= Route::currentRouteName(); 
            $path =storage_path('app/student/profile/'.$student->picture);
            $paths =storage_path('app/student/profile/'.''); 
          
            $profile = route('admin.student.image',$student->picture);
            @endphp 
            @if ( $routeName=='admin.student.registration.final.submit')
               @if ($path==$paths)
               <img  src="''" alt="" width="103px" height="103px" style="border:solid 2px Black"> 
               @else
               <img  src="{{ $path }}" alt="" width="103px" height="103px" style="margin-top: 10px; border:solid 2px Black"> 
               @endif 
            @endif 
            @if ( $routeName=='admin.student.pdf.generate')
            <img  src="{{ $path }}" alt="" width="103px" height="103px" style="margin-top: 10px; border:solid 2px Black"> 
            @endif
            @if ( $routeName=='admin.student.preview')
            <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" width="120px" height="120px" style="border:solid 2px Black">
            @endif 
           </div>
           </div>
           <div class="row">
            <div class="col-lg-3">
              <li>Permanent Address</li>  
            <li>Permanent Pincode</li>  
            <li>Correspondence Address</li>  
            <li>Correspondence Pincode</li> 
            </div> 
            <div class="col-lg-9">
               <li><b>{{ $student->addressDetails->address->p_address or ''}}</b></li>
            <li><b>{{ $student->addressDetails->address->p_pincode or ''}}</b></li>
            <li><b>{{ $student->addressDetails->address->c_address or ''}}</b></li>
            <li><b>{{ $student->addressDetails->address->c_pincode or ''}}</b></li>
            </div> 
           </div>  
         </div> 
      </div>
    </div> 
  <div class="page-breck"></div> 
@foreach ($student->parents as $parent)
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title text-center">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent1{{ $parent->relation->id or ''}}">
           {{ $parent->relation->name or ''}}'s Details</a>
        </h4>
      </div>
      <div id="parent1{{ $parent->relation->id or ''}}" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
              <div class="col-lg-3">
                <li>Name</li> 
                <li>Mobile No. </li>
                <li>Education</li>
                <li>Date of Birth</li>
                <li>Date Of Anniversary</li>
                <li>Annual Income</li> 
                <li>Profession </li> 
                <li>Alive</li> 
              </div>
              <div class="col-lg-7">
                <li><b>{{ $parent->parentInfo->name  or ''}}</b></li>
                 <li><b> {{ $parent->parentInfo->mobile or ''}} </b></li>
                <li><b> {{ $parent->parentInfo->education or ''}} </b></li> 
                 <li><b>{{ date('d-m-Y', strtotime($parent->parentInfo->dob or ''))}}</b></li>
                 <li><b>{{ date('d-m-Y', strtotime($parent->parentInfo->doa or ''))}}</b></li>
                <li><b> {{ $parent->parentInfo->incomes->range or ''}} </b></li> 
                 <li><b> {{ $parent->parentInfo->profetions->name or ''}} </b></li>  
                <li><b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li>
                 
              </div> 
              <div class="col-lg-2" style="float: right;">
                 @php
                $routeNames= Route::currentRouteName();
                $paths =storage_path('app/'.$parent->parentInfo->photo); 
                $image = route('admin.parents.image.show',$parent->parentInfo->id); 
                @endphp
                
                @if ($routeNames=='admin.student.preview')
                <img  src="{{ ($parent->parentInfo->id)? $image : asset('profile-img/user.png') }}" width="103px" height="103px" style="float: right; border:solid 2px Black"> 
                 @else  
                <img  src="{{ $paths }}" alt="" width="103px" height="103px" style="float: right;margin-top: 10px; border:solid 2px Black">  
                @endif 
                  </div> 
              </div>
              <div class="row">
                <div class="col-lg-3">
                 <li>Office Address</li>   
                 <li>Organization Name</li>  
                 <li>Designation</li>  
               </div>
               <div class="col-lg-9">
                 <li><b> {{ $parent->parentInfo->office_address or ''}} </b></li>
                 <li><b> {{ $parent->parentInfo->organization_address or ''}} </b></li>
                 <li><b> {{ $parent->parentInfo->f_designation or ''}} </b></li> 
               </div>
                
             </div>
      
        </div>
      </div>
    </div> 
  
@endforeach
   <div class="page-breck"></div>
      
    @php
      $studentMedicalDetails=App\Model\StudentMedicalInfo::where('student_id',$student->id)->first();
    @endphp
    @if (!empty($studentMedicalDetails))
      
    <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        Medical Details</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse in">
      <div class="panel-body">
  
    @foreach($studentMedicalInfos as $studentMedicalInfo)
          
    <div class="row" > 
        <div class="col-lg-6"> 
            <li>On Date:- <b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b></li>
        </div> 
        <div class="col-lg-6">
            <li>Blood Group :-<b> {{ $studentMedicalInfo->bloodgroups->name or ''}} </b> </li>
        </div>
    </div>
    <div class="row" > 
        <div class="col-lg-6"> 
            <li>HB :-<b> {{ $studentMedicalInfo->hb }} </b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>BP :-<b> {{ $studentMedicalInfo->bp }}</b> </li>
        </div>
    </div>
    <div class="row" > 
        <div class="col-lg-6"> 
            <li>Height :-<b> {{ $studentMedicalInfo->height }}</b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>Weight :-<b> {{ $studentMedicalInfo->weight }} </b> </li>
        </div>
    </div> 
    <div class="row" > 
        <div class="col-lg-6"> 
            @if ($studentMedicalInfo->physical_handicapped==0)

            <li>Physical Handicapped:-<b>No</b> </li>  
            @else
            <li>Physical Handicapped :-<b>Yes</b> </li>  
            @endif 
        </div> 
        <div class="col-lg-6">
            <li>Narration :-<b> {{ $studentMedicalInfo->narration }}</b> </li>
        </div>
    </div> 
    <div class="row" > 
        <div class="col-lg-6"> 
            @if ($studentMedicalInfo->alergey==0)

            <li>Allergy :-<b>No</b> </li>  
            @else
            <li>Allergy :-<b>Yes</b> </li>  
            @endif 
        </div> 
        <div class="col-lg-6">
            <li>Allergy Vacc :-<b> {{ $studentMedicalInfo->alergey_vacc }}</b> </li>
        </div>
    </div> 
    <div class="row" > 
        <div class="col-lg-6"> 
            <li>ID Mark 1 :-<b> {{ $studentMedicalInfo->id_marks1 }}</b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>ID Marks 2 :-<b> {{ $studentMedicalInfo->id_marks2 }}</b> </li>
        </div>
    </div>
    <div class="row" > 
        <div class="col-lg-6"> 
            <li>Dental :-<b> {{ $studentMedicalInfo->dental }}</b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>Vision :-<b> {{ $studentMedicalInfo->vision }}</b> </li>
        </div>
    </div> 
    <div class="row" > 
        <div class="col-lg-6">
            <li>Complexion :-<b> {{ $studentMedicalInfo->complextion }}</b> </li>
        </div>
    </div>
     <hr>
     
  
    @endforeach
      </div>
    </div>
  </div>
  @endif
    @if (!empty($studentSiblingInfos)) 
    <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
        Sibling Details</a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse in">
      <div class="panel-body">
          
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
    </div><hr>{{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
    @endforeach
      </div>
    </div>
  </div> 
    @endif
   @php
      $studentSubjectDetails=App\Model\StudentSubject::where('student_id',$student->id)->first();
    @endphp
    @if (!empty($studentSubjectDetails))
        
   
    <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
        Subjects Details</a>
      </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse in">
      <div class="panel-body">
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





{{--  <div class="col-lg-6"> 
<li>Subject Name:-<b> {{ $studentSubject->SubjectTypes->name }}</b> </li>   
</div>
<div class="col-lg-6"> 
<li>ISOptional:-<b>{{ $studentSubject->ISOptionals->name }}</b> </li>  
</div>
</div>  --}}
@php
      $studentDocument=App\Model\Document::where('student_id',$student->id)->first();
    @endphp
    @if (!empty($studentDocument))
 <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
        Document Details</a>
      </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse in">
      <div class="panel-body">
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