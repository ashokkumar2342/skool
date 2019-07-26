 	        @if ($checkMenuID==1)
 	        	 
 	       
               <div class="panel panel-default "> 
                    <div class="panel-body" style="margin-right: 20px">
  	                    <div id="bloodgroupcheck" style="margin-top: 20px">
                            <div class="row"> 
                                <div class="form-group col-sm-12" id="phone">
                                    <label for="reg_input">All</label>
                                   <input name="student_details"value="1" type="checkbox" multiselect="true"> 
                               </div> 
                               <div class="form-group col-sm-12" id="phone">
                                    <label for="reg_input">Name</label>
                                   <input name="student_details[]"value="name" type="checkbox" multiselect="true"> 
                               </div> 
                                
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Father Name</label>
                                    <input name="student_details[]" value="father_name" type="checkbox">
                                </div>  
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Mother Name</label>
                                    <input name="student_details[]" value="mother_name" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Mobile</label>
                                    <input name="student_mobile" value="1" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Registration No</label>
                                    <input name="student_regis" value="1" type="checkbox">
                                </div>  
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Admission No</label>
                                    <input name="student_admi" value="1" type="checkbox">
                                </div>  
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Roll No</label>
                                    <input name="student_roll" value="1" type="checkbox">
                                </div>
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Admission Date</label>
                                    <input name="student_Admi_date" value="1" type="checkbox">
                                </div>
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Date Of Birth</label>
                                    <input name="student_dob" value="1" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Email</label>
                                    <input name="student_email" value="1" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">Username</label>
                                    <input name="student_user" value="1" type="checkbox">
                                </div> 
                                <div class="form-group col-sm-12" id="email">
                                    <label for="reg_input">P Address</label>
                                    <input name="student_add" value="1" type="checkbox">
                                </div>  
                            </div>
                        </div>
                   </div>
                </div>
               @endif
               @if ($checkMenuID==2)
                	 
				<div class="panel panel-default "> 
				    <div class="panel-body" style="margin-right: 20px">
				  	    <div id="bloodgroupcheck" style="margin-top: 20px">
				            <div class="row"> 
	                            <div class="form-group col-sm-12" id="phone">
	                                <label for="reg_input">All</label>
	                               <input name="perent_details"value="2" type="checkbox" multiselect="true" \> 
	                           </div>
	                           <div class="form-group col-sm-12" id="phone">
	                                <label for="reg_input">Father Details</label>
	                               <input name="perent_father"value="1" type="checkbox" multiselect="true" \> 
	                           </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">Mother Details</label>
	                                <input name="perent_mother" value="2" type="checkbox">
	                            </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">Grand Father</label>
	                                <input name="perent_grand_father" value="3" type="checkbox">
	                            </div>  
				            </div>
				        </div>
				    </div>
				</div>
               @endif @if ($checkMenuID==3)
                	 
				<div class="panel panel-default "> 
				    <div class="panel-body" style="margin-right: 20px">
				  	    <div id="bloodgroupcheck" style="margin-top: 20px">
				            <div class="row"> 
	                            <div class="form-group col-sm-12" id="phone">
	                                <label for="reg_input">All</label>
	                               <input name="medical_details"value="3" type="checkbox" multiselect="true" \> 
	                           </div>
	                           <div class="form-group col-sm-12" id="phone">
	                                <label for="reg_input">Ondate</label>
	                               <input name="ondate"value="1" type="checkbox" multiselect="true" \> 
	                           </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">Bloodgroup</label>
	                                <input name="bloodgroup_id" value="3" type="checkbox">
	                            </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">HB</label>
	                                <input name="hb" value="3" type="checkbox">
	                            </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">Weight</label>
	                                <input name="weight" value="3" type="checkbox">
	                            </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">Height</label>
	                                <input name="height" value="3" type="checkbox">
	                            </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">BP Upper</label>
	                                <input name="bp_uper" value="3" type="checkbox">
	                            </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">BP Lower</label>
	                                <input name="bp_lower" value="3" type="checkbox">
	                            </div> 
	                            <div class="form-group col-sm-12" id="email">
	                                <label for="reg_input">Physical Handicapped</label>
	                                <input name="physical_handicapped" value="3" type="checkbox">
	                            </div>  
				            </div>
				        </div>
				    </div>
				</div>
               @endif 
