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