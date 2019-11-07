 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<title></title>
 </head>
  @include('admin.include.boostrap')
<body>



                
    <h4 align="center"><b>Student Details</b></h4><hr>
<div class="row" style="margin-left: 80px" style="margin-left: 80px">
    @if (in_array('name',$fieldNames)) 
        <div class="col-lg-6"> 
          <p><li> Name :-<b> {{ $student->name }}  </b> </li></p>  
        </div> 
     @endif 
     @if (in_array('father_name',$fieldNames))
        <div class="col-lg-6">
           <p><li> Father's Name :- <b>{{ $student->parents[0]->parentInfo->name or ''}}</b></li></p> 
        </div> 
     @endif
</div>
<div class="row" style="margin-left: 80px">
    @if (in_array('mother_name',$fieldNames))
        <div class="col-lg-6">
           <p><li> Mother's Name :- <b>{{ $student->parents[1]->parentInfo->name or '' }}</b></li></p> 
        </div>
     @endif   
        @if (in_array('father_mobile',$fieldNames)) 
        <div class="col-lg-6">
           <p><li> Mobile No:- <b>{{ $student->addressDetails->address->primary_mobile or ''  }}</b></li></p> 
        </div> 
    @endif
</div> 
<div class="row" style="margin-left: 80px">
    @if (in_array('registration_no',$fieldNames))
        <div class="col-lg-6">
            <p><li>Registration No :-<b>{{ $student->registration_no }}</b></li></p> 
        </div> 
    @endif
    @if (in_array('admission_no',$fieldNames)) 
        <div class="col-lg-6">
            <p><li>Admission No :-<b>{{ $student->admission_no }}</b></li></p> 
        </div>
     @endif 
<div class="row" style="margin-left: 80px"> 
    @if (in_array('date_of_admission',$fieldNames))
        <div class="col-lg-6">
            <p><li> Date Of Admission :-<b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li></p> 
        </div> 
    @endif
    @if (in_array('date_of_birth',$fieldNames))
        <div class="col-lg-6">
         <p><li>  Date Of Birth :-<b>{{date('d-m-Y',strtotime($student->dob ))}}</b></li></p>
        </div> 
     @endif 
</div>
</div> 
<div class="row" style="margin-left: 80px"> 
     @if (in_array('email',$fieldNames))
        <div class="col-lg-6">
          <p><li>Email :-<b>{{ $student->addressDetails->address->primary_email or '' }}</b></li></p> 
        </div> 
     @endif
     @if (in_array('username',$fieldNames))
       <div class="col-lg-6">
           <p><li> User Name :- <b>{{ $student->username }}</b></li></p> 
       </div> 
      @endif 
</div>
<div class="row" style="margin-left: 80px">
      @if (in_array('address',$fieldNames))
       <div class="col-lg-6">
           <p><li>   Parmanent Address :-<b>{{ $student->p_address }}</b></li></p> 
       </div> 
       <div class="col-lg-6">
           <p><li> Corespondance Address :- <b>{{ $student->c_address }}</b></li></p> 
       </div>  
      @endif     
</div>
 
@if (in_array(1,$fieldNames))
 @if (!empty($student->parents[0]->parentInfo->name)) 
      <h4 align="center"><b>Father Details</b></h4><hr>
<div class="row" style="margin-left: 80px">
      <div class="col-lg-6"> 
    <p><li> Name :- <b>{{ $student->parents[0]->parentInfo->name or '' }}</b></li></p>  
     </div> 
     <div class="col-lg-6">
   <p><li>Education :-<b> {{ $student->parents[0]->parentInfo->education or ''}} </b> </li></p>   
    </div>
</div> 
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Profetions :-<b> {{ $student->parents[0]->parentInfo->profetions->name or ''}} </b> </li></p>
  </div> 
  <div class="col-lg-6">
   <p><li>Incomes :-<b> {{ $student->parents[0]->parentInfo->incomes->range or ''}} </b> </li></p>
</div>
</div>
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Mobile :-<b> {{ $student->parents[0]->parentInfo->mobile }} </b> </li></p>
  </div> 
  <div class="col-lg-6">
    <p><li> Email :- <b>{{ $student->parents[0]->parentInfo->email }}</b></li></p> 
