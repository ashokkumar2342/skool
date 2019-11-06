   <!DOCTYPE html>
   <html>
   <head>
   	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   	<title></title>
   </head>
   @include('admin.include.boostrap')
   <body>

     @if (in_array(1,$sectionWiseDetails)) 
     <h4 align="center"><b>Student Details</b></h4><hr>
     <div class="row" style="margin-left: 80px" style="margin-left: 80px"> 
      <div class="col-lg-6"> 
        <p><li>First Name :-<b> {{ $student->name }}  </b> </li></p>  
      </div> 

      <div class="col-lg-6">
        <p><li>Nick Name :-<b>{{ $student->nick_name }}</b></li></p> 
      </div>
    </div> 
     
   <div class="row" style="margin-left: 80px"> 
    <div class="col-lg-6">
      <p><li>Class :-<b>{{ $student->classes->name or '' }}</b></li></p> 
    </div>
 
  
   <div class="col-lg-6">
    <p><li>Section :-<b>{{ $student->sectionTypes->name or '' }}</b></li></p> 
  </div>
 </div> 
<div class="row" style="margin-left: 80px"> 
  <div class="col-lg-6">
    <p><li>Registration No :-<b>{{ $student->registration_no }}</b></li></p> 
  </div>
 
  
   <div class="col-lg-6">
    <p><li>Admission No :-<b>{{ $student->admission_no }}</b></li></p> 
  </div>
 </div> 
<div class="row" style="margin-left: 80px"> 
  <div class="col-lg-6">
    <p><li> Date Of Admission :-<b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li></p> 
  </div>
  
  
   <div class="col-lg-6">
    <p><li> Date Of Activation :-<b>{{date('d-m-Y',strtotime($student->date_of_activation ))}}</b></li></p> 
  </div>
