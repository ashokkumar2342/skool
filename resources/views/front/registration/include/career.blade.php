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