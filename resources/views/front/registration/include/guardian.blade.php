<div class="row">
           <form action="{{ route('guardian') }}" method="post" no-reset="true" class="add_form"  accept-charset="utf-8"  >
        {{ csrf_field() }}                          
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

            <div class="col-lg-6 b-r">
                <div class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-3" style="padding: 0px 3px 0px 0px">
                                    {!! Form::select('g_title',['MR.'=>'MR.','DR.'=>'DR.','COL.'=>'COL.','FR'=>'FR','LATE'=>'LATE'], $pr->g_title, ['class'=>'form-control','placeholder'=>'Select Locality','required']) !!}
                              
                                    <b class="floating-lable">Title </b>
                                </div>
                                <div class="col-md-9" style="padding: 0px">
                                    <input type="text" name="guardian_name" value="{{ $pr->guardian_name }}" class="form-control input-sm" style="text-transform:uppercase;"   minlength="2" maxlength="40"  required />
                                    <b class="floating-lable">Guardian's Name<b class="fa fa-asterisk"></b>  </b>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_qualification" value="{{ $pr->g_qualification }}" class="form-control input-sm" style="text-transform:uppercase;" id="Mother" maxlength="40"    />
                                <b class="floating-lable">Select Qualification  </b>
                            </div>
                        </div>

                    <div class="form-group"> 
                        <div class="col-md-12"> 
                            {!! Form::select('g_occupation',$professions, $pr->g_occupation, ['class'=>'form-control','placeholder'=>'Select Profession','required']) !!}
                            <b class="floating-lable">Profession</b>

                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_designation" value="{{ $pr->g_designation }}" class="form-control input-sm" style="text-transform:uppercase;"   maxlength="40"  />
                                <b class="floating-lable">Designation </b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_college" value="{{ $pr->g_college }}" id="MCollegeUniversity" class="form-control input-sm" style="text-transform:uppercase;" maxlength="150"  />
                                <b class="floating-lable">College/University</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_residence_telephone" value="{{ $pr->g_residence_telephone }}" id="MTelelphone" class="form-control input-sm" style="text-transform:uppercase;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12"   tabindex="0"  />
                                <b class="floating-lable">Residence Telephone No</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_office_telephone" value="{{ $pr->g_office_telephone }}" id="MOfficeTelelphone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-sm" style="text-transform:uppercase;" maxlength="12"  tabindex="0"  />
                                <b class="floating-lable">Office Telephone No</b>
                            </div>
                        </div>

                        <div class="form-group" >
                          <div class="col-md-12"> 
                              {!! Form::select('g_annual_income',$incomeRanges, $pr->g_annual_income, ['class'=>'form-control','placeholder'=>'Select Income','required']) !!}
                              <b class="floating-lable">Annual Income</b>

                          </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::file('guardian_image','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Photo Guadian's  Passport size 100kb</b>
                            </div>
                               <div class="col-md-6">
                                {!! Form::file('g_signature','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Guadian's Signature  size 100kb</b>
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
                                <input type="text" name="g_organization" value="{{ $pr->g_organization }}" id="MOrgName" class="form-control input-sm" style="text-transform:uppercase;" minlength="3" maxlength="120" />
                                <b class="floating-lable">Organization </b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea rows="2" name="g_organization_address" 
                                 cols="53" id="MOrgAddress" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120"  minlength="3">{{ $pr->g_organization_address }}</textarea>
                                <small class="floating-lable">Organization Address<b class="fa fa-asterisk"></b><small></small></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_pin_code" value="{{ $pr->g_pin_code }}" class="form-control input-sm" id="MPincode" style="text-transform:uppercase;" autocomplete="off" minlength="6" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57'   />
                                <b class="floating-lable">Pin code</b>
                            </div>
                        </div>
                        

                        <div class="form-group" >
                            <div class="col-md-12">
                                <input type="text" name="g_phone_no" value="{{ $pr->g_phone_no }}"  id="MTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="60"  />
                                <b class="floating-lable">Phone No</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" name="g_email" value="{{ $pr->g_email }}" id="MEmail" class="form-control input-sm" maxlength="60" required />
                                <b class="floating-lable">Email Id <b class="fa fa-asterisk"></b></b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="guardian_mobile" value="{{ $pr->guardian_mobile }}" id="MMobileNo" class="form-control input-sm" style="text-transform:uppercase;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="10" maxlength="10"   tabindex="0" required />
                                <b class="floating-lable">Mobile No <b class="fa fa-asterisk"></b></b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_fax" value="{{ $pr->g_fax }}" class="form-control input-sm" id="MFax" style="text-transform:uppercase;" autocomplete="off" maxlength="60"/>
                                <b class="floating-lable">Fax</b>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="g_relation" value="{{ $pr->g_relation }}" class="form-control input-sm" id="MFax" style="text-transform:uppercase;" autocomplete="off" minlength="3" maxlength="60"  required />
                                <b class="floating-lable">Relation</b>
                            </div>
                        </div>

                        

                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                    

                </div>
            </div>
        </div>
          <div class="clearfix">
            
        </div>
        <div class="text-center">
             @if ($pr->status!=11)
                    <input type="submit" id="btnSave" value="Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" />
                    @endif
                    <a data-toggle="tab"  class="btn btn-primary btn-size-md menu6" onclick="menu('mm7')" style="width:85px" href="#menu7">Next</a>
        </div>
    </form>
    </div>
