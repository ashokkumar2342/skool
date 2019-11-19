   <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
   <div class="modal-dialog" style="width:70%"> 
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       <div class="row"> 
        <div class="col-lg-12 text-right"> 
        <button type="button" id="btn_close" class="close text-right" data-dismiss="modal">&times;</button> 
        </div> 
      </div>
        @include('admin.student.studentdetails.pdf_generate')
         <div class="modal-footer">
         <a href="{{ route('admin.student.pdf.generate',$student->id) }}" class="btn btn-success btn-sm" title="Pdf" style="">Download Profile</a>
         <button type="button" id="btn_close" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Close</button>
         </div> 
        
    {{--     <div class="row"> 
        <h4 align="center"><b>Student Details</b></h4><hr>                                             
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="form-group">
                   <div class="col-md-12">
                       <span id="sp-error" class="text-danger field-validation-error" data-valmsg-replace="true"> 
                       </span>
                   </div>
               </div>
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body">
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>First Name :<b> {{ $student->name }}  </b> </p>  
                               </div>
                           </div> 
                            <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Nick Name : <b>{{ $student->nick_name }}</b></p> 
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Email : <b>{{ $student->email }}</b></p> 
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Class : <b>{{ $student->classes->name or '' }}</b></p> 
                               </div>
                           </div> 
                            <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Section : <b>{{ $student->sections->name or '' }}</b></p> 
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Registration No : <b>{{ $student->registration_no }}</b></p> 
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Addmission No : <b>{{ $student->admission_no }}</b></p> 
                               </div>
                           </div> 
                            <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p> Date Of Addmission : <b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b></p> 
                               </div>
                           </div>  
                           <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p> Date Of Activation : <b>{{date('d-m-Y',strtotime($student->date_of_activation ))}}</b></p> 
                               </div>
                           </div>
                            <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>  Date Of Birth : <b>{{date('d-m-Y',strtotime($student->dob ))}}</b></p> 
                               </div>
                           </div>  
                           <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>  Gender : <b>{{ $student->genders->genders or '' }}</b></p> 
                               </div>
                           </div> 
                            <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>   Parmanent Address : <b>{{ $student->p_address }}</b></p> 
                               </div>
                           </div>
                         </div> 
                        </div>
                      </div>
                 
                     <div class="col-lg-6">
                   <div class="form-horizontal">
                       <div class="box-body">
                        <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Father's Name : <b>{{ $student->father_name }}</b></p> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Mother's Name : <b>{{ $student->mother_name }}</b></p> 
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Father's Mobile : <b>{{ $student->father_mobile }}</b></p> 
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Mother's Mobile : <b>{{ $student->mother_mobile }}</b></p> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> User Name : <b>{{ $student->username }}</b></p> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Password : <b>{{ $student->tem_pass }}</b></p> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Category : <b>{{ $student->name }}</b></p> 
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Religion : <b>{{ $student->name }}</b></p> 
                            </div>
                        </div>  
                        <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> City : <b>{{ $student->city }}</b></p> 
                            </div>
                        </div> 
                         <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> State : <b>{{ $student->state }}</b></p> 
                            </div>
                        </div> 
                         <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Pincode : <b>{{ $student->pincode }}</b></p> 
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-sm-12 bd">
                             <p> Corespondance Address : <b>{{ $student->c_address }}</b></p> 
                            </div>
                        </div> 
                      </div>

        </div>

        
      </div>
    </div>
       <div class="modal-body">
        
        <div class="row"> 
          @foreach($parents as $parent)
        <h4 align="center"><b>{{ $parent->relationType->name or ''}} Details</b></h4><hr>                                             
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body"> 
                            <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Father Name : <b>{{ $parent->name  }}</b></p> 
                               </div>
                           </div>  
                           
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Education :<b> {{ $parent->education or ''}} </b> </p>  
                               </div>
                           </div> 
                            <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Profetions :<b> {{ $parent->profetions->name or ''}} </b> </p>  
                               </div>
                           </div>  
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Incomes :<b> {{ $parent->incomes->name or ''}} </b> </p>  
                               </div>
                           </div>  <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Mobile :<b> {{ $parent->mobile }} </b> </p>  
                               </div>
                           </div> 
                         </div>
                        </div>
                       </div> 
                                           
                    <div class="col-lg-6">
                           <div class="form-horizontal">
                               <div class="box-body">
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                     <p> Email : <b>{{ $parent->email }}</b></p> 
                                    </div>
                                </div> 
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                     <p>Date of Birth : <b>{{ date('d-m-Y', strtotime($parent->dob))}}</b></p> 
                                    </div>
                                </div>  
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                     <p>Date Of Anniversary: <b>{{ date('d-m-Y', strtotime($parent->doa))}}</b></p> 
                                    </div>
                                </div> 
                                 <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                     <p>Office Address : <b>{{ $parent->office_address }}</b></p> 
                                    </div>
                                </div> 
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                     <p>Islive : <b>{{ $parent->islive == 1? 'Yes' : 'No' }}</b></p> 
                                    </div>
                                </div> 
                              </div>
                            </div> 
                        </div> 
                @endforeach <div class="modal-body">
        
        <div class="row"> 
          @foreach($studentMedicalInfos as $studentMedicalInfo)
        <h4 align="center"><b>Medical Details</b></h4><hr>                                             
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body"> 
                            <div class="form-group">
                               <div class="col-sm-12 bd"> --}}
                                {{-- <td>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</td>
                                 <td>{{ $medicalInfo->bloodgroups->name or ''}}</td>
                                 <td>{{ $medicalInfo->hb }}</td>
                                 <td>{{ $medicalInfo->weight }}</td>
                                 <td>{{ $medicalInfo->height }}</td>
                                 
                                 <td>{{ $medicalInfo->vision }}</td>
                                 <td>{{ $medicalInfo->complextion }}</td>
                                 <td>{{ $medicalInfo->alergey }}</td>
                                 <td>{{ $medicalInfo->alergey_vacc }}</td>
                                 <td>{{ $medicalInfo->physical_handicapped }}</td>
                                 <td>{{ $medicalInfo->narration }}</td>
                                 <td>{{ $medicalInfo->dental }}</td>                                  
                                 <td>{{ $medicalInfo->bp }}</td> 
                                 <td>{{ $medicalInfo->id_marks1 }}</td>
                                 <td>{{ $medicalInfo->id_marks2 }}</td>

                                    <p>On Date: <b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b></p> 
                               </div>
                           </div>  
                           
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Blood Group :<b> {{ $studentMedicalInfo->bloodgroups->name or ''}} </b> </p>  
                               </div>
                           </div> 
                            <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>HB :<b> {{ $studentMedicalInfo->hb }} </b> </p>  
                               </div>
                           </div>  
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Weight :<b> {{ $studentMedicalInfo->weight }} </b> </p>  
                               </div>
                           </div>  
                           
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                @if ($studentMedicalInfo->physical_handicapped==0)
                              
                                <p>Physical Handicapped:<b>No</b> </p>  
                                  @else
                                  <p>Physical Handicapped :<b>Yes</b> </p>  
                                @endif 
                                 
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd">
                               @if ($studentMedicalInfo->alergey==0)
                              
                                <p>Alergey :<b>No</b> </p>  
                                  @else
                                  <p>Alergey :<b>Yes</b> </p>  
                                @endif 
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>ID Mark 1 :<b> {{ $studentMedicalInfo->id_marks1 }}</b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Dental :<b> {{ $studentMedicalInfo->dental }}</b> </p>  
                               </div>
                           </div> 
                         </div>
                        </div>
                       </div> 
                                           
                    <div class="col-lg-6">
                           <div class="form-horizontal">
                               <div class="box-body">
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                    <p>Vision :<b> {{ $studentMedicalInfo->vision }}</b> </p>
                                    </div>
                                </div> 
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                    <p>BP :<b> {{ $studentMedicalInfo->bp }}</b> </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <div class="col-sm-12 bd"> 
                                    <p>Complextion :<b> {{ $studentMedicalInfo->complextion }}</b> </p>  
                                   </div>
                                </div>  
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                   <p>Height :<b> {{ $studentMedicalInfo->height }}</b> </p>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                   <p>Narration :<b> {{ $studentMedicalInfo->narration }}</b> </p>
                                    </div>
                                </div> 
                                <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                   <p>Alergey Vacc :<b> {{ $studentMedicalInfo->alergey_vacc }}</b> </p>
                                    </div>
                                </div>
                                 <div class="form-group"> 
                                    <div class="col-sm-12 bd">
                                   <p>ID Marks 2 :<b> {{ $studentMedicalInfo->id_marks2 }}</b> </p>
                                    </div>
                                </div> 
                                 
                                
                              </div>
                            </div> 
                        </div>
                        </div> 
                @endforeach 
 
      <div class="modal-body">
        
        <div class="row"> 
           
        <h4 align="center"><b> Document Details</b></h4><hr>                                             
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body"> 
                       
                           
                         
                            <div class="form-group col-lg-12">
                               <div class="col-sm-12 bd">
                                    <p>DOCUMENT NAME : 
                                       @foreach ($documents as $document)
                                      <b>{{ $document->documentTypes->name or ''  }}  /</b>&nbsp;&nbsp;
                                      @endforeach
                                    </p> 
                               </div>
                           </div> 
                          
                         </div>
                        </div>
                       </div>              
                    <div class="col-lg-6">
                      <div class="form-horizontal">
                         <div class="box-body"> 
                         
                         </div>
                      </div> 
                    </div>
                 </div>
                 
                     
              </div>
            </div>
          </div> --}}
        
    </div>
  </div>
</div>

