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
      <p><li>Email :-<b>{{ $student->email }}</b></li></p> 
    </div>

    <div class="col-lg-6">
      <p><li>Class :-<b>{{ $student->classes->name or '' }}</b></li></p> 
    </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
    <p><li>Section :-<b>{{ $student->sectionTypes->name or '' }}</b></li></p> 
  </div>


  <div class="col-lg-6">
    <p><li>Registration No :-<b>{{ $student->registration_no }}</b></li></p> 
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
    <p><li>Admission No :-<b>{{ $student->admission_no }}</b></li></p> 
  </div>


  <div class="col-lg-6">
    <p><li> Date Of Admission :-<b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li></p> 
  </div>
  </div>  
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
    <p><li> Date Of Activation :-<b>{{date('d-m-Y',strtotime($student->date_of_activation ))}}</b></li></p> 
  </div>


  <div class="col-lg-6">
    <p><li>  Date Of Birth :-<b>{{date('d-m-Y',strtotime($student->dob ))}}</b></li></p> 
  </div>
  </div>  
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
    <p><li>  Gender :-<b>{{ $student->genders->genders or '' }}</b></li></p> 
  </div>


  <div class="col-lg-6">
    <p><li>   Parmanent Address :-<b>{{ $student->p_address }}</b></li></p> 
  </div>
  </div> 
  <div class="row" style="margin-left: 80px">

    <div class="col-lg-6">
     <p><li> Father's Name :- <b>{{ $student->father_name }}</b></li></p> 
   </div>


   <div class="col-lg-6">
     <p><li> Mother's Name :- <b>{{ $student->mother_name }}</b></li></p> 
   </div>
  </div>
  <div class="row" style="margin-left: 80px">
    <div class="col-lg-6">
     <p><li> Father's Mobile :- <b>{{ $student->father_mobile }}</b></li></p> 
   </div> 
   <div class="col-lg-6">
     <p><li> Mother's Mobile :- <b>{{ $student->mother_mobile }}</b></li></p> 
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
  <div class="row" style="margin-left: 80px">
    <div class="col-lg-6">
     <p><li> Category :- <b>{{ $student->categories->name or ''}}</b></li></p> 
   </div>

   <div class="col-lg-6">
     <p><li> Religion :- <b>{{ $student->religions->name or ''}}</b></li></p> 
   </div>
  </div>
  <div class="row" style="margin-left: 80px">
    <div class="col-lg-6">
     <p><li> City :- <b>{{ $student->city }}</b></li></p> 
   </div>

   <div class="col-lg-6">
     <p><li> State :- <b>{{ $student->state }}</b></li></p> 
   </div>
  </div>
  <div class="row" style="margin-left: 80px">
    <div class="col-lg-6">
     <p><li> Pincode :- <b>{{ $student->pincode }}</b></li></p> 
   </div>

   <div class="col-lg-6">
     <p><li> Corespondance Address :- <b>{{ $student->c_address }}</b></li></p> 
   </div>
  </div>
  @endif 
  @foreach(App\Model\ParentsInfo::where('student_id',$student->id)->get() as $parent)
  @if (in_array(2,$sectionWiseDetails))

  <h4 align="center"><b>{{ $parent->relationType->name or ''}} Details</b></h4><hr>
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

  @foreach(App\Model\StudentMedicalInfo::where('student_id',$student->id)->get() as $studentMedicalInfo) 
  @if (in_array(3,$sectionWiseDetails))


  <h4 align="center"><b>Medical Details</b></h4><hr>
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
  @endif 
  @endforeach
  @if (in_array(3,$sectionWiseDetails))
  <h4 align="center"><b>medicalInfo Details</b></h4><hr> 
   
                        
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
  @foreach(App\Model\StudentSiblingInfo::where('student_id',$student->id)->get() as $studentSiblingInfo) 
  @if (in_array(4,$sectionWiseDetails))

  <h4 align="center"><b> Sibling Details</b></h4><hr>


  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Registration No :-<b> {{ $studentSiblingInfo->siblings->registration_no or '' }}</b> </li></p>   
  </div>
  <div class="col-lg-6"> 
    <p><li>Name :-<b>{{ $studentSiblingInfo->siblings->name  or ''}}</b> </li></p>  
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Class:-<b> {{ $studentSiblingInfo->siblings->classes->name  or '' }}</b> </li></p>  
  </div>
  <div class="col-lg-6"> 
    <p><li>Section :-<b>{{ $studentSiblingInfo->siblings->sectionTypes->name or ''  }}</b> </li></p>  
  </div>
  </div>
  @endif
  @endforeach 
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
    <p><li>DOCUMENT NAME : 
      @foreach(App\Model\Document::where('student_id',$student->id)->get() as $document) 
      <b>{{ $document->documentTypes->name or ''  }}  /</b>&nbsp;&nbsp;
      @endforeach
    </li></p>
  </div>
  </div>
  @endif    
              
  </body>
  </html>