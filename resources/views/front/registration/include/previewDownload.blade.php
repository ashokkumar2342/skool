 
 <!DOCTYPE html>
 <html>
 <head>
   <title>Download</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
 </head>
 <body>
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
                                 <p>First Name :<b> {{ $pr->name }} </b> </p>  
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="col-sm-12 bd">
                                     <p>Last Name : <b>{{ $pr->last_name }}</b></p> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-12 bd">
                                 <p>Nick Name : <b>{{ $pr->nick_name }} </b></p> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-md-12 bd">                           
                                     <p>Academic Session : <b>{{ $pr->academicYears->name  or '' }}</b></p>
                                    
                                </div>
                            </div> 
                              <div class="form-group">
                                    <div class="col-sm-12 bd">
                                     <p>Aadhaar No. of Child : <b>{{ $pr->aadhaar_no }}</b></p> 
                                    </div>

                                </div>
                            <div class="form-group">
                                <div class="col-sm-12 bd"> 
                                 <p>Date of Birth : <b>{{ $pr->dob }} </b></p> 
                                 </div> 
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                <p>Mother Tongue : <b>{{ $pr->tongues->name or ''}}</b></p>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd"> 
                                 <p>Email : <b>{{ $pr->email }}</b></p>
                                </div>
                            </div>
                            

                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                  <p>Religion : <b>{{ $pr->religions->name or ''}}</b> </p> 
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-12 bd">
                                 <p>Mobile No : <b>{{ $pr->mobile }}</b> </p> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 bd">
                                 <p>Gender : <b>{{ $pr->genders->genders or '' }}</b> </p>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-12 bd">
                                     <p>Blood Group : <b>{{ $pr->bloodGroups->name or ''}}</b> </p> 
                                    </div>
                                </div>

                         
                            <div class="form-group">
                                <div class="col-sm-12 bd">
                                  <p>Class : <b> {{ $pr->classes->name or '' }} </b></p> 
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 bd">
                                  <p>Category:  <b> {{ $pr->categories->name or '' }} </b></p>
                                    
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-md-12 bd"> 
                                   <p>Staff Ward : <b>{{  $pr->staff_ward }}</b></p> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd"> 
                                   <p>Locality :  <b>{{ $pr->locality }}</b></p>
                                </div>
                            </div>
                         <div class="form-group">
                                <div class="col-md-12 bd"> 
                                 <img src="{{ url('storage/profile/'.$pr->image) }}"  title="" height="150px" /> 
                                </div>
                            </div>
                        
                        </div>
                        <!-- /.box-body -->

                    </div>
                </div>
            </div>
          
             </div>
      
        </div>  
        <div class="row">
            
            <div class="col-md-12">

                <div class="col-lg-12">
                 <h4 align="center"><b>Previous School</b></h4><hr>
                    <div class="form-horizontal">
                        <div class="box-body">

                           <div class="form-group">
                                <div class="col-md-12 bd">  
                                 <p>Last School : <b>{{ $pr->last_school }} </b></p>
                                </div>
                            </div> 
                             <div class="form-group">
                                <div class="col-md-12 bd">  
                                 <p>Leaving Date : <b>{{ $pr->leaving_date }} </b></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">  
                                 <p>Reason Change School : <b>{{ $pr->reason_change_school }} </b></p>
                                </div>
                            </div>
                         


                        </div>

                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                     
                         
                    </div>

                </div>



            </div>
      
        </div>
        <div class="row">
          
            <div class="col-md-12">
             <h4 align="center"><b>Address</b></h4><hr>

                <div class="col-lg-5">
                    <div class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                     Residential Address : <b>{{ $pr->c_address }}</b> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">
                                    
                                    <b>Pin code : {{ $pr->pincode }}</b>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                   
                                    Phone No. : <b>{{ $pr->phone }}</b>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                    </div>
                </div>
                <div class="col-lg-2">
                    <center class="adarrowright">
                        <i class="fa fa-arrow-right" onclick="return pAssignAddress();"> </i>
                    </center>
                    
                </div>

                <div class="col-lg-5">
                    <div class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                   
                                   Permanent Address : <b>{{ $pr->p_address }}</b> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">
                                 
                                   Pin code :  <b>{{ $pr->p_pincode }}</b>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                    
                                    Phone No. : <b>{{ $pr->p_phone }}</b>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                     
                    </div>
                  
                   
                </div>
            </div>
           
        </form>
        </div>

        <div class="row"> 
                                           
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <h4 align="center"><b>Father's Details</b></h4><hr>
                <div class="col-lg-6 b-r">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-md-12 bd">  
                                 <p>Father's Name : <b>{{  $pr->f_title }} {{ $pr->father_name }}  </b></p> 
                                </div> 
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd">  
                                 <p>Select Qualification : <b>{{ $pr->f_qualification }} </b></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd">                                                                    
                                    Profession : <b> {{ $pr->f_professions->name or '' }} </b>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                    Designation : <b> {{ $pr->f_designation }}
                                    </b>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">                                       
                                    College/University : <b> {{ $pr->f_college }}</b>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">                                        
                                    Residence Telephone No : <b> {{ $pr->f_residence_telephone }}     </b>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">                                    
                                    Office Telephone No : <b> {{ $pr->f_office_telephone }}</b>
                                </div>
                            </div>

                            <div class="form-group" >
                                <div class="col-md-12 bd"> 
                                    Annual Income : <b> {{ $pr->f_incomeRange->range or '' }}</b>

                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="form-horizontal">
                        <div class="box-body"> 
                            <div class="form-group">
                                <div class="col-md-12 bd">
                                     
                                    Organization : <b>{{ $pr->f_organization }} </b>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">
                                   
                                     Organization Address : <b>{{ $pr->f_organization_address }}</b>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">
                                
                                    Pin code : <b>{{   $pr->f_pin_code }}</b>
                                </div>
                            </div>
                            

                            <div class="form-group" >
                                <div class="col-md-12 bd">
                                     
                                    Phone No : <b>{{ $pr->f_phone_no }}</b>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">
                             
                                   Email Id : <b> {{  $pr->f_email }} </b>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 bd">
                                <P>  Mobile No : <b>{{ $pr->father_mobile }} </b></P>    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 bd">
                                     <p> Fax : <b> {{ $pr->f_fax }}</b></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 bd">
                                    <img src="{{ url('storage/profile/'.$pr->father_image) }}"  title="" height="150px" /> 
                                </div>
                                <div class="col-md-6 bd">
                                    <img src="{{ url('storage/profile/'.$pr->f_signature) }}"  title="" height="150px" /> 
                                </div>
                           </div>

                            

                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                    
                    </div>
                </div>
            </div>
     
         </div>
         <div class="row"> 
                                          
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 align="center"><b>Mother's Details</b></h4><hr>

                     <div class="col-lg-6 b-r">
                         <div class="form-horizontal">
                             <div class="box-body">
                                 <div class="form-group">
                                     <div class="form-group">
                                         <div class="col-md-12 bd">  
                                          <p>Mother's Name : <b>{{  $pr->m_title }} {{ $pr->mather_name }}  </b></p> 
                                         </div> 
                                     </div>

                                 </div>

                                 <div class="form-group">
                                     <div class="col-md-12 bd"> 
                                         Select Qualification  : <b> {{ $pr->m_qualification }} </b>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="col-md-12 bd"> 
                                         Occupation  : <b> {{ $pr->m_professions->name or '' }}</b>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                        
                                         Designation  : <b>{{ $pr->m_designation }} </b>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                         
                                         College/University : <b> {{ $pr->m_college }}</b>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                         
                                         Residence Telephone No : <b>{{ $pr->m_residence_telephone }} </b>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                          
                                         Office Telephone No : <b>{{ $pr->m_office_telephone }} </b>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                        
                                         Annual Income : <b>{{ $pr->m_incomeRange->range or '' }} </b>

                                     </div>
                                 </div>

                             </div>
                             <!-- /.box-body -->
                             <!-- /.box-footer -->
                         </div>
                     </div>


                     <div class="col-lg-6">
                         <div class="form-horizontal">
                             <div class="box-body"> 
                                 <div class="form-group">
                                     <div class="col-md-12 bd"> 
                                         Organization  : <b>{{ $pr->m_organization }} </b>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                          
                                          Organization Address : <b> {{ $pr->m_organization_address }}</b> 
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                       
                                         Pin code : <b>{{ $pr->m_pin_code }} </b>
                                     </div>
                                 </div>
                                 

                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                        
                                         Phone No : <b>{{ $pr->m_phone_no }} </b>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                          
                                         Email Id  : <b>{{ $pr->m_email }} </b>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                          
                                         Mobile No  : <b> {{ $pr->mother_mobile }}</b>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-md-12 bd">
                                          
                                         Fax : <b> {{ $pr->m_fax }}</b>
                                     </div>
                                 </div>
                                   <div class="form-group">
                                     <div class="col-md-6 bd">
                                        
                                      <img src="{{ url('storage/profile/'.$pr->mother_image) }}"  title="" height="150px" /> 
                                     </div>
                                     <div class="col-md-6 bd">
                                    <img src="{{ url('storage/profile/'.$pr->m_signature) }}"  title="" height="150px" /> 
                                </div>
                                </div>

                                 

                             </div>
                             <!-- /.box-body -->
                             <!-- /.box-footer -->
                            
                         </div>
                     </div>
                 </div>
             
             
         </div>
         <div class="row">
                                      
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <h4 align="center"><b>Guardian's Details</b></h4><hr>

               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body">
                           <div class="form-group">
                               <div class="col-md-12 bd"> 
                                       Guardian's Name: <b> {{ $pr->g_title }}{{ $pr->guardian_name }}</b>  
                               </div>

                           </div>

                           <div class="form-group">
                               <div class="col-md-12 bd">
                                   
                                   Select Qualification : <b>{{ $pr->g_qualification }} </b>
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-12 bd">
                                   
                             
                                   Occupation : <b>{{ $pr->g_professions->name or '' }} </b>
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-12 bd">
                                  
                                   Designation  : <b> {{ $pr->g_designation }}</b>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                  
                                   College/University : <b>{{ $pr->g_college }}</b>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                    
                                   Residence Telephone No :<b> {{ $pr->g_residence_telephone }}</b>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                 
                                   Office Telephone No : <b>{{ $pr->g_office_telephone }}</b>
                               </div>
                           </div>

                           <div class="form-group" >
                               <div class="col-md-12 bd">
                                 
                                   Annual Income : <b>{{ $pr->g_incomeRange->range or ''}}</b>

                               </div>
                           </div>
                          
  
                       </div>
                       <!-- /.box-body -->
                       <!-- /.box-footer -->
                   </div>
               </div>


               <div class="col-lg-6">
                   <div class="form-horizontal">
                       <div class="box-body"> 
                           <div class="form-group">
                               <div class="col-md-12 bd"> 
                                   Organization  : <b>{{ $pr->g_organization }}</b>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd"> 
                                    Organization Address: <b>{{ $pr->g_organization_address }} </b>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                    
                                   Pin code : <b>{{ $pr->g_pin_code }}</b>
                               </div>
                           </div>
                           

                           <div class="form-group" >
                               <div class="col-md-12 bd">
                                 
                                   Phone No : <b>{{ $pr->g_phone_no }}</b>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                 
                                   Email Id : <b> {{ $pr->g_email }}</b> 
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-12 bd">
                                    
                                   Mobile No : <b>{{ $pr->guardian_mobile }}</b> 
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                    
                                   Fax : <b>{{ $pr->g_fax }}</b>
                               </div>
                           </div>
                            <div class="form-group">
                               <div class="col-md-12 bd">
                                  
                                   Relation : <b>{{ $pr->g_relation }}</b>
                               </div>
                           </div> 
                            <div class="form-group">
                               <div class="col-md-6 bd">
                                   
                                      <img src="{{ url('storage/profile/'.$pr->guardian_image) }}"  title="" height="150px" /> 
                               </div>
                              <div class="col-md-6 bd">
                                  <img src="{{ url('storage/profile/'.$pr->g_signature) }}"  title="" height="150px" /> 
                              </div>
                          </div>
                       </div>
                       <!-- /.box-body -->
                       <!-- /.box-footer -->
                       
  
                   </div>
               </div>
           </div>
       
         </div>
         <div class="row"> 
           <div class="col-md-12">
             <h4 align="center"><b>Sibling Details</b></h4><hr>
               <div class="form-group">
                   <div class="col-md-12 text-center">
                         Any Sibling  ?(Real brother/sister) : {{ $pr->is_sibling==1?'yes':'no' }}
                   </div> 
               </div>
           </div>
         
             <div class="col-lg-3 b-r" id="tdSibling1">
                 <div class="form-horizontal">
                     <div class="box-body">
                        
                         <div class="form-group">
                             <div class="col-md-12">
                                
                                 Name :
                             </div>

                         </div>
                     </div>

                 </div>
             </div>

               <div class="col-lg-3 b-r" id="tdSibling2">
                   <div class="form-horizontal">
                       <div class="box-body">
                           <div class="form-group">
                               <div class="col-md-12">
                                 class :
                                   
                               </div>
                           </div> 
                         
                       </div>
                       <!-- /.box-body -->
                       <!-- /.box-footer -->
                   </div>
               </div>
                  <div class="col-lg-3 b-r" id="tdSibling2">
                     <div class="form-horizontal">
                         <div class="box-body">
                             <div class="form-group">
                                 <div class="col-md-12">
                                    School Name :
                                     
                                 </div>
                             </div> 
                           
                         </div>
                         <!-- /.box-body -->
                         <!-- /.box-footer -->
                     </div>
                 </div>
                  <div class="col-lg-3 b-r" id="tdSibling2">
                     <div class="form-horizontal">
                         <div class="box-body">
                             <div class="form-group">
                                
                                 School
                             </div> 
                           
                         </div>
                         <!-- /.box-body -->
                         <!-- /.box-footer -->
                     </div>
                 </div>

            
              
         </div>

          
   <div class="row">
  
     <div class="col-md-12">
       <h4 align="center"><b>Career Considered</b></h4><hr>

         <div class="col-md-6 col-lg-6 b-r">
             <div class="form-horizontal">
                 <div class="box-body">
                     <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>  Sports : <b>{{ $pr->sport }}</b> </p> 
                             
                         </div>
                     </div>
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>  Medical History : <b>{{ $pr->medical_history }}</b> </p>   
                         </div>
                     </div>
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p> Is Medical History : <b>{{ $pr->is_medical_history }}</b> </p>   
                         </div>
                     </div>
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>  Medical History : <b>{{ $pr->medical_history }}</b> </p>   
                         </div>
                     </div>
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>   Is Learning Disability : <b>{{ $pr->is_evidence_learning }}</b> </p>   
                         </div>
                     </div>
               

                     </div>
                 <!-- /.box-body -->
                 <!-- /.box-footer -->
             </div>
         </div>
         <div class="col-md-6 col-lg-6 b-r">
             <div class="form-horizontal">
                 <div class="box-body">
                      
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>   Evidence Learning Disability : <b>{{ $pr->evidence_learning_disability }}</b> </p>   
                         </div>
                     </div>
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>   Is Scholarship : <b>{{ $pr->is_scholarship==1?'Yes':'no' }}</b> </p>   
                         </div>
                     </div>
                       <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>   scholarship : <b>{{ $pr->is_scholarship }}</b> </p>   
                         </div>
                     </div>
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>   Co-Curricular : <b>{{ $pr->co_curricular }}</b> </p>   
                         </div>
                     </div> 
                      <div class="form-group">
                         <div class="col-md-12 bd">
                           <p>   Music : <b>{{ $pr->music }}</b> </p>   
                         </div>
                     </div> 

                     </div>
                 <!-- /.box-body -->
                 <!-- /.box-footer -->
             </div>
         </div>

          

          
          

     </div>
   
  
 </div>
    <div class="row">
  
           <div class="col-md-12">
               <h4 align="center"><b>Other</b></h4><hr>
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body">
                           <div class="form-group">
                               <div class="col-md-12 bd"> 
                                   Passport No : <b>{{ $pr->passport_no }} </b>
                               </div> 
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                 
                                   Date of Issued Passport : <b>{{ date('d-m-Y',strtotime($pr->date_of_issued_passport))}}</b>
                               </div>
                           </div>                                                     
                       </div>
                       <!-- /.box-body -->
                       <!-- /.box-footer -->
                   </div>
               </div> 
               <div class="col-lg-6">
                   <div class="form-horizontal">
                       <div class="box-body">
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                   
                                   Passport Issue Place : <b>{{ $pr->passport_issue_place }} </b>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12 bd">
                                   
                                   Passport Expiry date : <b>{{ date('d-m-Y',strtotime($pr->passport_expiry_date))}}</b>
                               </div>
                           </div>      

                       </div>
                    
                   </div>
               
               </div>
               <div class="form-group">
                   <div class="col-md-12 bd timeline-body"> 
                     <div class="col-md-12">
                       Select School Bus : <b>{{ $pr->school_bus }} </b> 
                     </div>
                           
                   </div> 

                 </div>
             </div>
           </div>
  

           
   <div class="row">
     <div class="col-md-12">
       <h4 align="center"><b>Document</b></h4><hr> 
     </div>
     @if ($pr->marksheet!=null)
      <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->marksheet) }}" target="blank" title="">MarkSheet Download</a>
       </div>
       @endif
    
       @if ($pr->leaving_certificate!=null)
          <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->leaving_certificate) }}" target="blank" title="">Leaving Certificate</a>
       </div>
       @endif
    
       @if ($pr->income_certificate!=null)
        <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->income_certificate) }}" target="blank" title="">Income Certificate</a>
       </div>
       @endif
      
       @if ($pr->cortt_certificate!=null)
       <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->cortt_certificate) }}" target="blank" title="">Cortt Certificate</a>
       </div>
       @endif
       
     </div>
      <div class="row" style="padding-top: 20px;">
       @if ($pr->aadhaar_card!=null)
       <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->aadhaar_card) }}" target="blank" title="">Aadhaar Card </a>
       </div>
       @endif
       @if ($pr->birth_certificate!=null)
         <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->birth_certificate) }}" target="blank" title="">Birth Certificate</a>
       </div>
       @endif
     
       @if ($pr->domicile_certificate!=null)
          <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->domicile_certificate) }}" target="blank" title="">Domicile Certificate</a>
       </div>
       @endif
       
       @if ($pr->rashan_card!=null)
          <div class="col-lg-3 text-center"> 
         <a class="btn btn-success" href="{{ url('storage/profile/'.$pr->rashan_card) }}" target="blank" title="">Rashan Card</a>
       </div>
       @endif
       
     </div>
     
 </body>
 </html>
   
       
    
 