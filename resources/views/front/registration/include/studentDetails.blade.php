<div class="row">
                                    
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
                                                        <div class="col-sm-12">
                                                            <input type="text" name="first_name" class="form-control input-sm" id="txtFName" style="text-transform:uppercase;" autocomplete="off" maxlength="50" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">First Name <b class="fa fa-asterisk"></b> </b>
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="last_name" class="form-control input-sm" id="txtLName" style="text-transform:uppercase;" autocomplete="off" maxlength="50" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Last Name</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="nic_name"  class="form-control input-sm" id="txtMName" style="text-transform:uppercase;" autocomplete="off" maxlength="50" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Nic Name</b>
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field YAcaStart must be a number." id="YAcaStart" name="academic_year" onchange="return fClassBind();" required="required"><option value=""> </option>
                                                            <option value="2018">2018-2019</option>
                                                            </select>
                                                            <b class="floating-lable">Academic Session<b class="fa fa-asterisk"></b></b>
                                                        </div>
                                                    </div>


                                                   

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input id="DateBirth" name="dob" class="form-control input-sm" type="text"  maxlength="10" onchange="javascript:return AgeInWords('DateBirth','lblAgeValue');" required />
                                                            <b class="floating-lable">Date of Birth <b class="fa fa-asterisk"></b></b>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" name="aadhaar_no" id="AdharCard" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12" onkeypress="return Restrict_Pincode(event);" required />
                                                                <b class="floating-lable">Aadhaar No. of Child</b>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <select class="form-control input-sm" data-val="true" data-val-number="The field BloodID must be a number." data-val-required="The BloodID field is required." id="BloodID" name="blood_group" required="required"><option value=""> </option>
                                                                    <option value="1">A+</option>
                                                                    <option value="2">A-</option>
                                                                    <option value="3">AB+</option>
                                                                    <option value="8">AB-</option>
                                                                    <option value="4">B+</option>
                                                                    <option value="5">B-</option>
                                                                    <option value="6">O+</option>
                                                                    <option value="7">O-</option>
                                                                    </select>
                                                                <b class="floating-lable">Select Blood Group <b class="fa fa-asterisk"></b> </b>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-md-offset-7" style="position: absolute; z-index: 999;">
                                                            <label id="lblAgeValue" class="control-label font-size-sm" style="text-align:left;color: #f35726;padding-top: 10px;"> </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field MTID must be a number." id="MTID" name="tongue" required="required"><option value=""> </option>
                                                            <option value="2">BENGALI</option>
                                                            <option value="5">ENGLISH</option>
                                                            <option value="6">FRENCH</option>
                                                            <option value="9">GERMAN</option>
                                                            <option value="1">HINDI</option>
                                                            <option value="3">MALAYALAM</option>
                                                            <option value="4">PUNJABI</option>
                                                            <option value="8">SANSKRIT</option>
                                                            <option value="7">SPANISH</option>
                                                            </select>
                                                            <b class="floating-lable">Select Mother Tongue </b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" name="email" class="form-control input-sm" id="txtAddEmail" maxlength="60" autocomplete="off" required />
                                                            <b class="floating-lable">Email</b>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-horizontal">
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field RelID must be a number." id="RelID" name="Tongue" required="required"><option value=""> </option>
                                                            <option value="8">BUDDHISM</option>
                                                            <option value="4">CHRISTIAN</option>
                                                            <option value="1">HINDU</option>
                                                            <option value="7">JAIN</option>
                                                            <option value="9">JEWISH</option>
                                                            <option value="3">MUSLIM</option>
                                                            <option value="10">PARSI</option>
                                                            <option value="6">PUNJABI</option>
                                                            <option value="2">SIKH</option>
                                                            </select>
                                                            <b class="floating-lable">Select Religion  </b>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control input-sm" id="PhoneNo" autocomplete="off" style="text-transform:uppercase;" maxlength="10" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Mobile No. For SMS Correspondance<b class="fa fa-asterisk"></b></b>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select class="form-control input-sm " data-val="true" data-val-number="The field GenderID must be a number." id="GenderID" name="gender" required="required"><option value=""> </option>
                                                                <option value="2">Female</option>
                                                                <option value="1">Male</option>
                                                                <option value="3">TransGender</option>
                                                                </select>
                                                            <b class="floating-lable">Select Gender <b class="fa fa-asterisk"></b></b>
                                                        </div>
                                                    </div>

                                                 
                                                    <div class="form-group">
                                                        <div class="col-sm-12">

                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field CLID must be a number." id="ClsID" name="class" required="required"><option value=""> </option>
                                                            <option value="9">6</option>
                                                            <option value="11">8</option>
                                                            <option value="13">10</option>
                                                            </select>
                                                            <b class="floating-lable">Select Class <b class="fa fa-asterisk"></b></b>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field SocialCategoryID must be a number." id="SocialCategoryID" name="category" required="required"><option value=""> </option>
                                                            <option value="1">GENERAL</option>
                                                            <option value="2">RTE</option>
                                                            </select>
                                                            <b class="floating-lable">Select Category</b>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" id="StaffWard" name="staff_ward" required="required"><option value=""></option>
                                                            <option value="Y">YES</option>
                                                            <option value="N">NO</option>
                                                            </select>
                                                            <b class="floating-lable">Staff Ward</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field LocalityID must be a number." data-val-required="The LocalityID field is required." id="LocalityID" name="locality" required="required"><option value=""> </option>
                                                            <option value="13">0 - 2 Km</option>
                                                            <option value="16">15 Km above</option>
                                                            <option value="14">Between  5 Km - 10 Km</option>
                                                            <option value="15">Between 10 Km -15 KM</option>
                                                            <option value="12">Between 2 Km - 5 Km</option>
                                                             
                                                            </select>
                                                            <b class="floating-lable">Locality <b class="fa fa-asterisk"></b></b>
                                                        </div>
                                                    </div>

                                                    <input type="button" id="btnSave" value="Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" onclick="return fPostData();" />


                                                    <div class="form-group" style="display:none;">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="MobileNo" style="text-transform:uppercase;" autocomplete="off" maxlength="10" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Mobile No.</b>

                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="display:none;">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control input-sm" id="txtdobInWords" style="text-transform:uppercase;" tabindex="6" autocomplete="off" maxlength="50" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Date of birth in words</b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- /.box-footer -->
                                            </div>
                                        </div>
                                    </div>

                                </div>