</div>
</div>
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($student->parents[0]->parentInfo->dob))}}</b></li></p> 
  </div> 
  <div class="col-lg-6">
     <p><li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($student->parents[0]->parentInfo->doa))}}</b></li></p>
 </div>
</div>  
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Office Address :- <b>{{ $student->parents[0]->parentInfo->office_address }}</b></li></p> 
  </div> 
  <div class="col-lg-6">
      <p><li>Islive :- <b>{{ $student->parents[0]->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li></p> 
  </div>
</div>
 @endif 
 @endif
 @if (in_array(2,$fieldNames))
 @if (!empty($student->parents[1]->parentInfo->name)) 
      <h4 align="center"><b>Mother Details</b></h4><hr>
<div class="row" style="margin-left: 80px">
      <div class="col-lg-6"> 
    <p><li> Name :- <b>{{ $student->parents[1]->parentInfo->name or '' }}</b></li></p>  
     </div> 
     <div class="col-lg-6">
   <p><li>Education :-<b> {{ $student->parents[1]->parentInfo->education or ''}} </b> </li></p>   
    </div>
</div> 
<div class="row" style="margin-left: 81px"> 
   <div class="col-lg-6"> 
      <p><li>Profetions :-<b> {{ $student->parents[1]->parentInfo->profetions->name or ''}} </b> </li></p>
  </div> 
  <div class="col-lg-6">
   <p><li>Incomes :-<b> {{ $student->parents[1]->parentInfo->incomes->range or ''}} </b> </li></p>
</div>
</div>
<div class="row" style="margin-left: 81px"> 
   <div class="col-lg-6"> 
      <p><li>Mobile :-<b> {{ $student->parents[1]->parentInfo->mobile }} </b> </li></p>
  </div> 
  <div class="col-lg-6">
    <p><li> Email :- <b>{{ $student->parents[1]->parentInfo->email }}</b></li></p> 
</div>
</div>
<div class="row" style="margin-left: 81px"> 
   <div class="col-lg-6"> 
      <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($student->parents[1]->parentInfo->dob))}}</b></li></p> 
  </div> 
  <div class="col-lg-6">
     <p><li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($student->parents[1]->parentInfo->doa))}}</b></li></p>
 </div>
</div>  
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Office Address :- <b>{{ $student->parents[1]->parentInfo->office_address }}</b></li></p> 
  </div> 
  <div class="col-lg-6">
      <p><li>Islive :- <b>{{ $student->parents[1]->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li></p> 
  </div>
</div>
 @endif
@endif @if (in_array(3,$fieldNames))
 @if (!empty($student->parents[2]->parentInfo->name)) 
      <h4 align="center"><b>Grand Father Details</b></h4><hr>
<div class="row" style="margin-left: 80px">
      <div class="col-lg-6"> 
    <p><li> Name :- <b>{{ $student->parents[2]->parentInfo->name or '' }}</b></li></p>  
     </div> 
     <div class="col-lg-6">
   <p><li>Education :-<b> {{ $student->parents[2]->parentInfo->education or ''}} </b> </li></p>   
    </div>
</div> 
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Profetions :-<b> {{ $student->parents[2]->parentInfo->profetions->name or ''}} </b> </li></p>
  </div> 
  <div class="col-lg-6">
   <p><li>Incomes :-<b> {{ $student->parents[2]->parentInfo->incomes->range or ''}} </b> </li></p>
</div>
</div>
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Mobile :-<b> {{ $student->parents[2]->parentInfo->mobile }} </b> </li></p>
  </div> 
  <div class="col-lg-6">
    <p><li> Email :- <b>{{ $student->parents[2]->parentInfo->email }}</b></li></p> 
</div>
</div>
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($student->parents[2]->parentInfo->dob))}}</b></li></p> 
  </div> 
  <div class="col-lg-6">
     <p><li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($student->parents[2]->parentInfo->doa))}}</b></li></p>
 </div>
