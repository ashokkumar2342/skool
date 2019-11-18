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
    li{
        padding-bottom: 1px;
        padding-left: 10px;

    }

    .page-breck{
      page-break-before:always; 
    }
  
 
    @include('admin.include.boostrap')

</style>
<body>
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
           <div class="col-lg-6"> 
           <li>Name :-<b> {{ $student->name }}  </b> </li> 
           <li>Nick Name :-<b>{{ $student->nick_name }}</b></li>
           <li>Class :-<b>{{ $student->classes->name or '' }}</b></li>
           <li>Section :-<b>{{ $student->sectionTypes->name or '' }}</b></li>
           <li>Registration No :-<b>{{ $student->registration_no }}</b></li>
           <li>Admission No :-<b>{{ $student->admission_no }}</b></li>
           <li>Date Of Admission :-<b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li>
           <li>Date Of Activation :-<b>{{date('d-m-Y',strtotime($student->date_of_activation ))}}</b></li>
           <li>Category :-<b> {{ $student->addressDetails->address->categories->name or ''}} </b> </li>
           <li>State :-<b> {{ $student->addressDetails->address->state or ''}} </b> </li> 
           
                
           </div>
           <div class="col-lg-6"> 
           @php
            $routeName= Route::currentRouteName();
            $path =storage_path('app/student/profile/'.$student->picture); 
            $profile = route('admin.student.image',$student->picture);
            @endphp 
             @if ( $routeName=='admin.student.pdf.generate')
             <img  src="{{ $path }}" alt="" width="103px" height="103px" style=" float: right;margin-top: 10px; border:solid 2px Black"> 
             @else 
              
            <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" width="103px" height="103px" style="float: right; border:solid 2px Black">
             @endif
            <li>Date Of Birth :-<b>{{date('d-m-Y',strtotime($student->dob ))}}</b></li> 
            <li>Mobile No:- <b>{{ $student->addressDetails->address->primary_mobile  or ''}}</b></li>
            <li>Aadhaar No :-<b>{{ $student->adhar_no }}</b></li>
            <li>User Name :- <b>{{ $student->username }}</b></li>   
            <li>Password :- <b>{{ $student->tem_pass }}</b></li>
            <li>E-mail ID:-<b> {{ $student->addressDetails->address->primary_email or ''}} </b></li>
            <li>Gender :-<b>{{ $student->genders->genders or '' }}</b></li>
            <li>Religion :-<b> {{ $student->addressDetails->address->religions->name or ''}} </b></li>
            <li>City :- <b>{{ $student->addressDetails->address->city or ''}}</b></li>
            <li> House Name :-<b>{{$student->houses->name or ''}}</b></li>
        </div>
           </div>  
         </div> 
      </div>
    </div>

    
    
@if (!empty($student->addressDetails->address))
    

     <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Address Details</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse in">
      <div class="panel-body">
          
    
    <div class="row" > 
        <div class="col-lg-6"> 
            <li> Permanent Address  </li> 
        </div>
        <div class="col-lg-6"> 
            
        </div>  
       
    </div> 
    <div class="row" > 
        <div class="col-lg-6" style="margin-left: 25px"> 
             <b >{{ $student->addressDetails->address->p_address or ''}}</b> 
        </div>
        <div class="col-lg-4"> 
            <li>Pincode :- <b>{{ $student->addressDetails->address->p_pincode or ''}}</b></li>  
        </div>  
       
    </div>  
    <div class="row" > 
        <div class="col-lg-6">
            <li>Correspondence Address </li>
        </div> 
        <div class="col-lg-6">
           
        </div>
    </div>
    <div class="row" > 
        <div class="col-lg-6" style="margin-left: 25px">
             <b>{{ $student->addressDetails->address->c_address or ''}}</b>
        </div> 
        <div class="col-lg-5">
           <li>Pincode :- <b>{{ $student->addressDetails->address->c_pincode or ''}}</b></li>     
        </div>
    </div>
   
      </div>
    </div>
  </div> 
 @endif
  
@foreach ($student->parents as $parent)
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title text-center">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent{{ $parent->relation->id or ''}}">
           {{ $parent->relation->name or ''}}'s Details</a>
        </h4>
      </div>
      <div id="parent{{ $parent->relation->id or ''}}" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                <li>Name :- <b>{{ $parent->parentInfo->name  or ''}}</b></li>
                <li>Education :-<b> {{ $parent->parentInfo->education or ''}} </b> </li>
                <li>Annual Income :-<b> {{ $parent->parentInfo->incomes->range or ''}} </b> </li>
                <li>Alive :- <b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li>
                 <li>Office Address :- <b>{{ $parent->parentInfo->office_address or ''}}</b></li>  
              </div>
              <div class="col-lg-6">
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
                <li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($parent->parentInfo->dob or ''))}}</b></li>
                <li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($parent->parentInfo->doa or ''))}}</b></li>
                <li>Mobile No:-<b> {{ $parent->parentInfo->mobile or ''}} </b> </li>
                <li>Profession :-<b> {{ $parent->parentInfo->profetions->name or ''}} </b> </li>
                
                
                
              </div> 
            </div>
      
        </div>
      </div>
    </div> 
   
@endforeach
  
      
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