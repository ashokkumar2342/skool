 <div class="row">
<form action="{{ route('career') }}" method="post" no-reset="true" class="add_form" accept-charset="utf-8"  novalidate>
{{ csrf_field() }}
    <div class="col-md-12">

        <div class="col-md-6 col-lg-6 b-r">
            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label col-lg-4" style="font-size: 14px; "> Sports</label>
                            <div class="col-lg-8">
                                <input type="radio" {{ $pr->sport ==='Good'?'checked':'' }} value="Good" name="sport" id="Good" /> Good &nbsp;&nbsp;&nbsp;
                                <input type="radio" value="Average" {{ $pr->sport ==='Average'?'checked':'' }} name="sport" id="Average" /> Average&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" value="Indifferent" {{ $pr->sport ==='Indifferent'?'checked':'' }} name="sport" id="Indifferent" /> Indifferent
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label col-lg-4" style="font-size: 14px; "> Medical History</label>

                            <div class="col-lg-8">
                                <input type="radio"  {{ $pr->is_medical ==='Y'?'checked':'' }} value="Y"  name="is_medical" id="MedicalHistoryYes" /> Yes
                                <input type="radio" {{ $pr->is_medical ==='N'?'checked':'' }} value="N" name="is_medical" id="MedicalHistoryNo"  /> No
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12" id="tdMedicalHistory">
                            <textarea rows="2" cols="53" name="medical_history" id="MedicalHistory" class="form-control input-sm"  style="text-transform:uppercase;" autocomplete="off" maxlength="120" >{{ $pr->medical_history }}</textarea>
                            <small class="floating-lable">If Yes, please Specify</small>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12"> 
                                <label class="control-label col-lg-4" style="font-size: 14px; ">Evidence of Any Learning Disability</label>&nbsp;&nbsp;&nbsp;
                              
                                <div class="col-lg-8">
                                    <input type="radio" value="Y" {{ $pr->is_evidence_learning ==='Y'?'checked':'' }} name="is_evidence_learning" id="EvidenceLearningDisabilityYes"   /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="N" {{ $pr->is_evidence_learning ==='N'?'checked':'' }} name="is_evidence_learning" id="EvidenceLearningDisabilityNo" checked="checked" /> No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                </div>
                                   </div>
                        </div>

                    <div class="form-group">
                        <div class="col-md-12" name="evidence_learning_disability">
                            <textarea rows="2" cols="53" id="idEvidenceLearningDisability" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required>{{ $pr->evidence_learning_disability }}</textarea>
                            <small class="floating-lable">If Yes, please Specify</small>
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label col-lg-4" style="font-size: 14px; "> Would You Like To Apply For Scholarship</label>&nbsp;&nbsp;&nbsp;
                              
                                <div class="col-lg-8">
                                    <input type="radio" value="1" {{ $pr->is_scholarship ===1?'checked':'' }} name="is_scholarship" id="ApplyScholarshipYes"   /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="2" {{ $pr->is_scholarship ==2?'checked':'' }}   name="is_scholarship" id="ApplyScholarshipNo" checked="checked" /> No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                </div>
                            
                        </div>

                    <div class="form-group">
                        <div class="col-md-12" id="tdApplyScholarship">
                            <label class="control-label" style="font-size: 12px; "> If Yes, Please Select The One</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" value="Academic" {{ $pr->is_scholarship ==='Academic'?'checked':'' }} name="scholarship" id="idAcademic" /> Academic &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" value="Sports"  {{ $pr->is_scholarship ==='Sports'?'checked':'' }} name="scholarship" id="idSports" /> Sports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" value="Activity"  {{ $pr->is_scholarship ==='Activity'?'checked':'' }} name="scholarship" id="idActivity" /> Activity
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

                    <div id="divCoCulr" >
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="SPORTS" {{ in_array("SPORTS",explode(',',$pr->co_curricular))==true?'checked':'' }}  name="co_curricular[]" class="chkSCoCulr" id="1">SPORTS
                                    </label>
                                </div>
                               
                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="DEBATE"  {{ in_array("DEBATE",explode(',',$pr->co_curricular))==true?'checked':'' }} name="co_curricular[]" class="chkSCoCulr" id="2">DEBATE
                                    </label>
                                </div>
                               
                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ in_array("MUSIC",explode(',',$pr->co_curricular))==true?'checked':'' }}   value="MUSIC" name="co_curricular[]" class="chkSCoCulr" id="3">MUSIC
                                    </label>
                                </div>
                               
                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox"  {{ in_array("ELOCUTION",explode(',',$pr->co_curricular))==true?'checked':'' }}  value="ELOCUTION" name="co_curricular[]" class="chkSCoCulr" id="4">ELOCUTION
                                    </label>
                                </div>
                               
                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ in_array("ACTING",explode(',',$pr->co_curricular))==true?'checked':'' }}   value="ACTING" name="co_curricular[]" class="chkSCoCulr" id="5">ACTING
                                    </label>
                                </div>
                               
                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ in_array("FINE ART",explode(',',$pr->co_curricular))==true?'checked':'' }}   value="FINE ART" name="co_curricular[]" class="chkSCoCulr" id="6">FINE ART
                                    </label>
                                </div>
                               
                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ in_array("OTHERS",explode(',',$pr->co_curricular))==true?'checked':'' }}   value="OTHERS" name="co_curricular[]" class="chkSCoCulr" id="7">OTHERS
                                    </label>
                                </div>
                               
                            </div>

                      
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

                    <div id="divInstrument">
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ in_array("GUITAR",explode(',',$pr->music))==true?'checked':'' }}   value="GUITAR" name="music[]" class="chkSInstrument" id="1">GUITAR
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ in_array("PIANO",explode(',',$pr->music))==true?'checked':'' }}  value="PIANO" name="music[]" class="chkSInstrument" id="2">PIANO
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ in_array("VIOLIN",explode(',',$pr->music))==true?'checked':'' }} value="VIOLIN" name="music[]" class="chkSInstrument" id="3">VIOLIN
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ $pr->music ==='HARMONIUM'?'checked':'' }} value="HARMONIUM" name="music[]" class="chkSInstrument" id="4">HARMONIUM
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ $pr->music ==='DRUMS'?'checked':'' }} value="DRUMS" name="music[]" class="chkSInstrument" id="5">DRUMS
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ $pr->music ==='FLUTE'?'checked':'' }} value="FLUTE" name="music[]" class="chkSInstrument" id="6">FLUTE
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ $pr->music ==='KEYBOARD'?'checked':'' }} value="KEYBOARD" name="music[]" class="chkSInstrument" id="7">KEYBOARD
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ $pr->music ==='OTHERS'?'checked':'' }} value="OTHERS" name="music[]" class="chkSInstrument" id="8">OTHERS
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
    <div class="clearfix">
        
    </div>
      <div class="text-center">
             @if ($pr->status!=11)
                    <input type="submit" id="btnSave" value="Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" />
                    @endif
                    <a data-toggle="tab"  class="btn btn-primary btn-size-md menu8" onclick="menu('mm9')" style="width:85px" href="#menu9">Next</a>
        </div>
</form>
</div>