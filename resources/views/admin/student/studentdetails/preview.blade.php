   <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
   <div class="modal-dialog" style="width:90%"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Details</h4>

      </div>
      <div class="modal-body">
        <div class="row"> 
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
        <h4 align="center"><b>{{ $parent->relationType->name }} Details</b></h4><hr>                                             
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
                @endforeach 
 
      <div class="modal-body">
        
        <div class="row"> 
           
        <h4 align="center"><b> Document Details</b></h4><hr>                                             
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body"> 
                            <div class="form-group">
                               <div class="col-sm-12 bd">
                                    <p>Weight : <b>{{ $documents->name or ''  }}</b></p> 
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
                                    <p>Height : <b>{{ $documents->student_id or ''   }}</b></p> 
                               </div>
                           </div> 
                            
                                
                              </div>
                            </div> 
                        </div>
                        </div>
                 
                     
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

