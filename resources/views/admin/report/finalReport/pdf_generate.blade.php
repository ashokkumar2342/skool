   <!DOCTYPE html>
   <html>
   <head>
   	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   	<title></title>
    <style type="text/css">
      
      li{
        padding-bottom: 5px
      }
      .page-break{
        page-break-after:always; 
      } 
    </style>
   </head>
   @include('admin.include.boostrap')
   <body>
   <img src="data:image/png;base64,{{ base64_encode($data)}}" width="25%" height="25%" style="margin-top: -20px" alt="barcode" />   
     @if (in_array(1,$sectionWiseDetails)) 
     <h4 align="center"><b>Student Details</b></h4><hr>
      <div class="row">
        <div class="col-lg-2">
          <li>Name</li>
          <li>Nick Name</li>
          <li>Class</li>
          <li>Section</li>
          <li>Registration No.</li>
          <li>Admission No.</li>
          <li>Date of Admission</li>
          <li>Date of Activation</li> 
        </div> 
        <div class="col-lg-3">
          <li><b>{{ $student->name }}</b></li>
          <li><b>{{ $student->nick_name }}</b></li>
          <li><b>{{ $student->classes->name or '' }}</b></li>
          <li><b>{{ $student->sectionTypes->name or '' }}</b></li>
          <li><b>{{ $student->registration_no }}</b></li>
          <li><b>{{ $student->admission_no }}</b></li>
          <li><b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li>
          <li><b>{{date('d-m-Y',strtotime($student->date_of_activation ))}}</b></li> 
        </div>
        <div class="col-lg-2"> 
          <li>Date Of Birth</li>
          <li>Gender</li>
          <li>Mobile No.</li>
          <li>Aadhaar No.</li>
          <li>Email</li>
          <li>Category</li>
          <li>Religion</li>
          <li>House Name</li>
        </div> 
        <div class="col-lg-5"> 
          <li><b>{{date('d-m-Y',strtotime($student->dob ))}}</b></li>
          <li><b>{{ $student->genders->genders or '' }}</b></li>
          <li><b>{{ $student->addressDetails->address->primary_mobile or '' }}</b></li>
          <li><b>{{ $student->adhar_no }}</b></li>
          <li><b>{{ $student->addressDetails->address->primary_email or '' }}</b></li>
          <li><b>{{ $student->addressDetails->address->categories->name or '' }}</b></li>
          <li><b>{{ $student->addressDetails->address->religions->name or '' }}</b></li>
          <li><b>{{ $student->houses->name or '' }}</b></li>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2">
          <li>Permanent Address</li>
          <li>Correspondence Address</li>
          <li>Permanent Pincode</li>
          <li>Correspondence Pincode</li> 
        </div> 
        <div class="col-lg-8">
          <li><b>{{ $student->addressDetails->address->p_address or '' }}</b></li>
          <li style="margin-top: 20px"><b>{{ $student->addressDetails->address->c_address or '' }}</b></li>
          <li><b>{{ $student->addressDetails->address->p_pincode or '' }}</b></li>
          <li style="margin-top: 20px"><b>{{ $student->addressDetails->address->c_pincode or '' }}</b></li> 
        </div> 
      </div> 
  @endif
  @if (in_array(2,$sectionWiseDetails)) 
    @if (in_array(1,$sectionWiseDetails)) 
  <div class="page-break"></div>
    @endif  
  @endif  
  @foreach($student->parents as $parent)
  @if (in_array(2,$sectionWiseDetails)) 
   <h4 align="center"><b>{{ $parent->relation->name or ''}}'s Details</b></h4><hr> 
  <div class="row">
              <div class="col-lg-2">
                <li>Name</li> 
                <li>Mobile No. </li>
                <li>Email</li>
                <li>Education</li>
                <li>Date of Birth</li> 
              </div>
              <div class="col-lg-4">
                <li><b>{{ $parent->parentInfo->name  or ''}}</b></li>
                 <li><b> {{ $parent->parentInfo->mobile or ''}} </b></li>
                 <li><b> {{ $parent->parentInfo->email or ''}} </b></li>
                <li><b> {{ $parent->parentInfo->education or ''}} </b></li> 
                 <li><b>{{ date('d-m-Y', strtotime($parent->parentInfo->dob or ''))}}</b></li> 
              </div>
              <div class="col-lg-2"> 
                <li>Date Of Anniversary</li>
                <li>Annual Income</li> 
                <li>Profession </li> 
                <li>Alive</li> 
              </div> 
              <div class="col-lg-4"> 
                 <li><b>{{ date('d-m-Y', strtotime($parent->parentInfo->doa or ''))}}</b></li>
                <li><b> {{ $parent->parentInfo->incomes->range or ''}} </b></li> 
                 <li><b> {{ $parent->parentInfo->profetions->name or ''}} </b></li>  
                <li><b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li> 
              </div> 
              </div>
              <div class="row">
                <div class="col-lg-2">
                 <li>Office Address</li>   
                 <li>Organization Name</li>  
                 <li>Designation</li>  
               </div>
               <div class="col-lg-10">
                 <li><b> {{ $parent->parentInfo->office_address or ''}} </b></li>
                 <li><b> {{ $parent->parentInfo->organization_address or ''}} </b></li>
                 <li><b> {{ $parent->parentInfo->f_designation or ''}} </b></li> 
               </div> 
              </div>
              <hr> 
  @endif 
  @endforeach
 
   @if (in_array(3,$sectionWiseDetails)) 
    @if (in_array(1,$sectionWiseDetails)) 
  <div class="page-break"></div>
    @endif  
  @endif  
  @if (in_array(3,$sectionWiseDetails)) 
  <h4 align="center"><b>Medical Details</b></h4><hr>
   @php
    $key=0; 
  @endphp
  @foreach(App\Model\StudentMedicalInfo::where('student_id',$student->id)->get() as $studentMedicalInfo)
    <div class="row" > 
   <div class="col-lg-2"> 
    <li>On Date : </li> 
    <li>Blood Group : </li> 
    <li>HB : </li> 
    <li>BP : </li>  
    <li>Height : </li> 
    <li>Weight : </li> 
    <li>Phy. Handicapped</li>
    <li>Percent : </li>
    <li>Description : </li> 
   </div> 
   <div class="col-lg-3"> 
     <li><b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b></li>
     <li><b>{{ $studentMedicalInfo->bloodgroups->name or ''}}</b></li>  
     <li><b>{{ $studentMedicalInfo->hb }}</b></li>  
     <li><b>{{ $studentMedicalInfo->bp }}</b></li>  
     <li><b>{{ $studentMedicalInfo->height }}</b></li>  
     <li><b>{{ $studentMedicalInfo->weight }}</b></li>  
     <li><b>{{ $studentMedicalInfo->ishandicapped==0?'NO' : 'Yes'}}</b></li>  
     <li><b>{{ $studentMedicalInfo->handi_percent}}</b></li>  
     <li><b>{{ $studentMedicalInfo->physical_handicapped }}</b></li>  
   </div>
   <div class="col-lg-2" style="margin-right: 20px">
     <li>Dental : </li>  
     <li>Allergy : </li>  
     <li>Description : </li>  
     <li>Vaccine : </li>  
     <li>ID Mark1 : </li>  
     <li>ID Mark2 : </li>  
     <li>Complexion : </li>  
     <li>Vision : </li>  
     <li>Narration : </li>  
   </div>
   <div class="col-lg-3" style="margin-right: 20px"> 
     <li><b>{{ $studentMedicalInfo->dental}}</b></li>
     <li><b>{{ $studentMedicalInfo->isalgeric==0?'No' : 'Yes' }}</b></li>
     <li><b>{{ $studentMedicalInfo->alergey }}</b></li>  
     <li><b>{{ $studentMedicalInfo->alergey_vacc }}</b></li>  
     <li><b>{{ $studentMedicalInfo->id_marks1 }}</b></li>  
     <li><b>{{ $studentMedicalInfo->id_marks2 }}</b></li>  
     <li><b>{{ $studentMedicalInfo->complextions->name or ''  }}</b></li>  
     <li><b>{{ $studentMedicalInfo->vision or ''  }}</b></li>  
     <li><b>{{ $studentMedicalInfo->narration or ''  }}</b></li> 
   </div> 
  </div> 
  <hr>
   @php
    $key++; 
  @endphp
  @if ($key==3)
   <div class="page-break"></div> 
   @php
    $key=0;
  @endphp
  @endif
  @endforeach
  @endif 
  @if (in_array(3,$sectionWiseDetails))
 
  <div class="page-break"></div>
  <h4 align="center"><b><img src="data:image/png;base64,{{ base64_encode($data)}}" width="25%" height="25%" style="margin-top: -20px" alt="barcode" />  </b></h4><hr> 
  <h4 align="center"><b>Medical Details</b></h4><hr> 
  <div class="row" > 
   <div class="col-lg-2"> 
    <li>On Date : </li> 
    <li>Blood Group : </li> 
    <li>HB : </li> 
    <li>BP : </li>  
    <li>Height : </li> 
    <li>Weight : </li> 
    <li>Phy. Handicapped</li>
    <li>Percent : </li>
    <li>Description : </li> 
   </div> 
   <div class="col-lg-3"> 
     <li>-----------------------------------------</li>
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
   </div>
   <div class="col-lg-2" style="margin-right: 20px">
     <li>Dental : </li>  
     <li>Allergy : </li>  
     <li>Description : </li>  
     <li>Vaccine : </li>  
     <li>ID Mark1 : </li>  
     <li>ID Mark2 : </li>  
     <li>Complexion : </li>  
     <li>Vision : </li>  
     <li>Narration : </li>  
   </div>
   <div class="col-lg-3" style="margin-right: 20px"> 
     <li>-----------------------------------------</li>
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
     <li>-----------------------------------------</li>  
   </div> 
  </div>
</div>
  @endif

   
  @if (in_array(4,$sectionWiseDetails))
  @if (in_array(2,$sectionWiseDetails)) 
    @if (in_array(1,$sectionWiseDetails)) 
      <div class="page-break"></div> 
   @endif   
  @endif  
  <h4 align="center"><b> Sibling Details</b></h4><hr>
  @foreach($studentSiblingInfos as $studentSiblingInfo) 
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
  @endif
  @if (in_array(5,$sectionWiseDetails))

  <h4 align="center"><b> Subject Details</b></h4><hr>

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
  <div class="row" > 
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