</div>  
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
      <p><li>Office Address :- <b>{{ $student->parents[2]->parentInfo->office_address }}</b></li></p> 
  </div> 
  <div class="col-lg-6">
      <p><li>Islive :- <b>{{ $student->parents[2]->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li></p> 
  </div>
</div>
 @endif
@endif
@if (in_array('ondate',$fieldNames) || in_array('bloodgroups',$fieldNames) || in_array('hb',$fieldNames) || in_array('bp',$fieldNames) || in_array('height',$fieldNames) || in_array('weight',$fieldNames)|| in_array('dental',$fieldNames)||in_array('vision',$fieldNames))  
<h4 align="center"><b>Medical Details</b></h4><hr> 
@foreach(App\Model\StudentMedicalInfo::where('student_id',$student->id)->get() as $studentMedicalInfo) 
<div class="row" style="margin-left: 80px"> 
     @if (in_array('ondate',$fieldNames))
        <div class="col-lg-6"> 
             <p><li>On Date:- <b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b></li></p>
        </div >
     @endif
      @if (in_array('bloodgroups',$fieldNames))
        <div class="col-lg-6">
          <p><li>Blood Group :-<b> {{ $studentMedicalInfo->bloodgroups->name or ''}} </b> </li></p>
        </div>
      @endif
</div>
<div class="row" style="margin-left: 80px">
      @if (in_array('hb',$fieldNames))
           <div class="col-lg-6"> 
            <p><li>HB :-<b> {{ $studentMedicalInfo->hb }} </b> </li></p>  
        </div> 
       @endif
       @if (in_array('bp',$fieldNames))
            <div class="col-lg-6">
              <p><li>BP :-<b> {{ $studentMedicalInfo->bp }}</b> </li></p>
            </div> 
        @endif 
</div>
<div class="row" style="margin-left: 80px">
        @if (in_array('height',$fieldNames))
           <div class="col-lg-6"> 
            <p><li>Height :-<b> {{ $studentMedicalInfo->height }}</b> </li></p>  
           </div> 
        @endif 
        @if (in_array('weight',$fieldNames))
            <div class="col-lg-6">
              <p><li>Weight :-<b> {{ $studentMedicalInfo->weight }} </b> </li></p>
            </div> 
        @endif
</div> 
<div class="row" style="margin-left: 80px">
        @if (in_array('dental',$fieldNames))
           <div class="col-lg-6"> 
               <p><li>Dental :-<b> {{ $studentMedicalInfo->dental }}</b> </li></p>  
           </div> 
        @endif
        @if (in_array('vision',$fieldNames))
           <div class="col-lg-6">
            <p><li>Vision :-<b> {{ $studentMedicalInfo->vision }}</b> </li></p>
           </div>
             
        @endif 
</div><hr> 
@endforeach
@endif 
@if (in_array('sib_registration_no',$fieldNames) || in_array('sib_name',$fieldNames)) 
<h4 align="center"><b> Sibling Details</b></h4><hr>

 @foreach($studentSiblingInfos as $studentSiblingInfo) 
<div class="row" style="margin-left: 80px"> 
     @if (in_array('sib_registration_no',$fieldNames))
         <div class="col-lg-6"> 
          <p><li>Registration No :-<b> {{ $studentSiblingInfo->studentSiblings->registration_no or '' }}</b> </li></p>   
         </div> 
     @endif
     @if (in_array('sib_name',$fieldNames))
        <div class="col-lg-6"> 
            <p><li>Name :-<b>{{ $studentSiblingInfo->studentSiblings->name  or ''}}</b> </li></p>  
        </div> 
     @endif
</div>
{{-- <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Class:-<b> {{ $studentSiblingInfo->siblings->classes->name  or '' }}</b> </li></p>  
</div>
<div class="col-lg-6"> 
    <p><li>Section :-<b>{{ $studentSiblingInfo->siblings->sectionTypes->name or ''  }}</b> </li></p>  
</div> --}}
</div><hr>
@endforeach
@endif 


{{-- <h4 align="center"><b> Subject Details</b></h4><hr>

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
         <td> {{ $studentSubject->SubjectTypes->name }}</td>
         <td>{{ $studentSubject->ISOptionals->name }}</td>
     </tr>
     @endforeach 

 </tbody>
</table>
</div>
</div> 




<h4 align="center"><b> Document Details</b></h4><hr>
<div class="row" style="margin-left: 80px"> 
   <div class="col-lg-12"> 
    <p><li>DOCUMENT NAME : 
      @foreach(App\Model\Document::where('student_id',$student->id)->get() as $document) 
      <b>{{ $document->documentTypes->name or ''  }}  /</b>&nbsp;&nbsp;
      @endforeach
  </li></p>
</div>
</div> --}}
 

</body>
</html>