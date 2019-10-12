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
  @include('admin.include.boostrap')
  
 </style>
 <body>
 	<h4 align="center"><b>Student Details</b></h4><hr>
 	 {{-- 
 	                     <div class="row text-right" style="margin-left: 80px" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-12"> 
                            @php
                            $profile = route('admin.student.image',$student->picture);
                            @endphp    
                           <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" style="width: 150px; height: 180px;  border: 2px solid #d1f7ec">
                          </div>
                        </div>  --}}
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
                                    <p><li>Addmission No :-<b>{{ $student->admission_no }}</b></li></p> 
                               </div>
                           
                             
                               <div class="col-lg-6">
                                    <p><li> Date Of Addmission :-<b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></li></p> 
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
                             </div>
                        <div class="row" style="margin-left: 80px">
                            <div class="col-lg-6">
                             <p><li> User Name :- <b>{{ $student->username }}</b></li></p> 
                            </div>
                        
                            <div class="col-lg-6">
                             <p><li> Password :- <b>{{ $student->tem_pass }}</b></li></p> 
                            </div>
                         </div> 
                         {{-- Address detaills --}}
                         @if (!empty($address))
                         
                        <h4 align="center"><b> Address Details</b></h4><hr>
                         <div class="row" style="margin-left: 80px"> 
                         <div class="col-lg-6"> 
                                 <p><li>Primary Mobile :- <b>{{ $address->primary_mobile  }}</b></li></p>  
                               </div> 
                               <div class="col-lg-6">
                                  <p><li>Primary Eemail :-<b> {{ $address->primary_email or ''}} </b> </li></p>   
                               </div>
                           </div> 
                           <div class="row" style="margin-left: 80px"> 
                         <div class="col-lg-6"> 
                               <p><li>Cotegory :-<b> {{ $address->categories->name or ''}} </b> </li></p>
                               </div> 
                               <div class="col-lg-6">
                                  <p><li>Religion :-<b> {{ $address->religions->name or ''}} </b> </li></p>
                               </div>
                           </div>
                           <div class="row" style="margin-left: 80px"> 
                         <div class="col-lg-6"> 
                               <p><li>State :-<b> {{ $address->state }} </b> </li></p>
                               </div> 
                               <div class="col-lg-6">
                                 <p><li>City :- <b>{{ $address->city }}</b></li></p> 
                               </div>
                           </div>
                            <div class="row" style="margin-left: 80px"> 
                         <div class="col-lg-6"> 
                               <p><li> Parmanent Address :- <b>{{ $address->p_address}}</b></li></p> 
                               </div> 
                               <div class="col-lg-6">
                                <p><li>Corespondance Address :- <b>{{ $address->c_address}}</b></li></p>
                               </div>
                           </div>  
                           <div class="row" style="margin-left: 80px"> 
                         <div class="col-lg-6"> 
                               <p><li>p_pincode :- <b>{{ $address->p_pincode }}</b></li></p> 
                               </div> 
                               <div class="col-lg-6">
                               <p><li>c_pincode :- <b>{{ $address->c_pincode }}</b></li></p> 
                               </div>
                           </div>
                         @endif
                        {{-- Father details --}}
                          @if (!empty($fatherDetail))

                        <h4 align="center"><b> Father Details</b></h4><hr>
                         <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-6"> 
                                 <p><li>Father Name :- <b>{{ $fatherDetail->name  }}</b></li></p>  
                               </div> 
                               <div class="col-lg-6">
                                  <p><li>Education :-<b> {{ $fatherDetail->education or ''}} </b> </li></p>   
                               </div>
                           </div> 
                           <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-6"> 
                               <p><li>Profetions :-<b> {{ $fatherDetail->profetions->name or ''}} </b> </li></p>
                               </div> 
                               <div class="col-lg-6">
                                  <p><li>Incomes :-<b> {{ $fatherDetail->incomes->name or ''}} </b> </li></p>
                               </div>
                           </div>
                           <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-6"> 
                               <p><li>Mobile :-<b> {{ $fatherDetail->mobile }} </b> </li></p>
                               </div> 
                               <div class="col-lg-6">
                                 <p><li> Email :- <b>{{ $fatherDetail->email }}</b></li></p> 
                               </div>
                           </div>
                            <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-6"> 
                               <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($fatherDetail->dob))}}</b></li></p> 
                               </div> 
                               <div class="col-lg-6">
                                <p><li>Date Of Anniversary :- <b>{{ date('d-m-Y', strtotime($fatherDetail->doa))}}</b></li></p>
                               </div>
                           </div>  
                           <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-6"> 
                               <p><li>Office Address :- <b>{{ $fatherDetail->office_address }}</b></li></p> 
                               </div> 
                               <div class="col-lg-6">
                               <p><li>Islive :- <b>{{ $fatherDetail->islive == 1? 'Yes' : 'No' }}</b></li></p> 
                               </div>
                           </div>
                          @endif

                  {{-- mother details           --}}
                   @if (!empty($motherDetail))
                     
                                         <h4 align="center"><b> Mother Details</b></h4><hr>
                                          <div class="row" style="margin-left: 80px"> 
                                           <div class="col-lg-6"> 
                                                  <p><li>Father Name :- <b>{{ $motherDetail->name  }}</b></li></p>  
                                                </div> 
                                                <div class="col-lg-6">
                                                   <p><li>Education :-<b> {{ $motherDetail->education or ''}} </b> </li></p>   
                                                </div>
                                            </div> 
                                            <div class="row" style="margin-left: 80px"> 
                                           <div class="col-lg-6"> 
                                                <p><li>Profetions :-<b> {{ $motherDetail->profetions->name or ''}} </b> </li></p>
                                                </div> 
                                                <div class="col-lg-6">
                                                   <p><li>Incomes :-<b> {{ $motherDetail->incomes->name or ''}} </b> </li></p>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 80px"> 
                                           <div class="col-lg-6"> 
                                                <p><li>Mobile :-<b> {{ $motherDetail->mobile }} </b> </li></p>
                                                </div> 
                                                <div class="col-lg-6">
                                                  <p><li> Email :- <b>{{ $motherDetail->email }}</b></li></p> 
                                                </div>
                                            </div>
                                             <div class="row" style="margin-left: 80px"> 
                                           <div class="col-lg-6"> 
                                                <p><li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($motherDetail->dob))}}</b></li></p> 
                                                </div> 
                                                <div class="col-lg-6">
                                                 <p><li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($motherDetail->doa))}}</b></li></p>
                                                </div>
                                            </div>  
                                            <div class="row" style="margin-left: 80px"> 
                                           <div class="col-lg-6"> 
                                                <p><li>Office Address :- <b>{{ $motherDetail->office_address }}</b></li></p> 
                                                </div> 
                                                <div class="col-lg-6">
                                                <p><li>Islive :- <b>{{ $motherDetail->islive == 1? 'Yes' : 'No' }}</b></li></p> 
                                                </div>
                                            </div> 
                   @endif
         

  	        @foreach($studentMedicalInfos as $studentMedicalInfo)
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
             @endforeach
                 @if (!empty($studentSiblingInfos)) 
                     <h4 align="center"><b> Sibling Details</b></h4><hr>
                      @foreach ($studentSiblingInfos as $studentSiblingInfo)
                            
                           <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-6"> 
                                <p><li>Registration No :-<b> {{ $studentSiblingInfo->studentSiblings->registration_no or ''  }}</b> </li></p>   
                              </div>
                              <div class="col-lg-6"> 
                                <p><li>Name :-<b>{{ $studentSiblingInfo->studentSiblings->name  or ''}}</b> </li></p>  
                              </div>
                           </div>
                           <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-6"> 
                                <p><li>Class:-<b> {{ $studentSiblingInfo->studentSiblings->classes->name  or '' }}</b> </li></p>  
                              </div>
                              <div class="col-lg-6"> 
                                <p><li>Section :-<b>{{ $studentSiblingInfo->studentSiblings->sectionTypes->name or ''   }}</b> </li></p>  
                              </div>
                           </div>
                      @endforeach
                 @endif
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
                            

                          		 
                            		  
                            
 	 	                    {{--  <div class="col-lg-6"> 
                                <p><li>Subject Name:-<b> {{ $studentSubject->SubjectTypes->name }}</b> </li></p>   
                              </div>
                              <div class="col-lg-6"> 
                                <p><li>ISOptional:-<b>{{ $studentSubject->ISOptionals->name }}</b> </li></p>  
                              </div>
                           </div>  --}}
                     
           <h4 align="center"><b> Document Details</b></h4><hr>
                           <div class="row" style="margin-left: 80px"> 
 	 	                     <div class="col-lg-12"> 
                                <p><li>DOCUMENT NAME : 
                                       @foreach ($documents as $document)
                                      <b>{{ $document->documentTypes->name or ''  }}  /</b>&nbsp;&nbsp;
                                      @endforeach
                                    </li></p>
                               </div>
                           </div>
 </body>
 </html>