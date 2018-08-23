 
<form class="form-horizontal" role="form" id="SROnline" ondrop="return false;">

<div class="content-wrappera">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="border-bottom: 2px solid #019366">
        {{-- <h1>
            Registration For Admission <a href="" class="tooltip1" id="openthankspop" style="color: #fb8826; display: none" onclick="return openthankpop()">
                <i class="icon icon-bell"></i>
                <span class="tooltiptext">Click here to know status</span>
            </a>
        </h1> --}}
      {{--   <ol class="breadcrumb">
            <li><a style="color: #f73b07" href="/Registration/OnlineRegGuidelines?RegType=2"><i class="fa fa-arrow-left"></i> Guidelines for Online Registration</a></li>
        </ol> --}}
    </section>
    <label id="lblStatus" style="color:blue;font-size:14px; align-self:flex-end"></label>
    <div class="pull-right" style="display:none;">
        {{-- <a id="alogout" href="/Logon/Logon">X</a> --}}
    </div>
    <section class="content">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label Reg-blue-Line">
                        <span class="bg-blue">
                            Student Details
                        </span>
                    </li>
                    <li>
                        <i class="fa icon icon-user-male bg-blue"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
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
                                                            <input type="text" name="first_name"  class="form-control input-sm" id="txtFName" style="text-transform:uppercase;" autocomplete="off" maxlength="50"  required />
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
                            </div>

                        </div>
                    </li>

                    <li class="time-label Reg-Orange-Line PrevSchool  ">
                        <span class="bg-purple">
                            Previous School Details
                        </span>
                    </li>

                    <li>
                        <i class="fa icon icon-ios-location bg-purple  PrevSchool" style="font-size: 25px; line-height: 37px"></i>
                        <div class="timeline-item  PrevSchool">
                            <div class="timeline-body">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-lg-12">
                                            <div class="form-horizontal">
                                                <div class="box-body">


                                                    <div class="form-group">
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-sm" id="LastSchools" style="text-transform:uppercase;" autocomplete="off" maxlength="50" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Last School</b>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control input-sm" id="LeavingDate" style="text-transform:uppercase;" autocomplete="off" maxlength="6"  required />
                                                            <b class="floating-lable">Leaving Date</b>
                                                        </div>


                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="ReasonChangeSchool" style="text-transform:uppercase;" autocomplete="off" maxlength="200" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Reason Change School</b>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- /.box-body -->
                                                <!-- /.box-footer -->
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>



                    <li class="time-label Reg-aqua-Line">
                        <span class="bg-aqua">
                            Address Details
                        </span>
                    </li>

                    <li>
                        <i class="fa icon icon-ios-location bg-aqua" style="font-size: 25px; line-height: 37px"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-lg-5">
                                            <div class="form-horizontal">
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <textarea rows="2" cols="53" id="PresFlatNos" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required></textarea>
                                                            <small class="floating-lable">Residential Address<small class="fa fa-asterisk"></small></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="PresPinCodes" style="text-transform:uppercase;" autocomplete="off" maxlength="6" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Pin code</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="PresTelephoneNos" style="text-transform:uppercase;" autocomplete="off" maxlength="12" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Phone No. </b>
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
                                                        <div class="col-md-12">
                                                            <textarea rows="2" cols="53" id="PemFlatNos" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required></textarea>
                                                            <small class="floating-lable">Permanent Address<small class="fa fa-asterisk"></small></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="PemPinCodes" style="text-transform:uppercase;" autocomplete="off" maxlength="6" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Pin code</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="PemTelephoneNos" style="text-transform:uppercase;" autocomplete="off" maxlength="12" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Phone No. </b>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- /.box-body -->
                                                <!-- /.box-footer -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>




                    <li class="time-label Reg-green-Line">
                        <span class="bg-green">
                            Father's Details
                        </span>
                    </li>

                    <li>
                        <i class="fa icon icon-torsos bg-green"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center b-r reg-fath-detail" style="font-size: 25px; line-height: 34px">
                                        <div class="useimg">
                                             
                                            <img src="" id="ImgFather" alt="" style="height:100px; width:100px;cursor:pointer;border: 3px solid #e6e5e5;" class="img-circle" onerror="return fRemove();" onclick="ImgUpload('fuFather');" />
                                            <a class="remove-F-img tooltip3" id="lnkFRemove" onclick="return fRemove('ImgFather','lnkFRemove','lnkFAdd')">
                                                <i class="glyphicon glyphicon-remove-sign"></i>
                                                <span class="tooltiptext">Remove Photo</span>
                                            </a>
                                            <a class="add-F-img tooltip3" id="lnkFAdd" onclick="ImgUpload('fuFather');">
                                                <i class="icon icon-ios-compose"> </i>
                                                <span class="tooltiptext">Add Photo</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

                                        <div class="col-lg-6 b-r">
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-3" style="padding: 0px 3px 0px 0px">
                                                                <select class="form-control input-sm" data-val="true" data-val-number="The field FTitleID must be a number." id="FTitleID" name="FTitleID" required="required"><option value=""> </option>
                                                                <option value="6">CAPT.</option>
                                                                <option value="5">COL.</option>
                                                                <option value="3">DR.</option>
                                                                <option value="7">FR</option>
                                                                <option value="4">LATE</option>
                                                                <option value="1">MR.</option>
                                                                </select>
                                                                <b class="floating-lable">Title </b>
                                                            </div>

                                                            <div class="col-md-9" style="padding: 0px">
                                                                <input type="text" class="form-control input-sm" id="Father" style="text-transform:uppercase;" maxlength="40" onkeypress="return Restrict_Name(event);" required />
                                                                <b class="floating-lable">Father's Name <b id="lblFather" class="fa fa-asterisk"></b></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" id="FQalifID" name="FQalifID" required="required"><option value=""> </option>
                                                            <option value="15">B.COM</option>
                                                            <option value="16">B.COM(HONS)</option>
                                                            <option value="7">B.ED</option>
                                                            <option value="13">B.SC</option>
                                                            <option value="2">B.TECH/B.E</option>
                                                            <option value="5">BA</option>
                                                            <option value="6">BA.LLB</option>
                                                            <option value="1">M A</option>
                                                            <option value="11">M.ED</option>
                                                            <option value="8">M.PHIL</option>
                                                            <option value="14">M.SC</option>
                                                            <option value="10">M.TECH/M.E</option>
                                                            <option value="12">MA.LLB</option>
                                                            <option value="3">MBA</option>
                                                            <option value="4">MBBS</option>
                                                            <option value="9">OTHERS</option>
                                                            </select>
                                                            <b class="floating-lable">Select Qualification  </b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field FPOccuID must be a number." id="FPOccuID" name="FPOccuID" required="required"><option value=""> </option>
                                                                <option value="8">BUSINESS</option>
                                                                <option value="5">DOCTOR</option>
                                                                <option value="3">ENGINEER</option>
                                                                <option value="7">LAWYER</option>
                                                                <option value="6">NURSE</option>
                                                                <option value="4">OTHERS</option>
                                                                <option value="2">STAFF</option>
                                                                <option value="1">TEACHER</option>
                                                                </select>
                                                            <b class="floating-lable">Select Occupation  </b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field FPDesigID must be a number." id="FPDesigID" name="FPDesigID" required="required"><option value=""> </option>
                                                            <option value="1">MANAGER</option>
                                                            <option value="2">OTHERS</option>
                                                            </select>
                                                            <b class="floating-lable">Select Designation  </b>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="FCollegeUniversity" class="form-control input-sm" style="text-transform:uppercase;" maxlength="150" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">College/University</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="FTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12" onkeypress="return Restrict_Pincode(event);" tabindex="0" required />
                                                            <b class="floating-lable">Residence Telephone No</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="FOfficeTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12" onkeypress="return Restrict_Pincode(event);" tabindex="0" required />
                                                            <b class="floating-lable">Office Telephone No</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="display:none;">
                                                        <div class="col-md-12">
                                                            <input type="text" id="FIncome" class="form-control input-sm" style="text-transform:uppercase;" maxlength="16" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Annual Income</b>
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
                                                            <input type="text" id="FOrgName" class="form-control input-sm" style="text-transform:uppercase;" maxlength="120" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Organization</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <textarea rows="2" cols="53" id="FOrgAddress" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required></textarea>
                                                            <small class="floating-lable">Organization Address <b class="fa fa-asterisk"></b><small></small></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="FPincode" style="text-transform:uppercase;" autocomplete="off" maxlength="6" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Pin code</b>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="FEmail" class="form-control input-sm" maxlength="60" required />

                                                            <b class="floating-lable">Email Id  <b class="fa fa-asterisk"></b></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="FMobileNo" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="10" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Mobile No. <b id="lblFMobile" class="fa fa-asterisk"></b></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="Fax" style="text-transform:uppercase;" autocomplete="off" maxlength="60" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Fax</b>
                                                        </div>
                                                    </div>
                                                    

                                                    <!-- /.box-body -->
                                                    <!-- /.box-footer -->
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </li>

                    <li class="time-label Reg-Orange-Line">
                        <span class="bg-orange">
                            Mother's Details
                        </span>
                    </li>

                    <li>
                        <i class="fa icon icon-torsos-female-male bg-orange" style="font-size: 25px; line-height: 34px"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center b-r reg-Moth-detail">

                                        <div class="useimg">

                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

                                        <div class="col-lg-6 b-r">
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-3" style="padding: 0px 3px 0px 0px">
                                                                <select class="form-control input-sm" id="MTitleID" name="MTitle" required="required"><option value=""> </option>
                                                                <option value="2">MRS.</option>
                                                                <option value="8">MS</option>
                                                                <option value="9">SR</option>
                                                                </select>
                                                                <b class="floating-lable">Title </b>
                                                            </div>
                                                            <div class="col-md-9" style="padding: 0px">
                                                                <input type="text" class="form-control input-sm" style="text-transform:uppercase;" id="Mother" maxlength="40" onkeypress="return Restrict_Name(event);" required />
                                                                <b class="floating-lable">Mother's Name<b class="fa fa-asterisk"></b>  </b>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" id="MQalifID" name="MQalifID" required="required" tabindex="0"><option value=""> </option>
                                                            <option value="15">B.COM</option>
                                                            <option value="16">B.COM(HONS)</option>
                                                            <option value="7">B.ED</option>
                                                            <option value="13">B.SC</option>
                                                            <option value="2">B.TECH/B.E</option>
                                                            <option value="5">BA</option>
                                                            <option value="6">BA.LLB</option>
                                                            <option value="1">M A</option>
                                                            <option value="11">M.ED</option>
                                                            <option value="8">M.PHIL</option>
                                                            <option value="14">M.SC</option>
                                                            <option value="10">M.TECH/M.E</option>
                                                            <option value="12">MA.LLB</option>
                                                            <option value="3">MBA</option>
                                                            <option value="4">MBBS</option>
                                                            <option value="9">OTHERS</option>
                                                            </select>
                                                            <b class="floating-lable">Select Qualification  </b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field MPOccuID must be a number." id="MPOccuID" name="MPOccuID" required="required" tabindex="0"><option value=""> </option>
                                                            <option value="8">BUSINESS</option>
                                                            <option value="5">DOCTOR</option>
                                                            <option value="3">ENGINEER</option>
                                                            <option value="7">LAWYER</option>
                                                            <option value="6">NURSE</option>
                                                            <option value="4">OTHERS</option>
                                                            <option value="2">STAFF</option>
                                                            <option value="1">TEACHER</option>
                                                            </select>
                                                            <b class="floating-lable">Select Occupation </b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field MPDesigID must be a number." id="MPDesigID" name="MPDesigID" required="required" tabindex="0"><option value=""> </option>
                                                            <option value="1">MANAGER</option>
                                                            <option value="2">OTHERS</option>
                                                            </select>
                                                            <b class="floating-lable">Select Designation </b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="MCollegeUniversity" class="form-control input-sm" style="text-transform:uppercase;" maxlength="150" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">College/University</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="MTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12" onkeypress="return Restrict_Pincode(event);" tabindex="0" required />
                                                            <b class="floating-lable">Residence Telephone No</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="MOfficeTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12" onkeypress="return Restrict_Pincode(event);" tabindex="0" required />
                                                            <b class="floating-lable">Office Telephone No</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="display:none;">
                                                        <div class="col-md-12">
                                                            <input type="text" id="MIncome" class="form-control input-sm" style="text-transform:uppercase;" maxlength="16" onkeypress="return Restrict_Pincode(event);" tabindex="0" required />
                                                            <b class="floating-lable">Annual Income</b>

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
                                                        <div class="col-md-12">
                                                            <input type="text" id="MOrgName" class="form-control input-sm" style="text-transform:uppercase;" maxlength="120" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Organization </b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <textarea rows="2" cols="53" id="MOrgAddress" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required></textarea>
                                                            <small class="floating-lable">Organization Address<b class="fa fa-asterisk"></b><small></small></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="MPincode" style="text-transform:uppercase;" autocomplete="off" maxlength="6" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Pin code</b>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="form-group" style="display:none">
                                                        <div class="col-md-12">
                                                            <input type="text" id="MTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="60" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Phone No</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="MEmail" class="form-control input-sm" maxlength="60" required />
                                                            <b class="floating-lable">Email Id <b class="fa fa-asterisk"></b></b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="MMobileNo" class="form-control input-sm" style="text-transform:uppercase;" maxlength="10" onkeypress="return Restrict_Pincode(event);" tabindex="0" required />
                                                            <b class="floating-lable">Mobile No <b class="fa fa-asterisk"></b></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="MFax" style="text-transform:uppercase;" autocomplete="off" maxlength="60" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Fax</b>
                                                        </div>
                                                    </div>

                                                    

                                                </div>
                                                <!-- /.box-body -->
                                                <!-- /.box-footer -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="time-label Reg-blue-Line">
                        <span class="bg-blue">
                            General Details
                        </span>
                    </li>
                    <li>
                        <i class="fa icon icon-torsos-female-male bg-blue" style="font-size: 25px; line-height: 34px"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-lg-6 b-r">
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" style="text-transform:uppercase;" id="GuardianNames" maxlength="40" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Name of the Local Guardian (If any) </b>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="GuardianMobileNo" style="text-transform:uppercase;" autocomplete="off" maxlength="10" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Mobile No</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field NalID must be a number." id="NalID" name="NalID" required="required"><option value=""> </option>
                                                            <option value="14">AFGHANISTANI</option>
                                                            <option value="2">AMERICAN</option>
                                                            <option value="7">AUSTRALIAN</option>
                                                            <option value="9">BRITISH</option>
                                                            <option value="5">CANADIAN</option>
                                                            <option value="18">HUNGARIAN</option>
                                                            <option value="1">INDIAN</option>
                                                            <option value="8">INDONESIAN</option>
                                                            <option value="19">JAPANESE</option>
                                                            <option value="3">KOREAN</option>
                                                            <option value="6">MALAYSIAN</option>
                                                            <option value="4">MEXICAN</option>
                                                            <option value="20">OVERSEAS CITIZEN OF INDIA</option>
                                                            <option value="15">PERUVIAN</option>
                                                            <option value="13">RUSSIAN</option>
                                                            <option value="12">SOUTH AFRICAN</option>
                                                            <option value="11">SPANISH</option>
                                                            <option value="10">TURKISH</option>
                                                            <option value="16">UKRAINIAN</option>
                                                            <option value="17">VENEZUELAN</option>
                                                            </select>
                                                            <b class="floating-lable">Select Nationality</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" id="EmergencyphoneNo" style="text-transform:uppercase;" autocomplete="off" maxlength="10" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Person to Contact in case of Emergency,phone No. </b>
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
                                                        <div class="col-md-12">
                                                            <textarea rows="2" cols="53" id="GuardAddr" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required></textarea>
                                                            <small class="floating-lable">Address</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" id="AdharCard" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12" onkeypress="return Restrict_Pincode(event);" required />
                                                            <b class="floating-lable">Aadhaar No. of Child</b>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select class="form-control input-sm" data-val="true" data-val-number="The field BloodID must be a number." data-val-required="The BloodID field is required." id="BloodID" name="BloodID" required="required"><option value=""> </option>
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa icon icon-contact-add-2 bg-aqua" style="font-size: 25px; line-height: 34px"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <label class="control-label" style="font-size: 17px; color: #00c0ef; "> Any Sibling in This School ?(Real brother/sister)</label>&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="N" name="SameSibling" id="SiblingYes" onclick="return GetSiblingData();" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="N" name="SameSibling" checked="checked" id="SiblingNo" onclick="return GetSiblingData();" /> No
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="tdSibling">
                                        <div class="col-md-12">
                                            <span style="border-bottom: 2px solid #00c0ef; font-size: 15px; color:  #00c0ef"><span style="font-weight: 700"> Note:- </span>  Please Enter Adm. No. & Press Enter </span>
                                        </div>
                                        <div class="col-lg-3 b-r">
                                            <div class="form-horizontal">
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="AdmNo" class="form-control input-sm" type="text" autocomplete="off" maxlength="10" onkeypress="return GetSibAdno('AdmNo',event);" />
                                                            <b class="floating-lable">Adm. No.</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="AdmNo1" class="form-control input-sm" type="text" autocomplete="off" maxlength="10"
                                                                   onkeypress="return GetSibAdno('AdmNo1',event);" required />
                                                            <b class="floating-lable">Adm. No.</b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 b-r" id="tdSibling1">
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">

                                                            <input id="txtSiblingName" placeholder="Name" disabled="disabled" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="50" required />
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="txtSiblingName1" placeholder="Name" disabled="disabled" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="50" required />
                                                            
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
                                                            <input id="idClassSection" placeholder="Class & Section" disabled="disabled" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="30" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="idClassSection1" placeholder="Class & Section" disabled="disabled" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="30" required />
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- /.box-footer -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                    <li>
                        <i class="fa icon icon-contact-add-2 bg-orange" style="font-size: 25px; line-height: 34px"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <label class="control-label" style="font-size: 17px; color: #fb8826; "> Any Sibling in Other School ?(Real brother/sister)</label>&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="N" name="SameSibling1" id="SiblingYes1" onclick="return GetSiblingData1();" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" value="N" name="SameSibling1" id="SiblingNo1" checked ="checked" onclick="return GetSiblingData1();" /> No
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="tdSibling3">

                                        <div class="col-lg-6 b-r">
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="AdmNo2" class="form-control input-sm" type="text" autocomplete="off" maxlength="10" />
                                                            <b class="floating-lable">Adm. No.</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">

                                                            <input id="txtSiblingName2" placeholder="Name" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="50" required />
                                                            
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="idClassSection2" placeholder="Class & Section" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="30" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="idSchoolName2" placeholder="School Name" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="200" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="idAge2" placeholder="Age" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="2" onkeypress="return Restrict_Pincode(event);" required />
                                                            
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
                                                        <div class="col-md-12">
                                                            <input id="AdmNo3" class="form-control input-sm" type="text" autocomplete="off" maxlength="10" />
                                                            <b class="floating-lable">Adm. No.</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="txtSiblingName3" placeholder="Name" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="50" required />
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="idClassSection3" placeholder="Class & Section" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="30" required />
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="idSchoolName3" placeholder="School Name" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="200" required />
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="idAge3" placeholder="Age" class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="2" onkeypress="return Restrict_Pincode(event);" required />
                                                            
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="time-label Reg-aqua-Line">
                        <span class="bg-aqua">
                            Career Considered
                        </span>
                    </li>
                    <li>
                        <i class="fa icon icon-torsos-female-male bg-aqua" style="font-size: 25px; line-height: 34px"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-md-6 col-lg-6 b-r">
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label col-lg-4" style="font-size: 14px; "> Sports</label>
                                                            <div class="col-lg-8">
                                                                <input type="radio" value="Good" name="SameSibling1" id="Good" /> Good &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" value="Average" name="SameSibling1" id="Average" /> Average&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" value="Indifferent" name="SameSibling1" id="Indifferent" /> Indifferent
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label col-lg-4" style="font-size: 14px; "> Medical History</label>

                                                            <div class="col-lg-8">
                                                                <input type="radio" value="Y" name="MedicalHistory" id="MedicalHistoryYes" onclick="return GetMedicalHistoryData();" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" value="N" name="MedicalHistory" id="MedicalHistoryNo" checked="checked" onclick="return GetMedicalHistoryData();" /> No
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12" id="tdMedicalHistory">
                                                            <textarea rows="2" cols="53" id="MedicalHistory" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required></textarea>
                                                            <small class="floating-lable">If Yes, please Specify</small>
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">


                                                                <label class="control-label col-lg-4" style="font-size: 14px; ">Evidence of Any Learning Disability</label>&nbsp;&nbsp;&nbsp;
                                                              
                                                                <div class="col-lg-8">
                                                                    <input type="radio" value="Y" name="EvidenceLearning" id="EvidenceLearningDisabilityYes" onclick="return EvidenceLearningDisability();" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" value="N" name="EvidenceLearning" id="EvidenceLearningDisabilityNo" checked="checked" onclick="return EvidenceLearningDisability();" /> No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                                </div>
                                                                   </div>
                                                        </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12" id="tdEvidenceLearningDisability">
                                                            <textarea rows="2" cols="53" id="idEvidenceLearningDisability" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required></textarea>
                                                            <small class="floating-lable">If Yes, please Specify</small>
                                                        </div>
                                                    </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label col-lg-4" style="font-size: 14px; "> Would You Like To Apply For Scholarship</label>&nbsp;&nbsp;&nbsp;
                                                              
                                                                <div class="col-lg-8">
                                                                    <input type="radio" value="Y" name="Scholarship" id="ApplyScholarshipYes" onclick="return  ApplyScholarship();" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" value="N" name="Scholarship" id="ApplyScholarshipNo" checked="checked" onclick="return ApplyScholarship();" /> No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                                </div>
                                                            
                                                        </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12" id="tdApplyScholarship">
                                                            <label class="control-label" style="font-size: 12px; "> If Yes, Please Select The One</label>&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" value="Academic" name="SameAcademic" id="idAcademic" /> Academic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" value="Sports" name="SameAcademic" id="idSports" /> Sports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" value="Activity" name="SameAcademic" id="idActivity" /> Activity
                                                        </div>
                                                    </div>

                                                    </div>
                                                <!-- /.box-body -->
                                                <!-- /.box-footer -->
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-lg-3 b-r">
                                           <div class="form-horizontal">
                                               <div id="gvCoCurCular"> 
                                                    <label class="control-label col-lg-4" style="text-align:center;">Co-Curricular</label>
                                                    <div class="col-lg-8">

                                                    <div id="divCoCulr" style="height:120px; width:140px; padding: 10px; overflow-x:hidden; border: 1px solid #ddd;" oncontextmenu="return fSelectDeSelectMenu(event, 'chkSCoCulr');">
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkCoCulr" name="chkCoCulr" class="chkSCoCulr" id="1">SPORTS
                                                                    </label>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkCoCulr" name="chkCoCulr" class="chkSCoCulr" id="2">DEBATE
                                                                    </label>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkCoCulr" name="chkCoCulr" class="chkSCoCulr" id="3">MUSIC
                                                                    </label>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkCoCulr" name="chkCoCulr" class="chkSCoCulr" id="4">ELOCUTION
                                                                    </label>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkCoCulr" name="chkCoCulr" class="chkSCoCulr" id="5">ACTING
                                                                    </label>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkCoCulr" name="chkCoCulr" class="chkSCoCulr" id="6">FINE ART
                                                                    </label>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkCoCulr" name="chkCoCulr" class="chkSCoCulr" id="7">OTHERS
                                                                    </label>
                                                                </div>
                                                               
                                                            </div>

                                                        <input type="hidden" id="hidCoCulr">
                                                    </div>


                                                    </div>



                                               </div>
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-lg-3">
                                            <div class="form-horizontal">
                                                <div id="gvInstrument">
                                                    
                                                    <label class="control-label col-lg-4" style="text-align:center;">Music</label>
                                                    <div class="col-lg-8">

                                                    <div id="divInstrument" style="height:120px; width:140px; padding: 10px; overflow-x:hidden; border: 1px solid #ddd;" oncontextmenu="return fSelectDeSelectMenu(event, 'chkSInstrument');">
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="1">GUITAR
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="2">PIANO
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="3">VIOLIN
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="4">HARMONIUM
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="5">DRUMS
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="6">FLUTE
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="7">KEYBOARD
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="chkInstrument" name="chkInstrument" class="chkSInstrument" id="8">OTHERS
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        <input type="hidden" id="hiddivInstrument">
                                                    </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="time-label Reg-blue-Line">
                        <span class="bg-blue">
                            Other Details
                        </span>
                    </li>
                    <li>
                        <i class="fa icon icon-torsos-female-male bg-blue" style="font-size: 25px; line-height: 34px"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-lg-6 b-r">
                                            <div class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" style="text-transform:uppercase;" id="PassportNo" maxlength="50" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Passport No </b>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="DateofIssuedPassport" class="form-control input-sm" type="text" value="Date of Issued Passport" maxlength="10"  required />
                                                            <b class="floating-lable">Date of Issued Passport</b>
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
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control input-sm" style="text-transform:uppercase;" id="PassportIssuePlace" maxlength="40" onkeypress="return Restrict_Name(event);" required />
                                                            <b class="floating-lable">Passport Issue Place </b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="PassportExpirydate" class="form-control input-sm" type="text" value="Passport Expiry date" maxlength="10" required />
                                                            <b class="floating-lable">Passport Expiry date</b>
                                                        </div>
                                                    </div>      

                                                </div>
                                             
                                            </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 timeline-body">
                                                <label class="col-md-12">Would you like to avail of the school transport?if yes mention the Route and the preferred bus preferred bus stop as per route/stops indicated in the information sheet.</label>
                                                
                                                
                                                <div class="col-md-5">
                                                    <select class="form-control input-sm" id="SchoolBus" name="SchoolBus" required="required"><option value=""></option>
                                                        <option value="Y">YES</option>
                                                        <option selected="selected" value="N">NO</option>
                                                        </select>
                                                    <b class="floating-lable">Select School Bus </b>

                                                </div>
                                                
                                                <div class="col-md-2 text-center">
                                                    <a href="#" style="font-size: 16px;line-height:33px;color:#0073b7;" onclick="return openLocpop();">Select Bus Route</a>
                                                </div>

                                                <div class="col-md-5">

                                                    

                                                    <input type="hidden"  id="hidTransportRoute" />

                                                    <input type="text" class="form-control input-sm"  id="TransportRouteName" maxlength="50" required />
                                                    <b class="floating-lable">Transport Route </b>

                                                   
                                                </div>


                                                <div id="Regpopup1" style="display:none; margin-top:63px; ">
                                                    <div id="Regclose1" onclick="return fCloseMessageDiv1()">X</div>


                                                    <div class="panel-body" style="overflow-x:hidden; height: 400px;">
                                                        <div id="gvLocalityData" style="width:95%;" align="center">
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                    </li>
                    <li class="time-label Reg-red-Line">
                        <span class="bg-red">
                            Declaration
                        </span>
                    </li>

                    <li>
                        <i class="fa fa-chevron-circle-right bg-red"></i>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <ol>
                                    <li>
                                        <p>
                                            I / We hereby certify that the above information provided by me / us is correct.
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            I / We understand that if the information is found to be incorrect or false, my ward will be automatically debarred from the selection /
                                            admission process without any correspondence in this regard.
                                        </p>
                                    </li>
                                    <li>
                                        <p>I / We also understand that the application / registration / wait listing does not guarantee admission to my ward.</p>
                                    </li>
                                    <li>
                                        <p>I / We accept the process of admission undertaken by the school and I / We will abide the decision taken by the school authorities.</p>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-item">
                            <div class="timeline-body">
                                <div class="form-group" id="capture">
                                    <div class="col-md-10 col-md-offset-1 text-center">
                                        <label style="text-align:left;color:#f32b07;font-size:14px">
                                            <input type="checkbox" value="chkAgree" style="color:orangered" tabindex="0" id="chkAgree" class="chk disableCL"> I Agree
                                        </label>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1 text-center" style="margin-top: 10px; margin-bottom: 10px;">
                                        <div class="pop_textbox ">
                                            <label id="dvCaptcha" class="captcha" style="width: 115px; color:darkorange">
                                                GU2DX9

                                            </label>
                                            <i class="fa fa-refresh" id="idRefresh" alt="" onclick="return fCaptchaValue(event,'R'); " style="cursor:pointer; color: #078f7e; font-size: 16px"></i>
                                        </div>
                                        <style type="text/css">
                                            .captcha {
                                                font-size: 25px;
                                                font-stretch: extra-expanded;
                                                font-family: cursive,serif;
                                            }
                                        </style>
                                    </div>

                                    <div class="col-md-4 col-md-offset-4 text-center control-label font-size-sm" style="height:40px; ">

                                        <input type="text" class="form-control input-sm" id="txtCaptcha" maxlength="60" required />
                                        <b class="floating-lable">Enter Captcha Code</b>
                                    </div>
                                    <div class="form-group" id="spCaptcha" style="display:none;">
                                        <label for="PopUpForm" class="col-md-2 text-center control-label"></label>
                                        <div class="col-md-10">
                                            <span id="sp-errorCaptcha" class="text-danger field-validation-error" data-valmsg-replace="true">
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1 text-center" style="margin-bottom:30px;">
                                        <input type="button" id="btnSave" value="Final Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" onclick="return fPostData();" />
                                        <input type="submit" id="btnPrint" value="Print Form" class="btn btn-primary btn-size-md" style="width:85px" onclick="return fGetPrintform();" />
                                        <input type="submit" id="btnAck" value="Ack Receipt" class="btn btn-primary btn-size-md" style="width:95px" onclick="return fGetAckReciptCRYSTAL();" />
                                        

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>




<input type="hidden" id="hidRouteID">
<input type="hidden" id="hidStudID">
<input type="hidden" id="hidStatus">
<input type="hidden" id="hidParentID">
<input type="hidden" id="hidApplicationid">


</form>
