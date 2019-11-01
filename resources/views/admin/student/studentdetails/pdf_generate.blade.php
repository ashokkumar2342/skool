<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<style type="text/css" media="screen">
    .aa{
        margin-top: 500px
    }
    li{
        padding-bottom: 1px;
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

    <div class="row" style="margin-left: 80px" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
           <li>First Name :-<b> {{ $student->name }}  </b> </li> 
        </div>


        <div class="col-lg-6">
            <li>Nick Name :-<b>{{ $student->nick_name }}</b></li> 
        </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
         <li>Email :-<b>{{ $student->email }}</b></li> 
        </div>

        <div class="col-lg-6">
           <li>Class :-<b>{{ $student->classes->name or '' }}</b></li> 
        </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
            <li>Section :-<b>{{ $student->sectionTypes->name or '' }}</b></li> 
        </div>


        <div class="col-lg-6">
            <li>Registration No :-<b>{{ $student->registration_no }}</b></li> 
        </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
            <li>Addmission No :-<b>{{ $student->admission_no }}</b></li> 
        </div>


        <div class="col-lg-6">
            <li> Date Of Addmission :-<b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li> 
        </div>
    </div>  
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
            <li> Date Of Activation :-<b>{{date('d-m-Y',strtotime($student->date_of_activation ))}}</b></li> 
        </div> 
        <div class="col-lg-6">
            <li>  Date Of Birth :-<b>{{date('d-m-Y',strtotime($student->dob ))}}</b></li> 
        </div>
    </div>  
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
            <li>  Gender :-<b>{{ $student->genders->genders or '' }}</b></li> 
        </div> 
    </div>
    <div class="row" style="margin-left: 80px">
        <div class="col-lg-6">
            <li> User Name :- <b>{{ $student->username }}</b></li> 
        </div>

        <div class="col-lg-6">
            <li> Password :- <b>{{ $student->tem_pass }}</b></li> 
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
          
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>Mobile :- <b>{{ $student->addressDetails->address->primary_mobile  or ''}}</b></li>  
        </div> 
        <div class="col-lg-6">
            <li>Eemail :-<b> {{ $student->addressDetails->address->primary_email or ''}} </b> </li>   
        </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>Cotegory :-<b> {{ $student->addressDetails->address->categories->name or ''}} </b> </li>
        </div> 
        <div class="col-lg-6">
            <li>Religion :-<b> {{ $student->addressDetails->address->religions->name or ''}} </b> </li>
        </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>State :-<b> {{ $student->addressDetails->address->state or ''}} </b> </li>
        </div> 
        <div class="col-lg-6">
            <li>City :- <b>{{ $student->addressDetails->address->city or ''}}</b></li> 
        </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li> Parmanent Address  </li> 
        </div>
        <div class="col-lg-6"> 
            
        </div>  
       
    </div> 
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
             <b>{{ $student->addressDetails->address->p_address or ''}}</b> 
        </div>
        <div class="col-lg-6"> 
            <li>Parmanent pincode :- <b>{{ $student->addressDetails->address->p_pincode or ''}}</b></li>  
        </div>  
       
    </div>  
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
            <li>Corespondance Address </li>
        </div> 
        <div class="col-lg-6">
            <li>Corespondance pincode :- <b>{{ $student->addressDetails->address->c_pincode or ''}}</b></li> 
        </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
             <b>{{ $student->addressDetails->address->c_address or ''}}</b>
        </div> 
        <div class="col-lg-6">
              
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
           {{ $parent->relation->name or ''}} Details</a>
        </h4>
      </div>
      <div id="parent{{ $parent->relation->id or ''}}" class="panel-collapse collapse in">
        <div class="panel-body">
            
      <div class="row" style="margin-left: 80px"> 
          <div class="col-lg-6"> 
              <li>Father Name :- <b>{{ $parent->parentInfo->name  or ''}}</b></li>  
          </div> 
          <div class="col-lg-6">
              <li>Education :-<b> {{ $parent->parentInfo->education or ''}} </b> </li>   
          </div>
      </div> 
      <div class="row" style="margin-left: 80px"> 
          <div class="col-lg-6"> 
              <li>Profetions :-<b> {{ $parent->parentInfo->profetions->name or ''}} </b> </li>
          </div> 
          <div class="col-lg-6">
              <li>Incomes :-<b> {{ $parent->parentInfo->incomes->range or ''}} </b> </li>
          </div>
      </div>
      <div class="row" style="margin-left: 80px"> 
          <div class="col-lg-6"> 
              <li>Mobile :-<b> {{ $parent->parentInfo->mobile or ''}} </b> </li>
          </div> 
          <div class="col-lg-6">
              <li> Email :- <b>{{ $parent->parentInfo->email or ''}}</b></li> 
          </div>
      </div>
      <div class="row" style="margin-left: 80px"> 
          <div class="col-lg-6"> 
              <li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($parent->parentInfo->dob or ''))}}</b></li> 
          </div> 
          <div class="col-lg-6">
              <li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($parent->parentInfo->doa or ''))}}</b></li>
          </div>
      </div>  
      <div class="row" style="margin-left: 80px"> 
          <div class="col-lg-6"> 
              <li>Office Address :- <b>{{ $parent->parentInfo->office_address or ''}}</b></li> 
          </div> 
          <div class="col-lg-6">
              <li>Islive :- <b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li> 
          </div>
      </div> 
        </div>
      </div>
    </div> 
   
@endforeach
 @if (!empty($studentMedicalInfos))
      
    
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
          
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>On Date:- <b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b></li>
        </div> 
        <div class="col-lg-6">
            <li>Blood Group :-<b> {{ $studentMedicalInfo->bloodgroups->name or ''}} </b> </li>
        </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>HB :-<b> {{ $studentMedicalInfo->hb }} </b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>BP :-<b> {{ $studentMedicalInfo->bp }}</b> </li>
        </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>Height :-<b> {{ $studentMedicalInfo->height }}</b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>Weight :-<b> {{ $studentMedicalInfo->weight }} </b> </li>
        </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
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
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            @if ($studentMedicalInfo->alergey==0)

            <li>Alergey :-<b>No</b> </li>  
            @else
            <li>Alergey :-<b>Yes</b> </li>  
            @endif 
        </div> 
        <div class="col-lg-6">
            <li>Alergey Vacc :-<b> {{ $studentMedicalInfo->alergey_vacc }}</b> </li>
        </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>ID Mark 1 :-<b> {{ $studentMedicalInfo->id_marks1 }}</b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>ID Marks 2 :-<b> {{ $studentMedicalInfo->id_marks2 }}</b> </li>
        </div>
    </div>
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6"> 
            <li>Dental :-<b> {{ $studentMedicalInfo->dental }}</b> </li>  
        </div> 
        <div class="col-lg-6">
            <li>Vision :-<b> {{ $studentMedicalInfo->vision }}</b> </li>
        </div>
    </div> 
    <div class="row" style="margin-left: 80px"> 
        <div class="col-lg-6">
            <li>Complextion :-<b> {{ $studentMedicalInfo->complextion }}</b> </li>
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
    </div><hr>{{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
    @endforeach
      </div>
    </div>
  </div> 
    @endif
    @if (!empty($studentSubjects))
        
   
    <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
        Subject Details</a>
      </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse in">
      <div class="panel-body">
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
@if (!empty($documents))
   

<h4 align="center"><b> Document Details</b></h4><hr>
<div class="row" style="margin-left: 80px"> 
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