</div>  
<div class="row" style="margin-left: 80px"> 
  <div class="col-lg-6">
    <p><li>  Date Of Birth :-<b>{{date('d-m-Y',strtotime($student->dob ))}}</b></li></p> 
  </div> 
   <div class="col-lg-6">
    <p><li>  Gender :-<b>{{ $student->genders->genders or '' }}</b></li></p> 
  </div>
 </div> 
 <div class="row" style="margin-left: 80px"> 
      <div class="col-lg-6"> 
        <p><li>Primary Mobile :-<b> {{ $student->addressDetails->address->primary_mobile or '' }}  </b> </li></p>  
      </div> 

      <div class="col-lg-6">
        <p><li>Primary Email :-<b>{{ $student->addressDetails->address->primary_email or '' }}</b></li></p> 
      </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
      <div class="col-lg-6"> 
        <p><li>Category :-<b> {{ $student->addressDetails->address->categories->name or '' }}  </b> </li></p>  
      </div> 

      <div class="col-lg-6">
        <p><li>Religion :-<b>{{ $student->addressDetails->address->religions->name or '' }}</b></li></p> 
      </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
      <div class="col-lg-6"> 
        <p><li>State :-<b> {{ $student->addressDetails->address->state or '' }}  </b> </li></p>  
      </div> 

      <div class="col-lg-6">
        <p><li>City :-<b>{{ $student->addressDetails->address->city or '' }}</b></li></p> 
      </div>
    </div>  

   
   
  <div class="row" style="margin-left: 80px">
    <div class="col-lg-6">
     <p><li> User Name :- <b>{{ $student->username }}</b></li></p> 
   </div>

   <div class="col-lg-6">
     <p><li> Password :- <b>{{ $student->tem_pass }}</b></li></p> 
   </div>
  </div> 
  <h4 align="center"><b>Address Details</b></h4><hr>
     
    <div class="row" style="margin-left: 80px"> 
      <div class="col-lg-6"> 
        <p><li>Permanent Address   :-<b> {{ $student->addressDetails->address->p_address or '' }}  </b> </li></p>  
      </div> 

      <div class="col-lg-6">
        <p><li>Correspondence Address   :-<b>{{ $student->addressDetails->address->c_address or '' }}</b></li></p> 
      </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
      <div class="col-lg-6"> 
        <p><li>Permanent Pincode   :-<b> {{ $student->addressDetails->address->p_pincode or '' }}  </b> </li></p>  
      </div> 

      <div class="col-lg-6">
        <p><li>Correspondence Pincode   :-<b>{{ $student->addressDetails->address->c_pincode or '' }}</b></li></p> 
      </div>
    </div> 
  @endif
   @if (!empty($student->parents[0]->parentInfo->id))    
  @foreach(App\Model\ParentsInfo::where('id',$student->parents[0]->parentInfo->id)->get() as $parent)
  @if (in_array(2,$sectionWiseDetails))

  <h4 align="center"><b>Father Details</b></h4><hr>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Name :- <b>{{ $parent->name  }}</b></li></p>  
  </div> 
  <div class="col-lg-6">
   <p><li>Education :-<b> {{ $parent->education or ''}} </b> </li></p>   
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Profetions :-<b> {{ $parent->profetions->name or ''}} </b> </li></p>
  </div> 
  <div class="col-lg-6">
   <p><li>Incomes :-<b> {{ $parent->incomes->name or ''}} </b> </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Mobile :-<b> {{ $parent->mobile }} </b> </li></p>
  </div> 
  <div class="col-lg-6">
    <p><li> Email :- <b>{{ $parent->email }}</b></li></p> 
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($parent->dob))}}</b></li></p> 
  </div> 
  <div class="col-lg-6">
   <p><li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($parent->doa))}}</b></li></p>
  </div>
  </div>  
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Office Address :- <b>{{ $parent->office_address }}</b></li></p> 
  </div> 
  <div class="col-lg-6">
    <p><li>Islive :- <b>{{ $parent->islive == 1? 'Yes' : 'No' }}</b></li></p> 
  </div>
  </div>
  @endif             
  @endforeach
  @endif 
  @if (!empty($student->parents[1]->parentInfo->id)) 
  @foreach(App\Model\ParentsInfo::where('id',$student->parents[1]->parentInfo->id)->get() as $parent)
  @if (in_array(2,$sectionWiseDetails))

  <h4 align="center"><b>Mother Details</b></h4><hr>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Name :- <b>{{ $parent->name  }}</b></li></p>  
  </div> 
  <div class="col-lg-6">
   <p><li>Education :-<b> {{ $parent->education or ''}} </b> </li></p>   
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Profetions :-<b> {{ $parent->profetions->name or ''}} </b> </li></p>
  </div> 
  <div class="col-lg-6">
   <p><li>Incomes :-<b> {{ $parent->incomes->name or ''}} </b> </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Mobile :-<b> {{ $parent->mobile }} </b> </li></p>
  </div> 
  <div class="col-lg-6">
    <p><li> Email :- <b>{{ $parent->email }}</b></li></p> 
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($parent->dob))}}</b></li></p> 
  </div> 
  <div class="col-lg-6">
   <p><li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($parent->doa))}}</b></li></p>
  </div>
  </div>  
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Office Address :- <b>{{ $parent->office_address }}</b></li></p> 
  </div> 
  <div class="col-lg-6">
    <p><li>Islive :- <b>{{ $parent->islive == 1? 'Yes' : 'No' }}</b></li></p> 
  </div>
  </div>
  @endif             
  @endforeach
  @endif 
  @if (!empty($student->parents[2]->parentInfo->id))
    
 
  @foreach(App\Model\ParentsInfo::where('id',$student->parents[2]->parentInfo->id)->get() as $parent)
  @if (in_array(2,$sectionWiseDetails))

  <h4 align="center"><b>Grand Father Details</b></h4><hr>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Name :- <b>{{ $parent->name  }}</b></li></p>  
  </div> 
  <div class="col-lg-6">
   <p><li>Education :-<b> {{ $parent->education or ''}} </b> </li></p>   
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Profetions :-<b> {{ $parent->profetions->name or ''}} </b> </li></p>
  </div> 
  <div class="col-lg-6">
   <p><li>Incomes :-<b> {{ $parent->incomes->name or ''}} </b> </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Mobile :-<b> {{ $parent->mobile }} </b> </li></p>
  </div> 
  <div class="col-lg-6">
    <p><li> Email :- <b>{{ $parent->email }}</b></li></p> 
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($parent->dob))}}</b></li></p> 
  </div> 
  <div class="col-lg-6">
   <p><li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($parent->doa))}}</b></li></p>
  </div>
  </div>  
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Office Address :- <b>{{ $parent->office_address }}</b></li></p> 
  </div> 
  <div class="col-lg-6">
    <p><li>Islive :- <b>{{ $parent->islive == 1? 'Yes' : 'No' }}</b></li></p> 
  </div>
  </div>
  @endif             
  @endforeach
 @endif
  @if (in_array(3,$sectionWiseDetails))
         @php
            $student=App\Student::find($student->id);
            $path =storage_path('app/student/profile/'.$student->barcode);
          @endphp
           <div class="row pull-right">
          <div class="col-lg-12">
          <img  src="{{ $path }}" alt="" width="20%" height="10%" >
            
          </div>
        </div>
  <h4 align="center"><b>Medical Details</b></h4><hr>
  @foreach(App\Model\StudentMedicalInfo::where('student_id',$student->id)->get() as $studentMedicalInfo) 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>On Date:- <b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b></li></p>
   </div> 
   <div class="col-lg-6">
    <p><li>Blood Group :-<b> {{ $studentMedicalInfo->bloodgroups->name or ''}} </b> </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>HB :-<b> {{ $studentMedicalInfo->hb }} </b> </li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>BP :-<b> {{ $studentMedicalInfo->bp }}</b> </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Height :-<b> {{ $studentMedicalInfo->height }}</b> </li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>Weight :-<b> {{ $studentMedicalInfo->weight }} </b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    @if ($studentMedicalInfo->physical_handicapped==0)

    <p><li>Physical Handicapped:-<b>No</b> </li></p>  
    @else
    <p><li>Physical Handicapped :-<b>Yes</b> </li></p>  
    @endif 
  </div> 
  <div class="col-lg-6">
    <p><li>Narration :-<b> {{ $studentMedicalInfo->narration }}</b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    @if ($studentMedicalInfo->alergey==0)

    <p><li>Alergey :-<b>No</b> </li></p>  
    @else
    <p><li>Alergey :-<b>Yes</b> </li></p>  
    @endif 
  </div> 
  <div class="col-lg-6">
   <p><li>Alergey Vacc :-<b> {{ $studentMedicalInfo->alergey_vacc }}</b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>ID Mark 1 :-<b> {{ $studentMedicalInfo->id_marks1 }}</b> </li></p>  
   </div> 
   <div class="col-lg-6">
     <p><li>ID Marks 2 :-<b> {{ $studentMedicalInfo->id_marks2 }}</b> </li></p>
   </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>Dental :-<b> {{ $studentMedicalInfo->dental }}</b> </li></p>  
   </div> 
   <div class="col-lg-6">
    <p><li>Vision :-<b> {{ $studentMedicalInfo->vision }}</b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
     <p><li>Complextion :-<b> {{ $studentMedicalInfo->complextion }}</b> </li></p>
   </div>
  </div>
  <hr>
  @endforeach
  @endif 
  @if (in_array(3,$sectionWiseDetails))
  <h4 align="center"><b>Medical Details</b></h4><hr> 
   
                        
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>On Date : ................ <b></b></li></p>
   </div> 
   <div class="col-lg-6">
    <p><li>Blood Group : ................ </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>HB : ................</li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>BP : ................</li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Height : ................</li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>Weight : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     

    <p><li>Physical Handicapped : ................</li></p>  
    
      
    
  </div> 
  <div class="col-lg-6">
    <p><li>Narration : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    

    <p><li>Alergey : ................</li></p>  
    
  </div> 
  <div class="col-lg-6">
   <p><li>Alergey Vacc : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>ID Mark 1 : ................</li></p>  
   </div> 
   <div class="col-lg-6">
     <p><li>ID Marks : ................</li></p>
   </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>Dental : ................</li></p>  
   </div> 
   <div class="col-lg-6">
    <p><li>Vision : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
     <p><li>Complextion : ................</li></p>
   </div>
  </div>
  @endif
  @if (in_array(4,$sectionWiseDetails)) 
  <h4 align="center"><b> Sibling Details</b></h4><hr>
  @foreach($studentSiblingInfos as $studentSiblingInfo) 
  <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>Registration No :-<b> {{ $studentSiblingInfo->studentSiblings->registration_no or ''  }}</b> </li>   
        </div>
        <div class="col-lg-6"> 
            <li>Name :-<b>{{ $studentSiblingInfo->studentSiblings->name  or ''}}</b> </li>  
        </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>Class:-<b> {{ $studentSiblingInfo->studentSiblings->classes->name  or '' }}</b> </li>  
        </div>
        <div class="col-lg-6"> 
            <li>Section :-<b>{{ $studentSiblingInfo->studentSiblings->sectionTypes->name or ''   }}</b> </li>  
        </div>
    </div><hr>
  @endforeach 
  @endif
  @if (in_array(5,$sectionWiseDetails))

  <h4 align="center"><b> Subject Details</b></h4><hr>

  <div class="row" style="margin-left: 80px"> 
    <div class="col-lg-12">  
     <table class="table"> 
      <thead>
       <tr>
        <th>Subject Name</th>
        <th>ISOptional</th>
      </tr>
    </thead>
    <tbody>
     @foreach(App\Model\StudentSubject::where('student_id',$student->id)->get() as $studentSubject) 

     <tr>
       <td> {{ $studentSubject->SubjectTypes->name or ''}}</td>
       <td>{{ $studentSubject->ISOptionals->name or ''}}</td>
     </tr>
     @endforeach 

   </tbody>
  </table>
  </div>
  </div> 
  @endif 

  @if (in_array(6,$sectionWiseDetails))

  <h4 align="center"><b> Document Details</b></h4><hr>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-12">
   <table class="table">
      <thead>
        <tr>
          <th>DOCUMENT NAME</th>
        </tr>
      </thead>
      <tbody>
        @foreach(App\Model\Document::where('student_id',$student->id)->get() as $document) 
        <tr>
          <td>{{ $document->documentTypes->name or ''  }} </td>
        </tr>
         @endforeach
      </tbody>
    </table> 
    
  </div>
  </div>
  @endif    
              
  </body>
  </html>