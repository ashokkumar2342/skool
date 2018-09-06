<div class="row">
           <form action="{{ route('mother') }}" method="post" no-reset="true" class="add_form" accept-charset="utf-8"  >
        {{ csrf_field() }}                          
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

            <div class="col-lg-6 b-r">
                <div class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-3" style="padding: 0px 3px 0px 0px">
                                    {!! Form::select('m_title',['MRS.'=>'MRS.','MS.'=>'MS.','SR.'=>'SR.'], $pr->m_title, ['class'=>'form-control','placeholder'=>'Select Locality','required']) !!}
                              
                                    <b class="floating-lable">Title </b>
                                </div>
                                <div class="col-md-9" style="padding: 0px">
                                    <input type="text" name="mother_name" value="{{ $pr->mother_name }}" class="form-control input-sm" style="text-transform:uppercase;" id="Mother" maxlength="40"  required />
                                    <b class="floating-lable">Mother's Name<b class="fa fa-asterisk"></b>  </b>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_qualification" value="{{ $pr->m_qualification }}" class="form-control input-sm" style="text-transform:uppercase;" id="Mother" maxlength="40"  required />
                                <b class="floating-lable">Select Qualification  </b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_occupation" value="{{ $pr->m_occupation }}" class="form-control input-sm" style="text-transform:uppercase;"   maxlength="40"  required />
                          
                                <b class="floating-lable">Occupation </b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_designation" value="{{ $pr->m_designation }}" class="form-control input-sm" style="text-transform:uppercase;"   maxlength="40"  required />
                                <b class="floating-lable">Designation </b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_college" value="{{ $pr->m_college }}" id="MCollegeUniversity" class="form-control input-sm" style="text-transform:uppercase;" maxlength="150"  required />
                                <b class="floating-lable">College/University</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_residence_telephone" value="{{ $pr->m_residence_telephone }}" id="MTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12"   tabindex="0" required />
                                <b class="floating-lable">Residence Telephone No</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_office_telephone" value="{{ $pr->m_office_telephone }}" id="MOfficeTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12"  tabindex="0" required />
                                <b class="floating-lable">Office Telephone No</b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_annual_income" value="{{ $pr->m_annual_income }}"  class="form-control input-sm" style="text-transform:uppercase;" maxlength="16"   tabindex="0" required />
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
                                <input type="text" name="m_organization" value="{{ $pr->m_organization }}" id="MOrgName" class="form-control input-sm" style="text-transform:uppercase;" maxlength="120"   required />
                                <b class="floating-lable">Organization </b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea rows="2" name="m_organization_address" 
                                 cols="53" id="MOrgAddress" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required>{{ $pr->m_organization_address }}</textarea>
                                <small class="floating-lable">Organization Address<b class="fa fa-asterisk"></b><small></small></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_pin_code" value="{{ $pr->m_pin_code }}" class="form-control input-sm" id="MPincode" style="text-transform:uppercase;" autocomplete="off" maxlength="6"   required />
                                <b class="floating-lable">Pin code</b>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_phone_no" value="{{ $pr->m_phone_no }}"  id="MTelelphone" class="form-control input-sm" style="text-transform:uppercase;" maxlength="60"   required />
                                <b class="floating-lable">Phone No</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_email" value="{{ $pr->m_email }}" id="MEmail" class="form-control input-sm" maxlength="60" required />
                                <b class="floating-lable">Email Id <b class="fa fa-asterisk"></b></b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="mother_mobile" value="{{ $pr->mother_mobile }}" id="MMobileNo" class="form-control input-sm" style="text-transform:uppercase;" maxlength="10"   tabindex="0" required />
                                <b class="floating-lable">Mobile No <b class="fa fa-asterisk"></b></b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="m_fax" value="{{ $pr->m_fax }}" class="form-control input-sm" id="MFax" style="text-transform:uppercase;" autocomplete="off" maxlength="60"  required />
                                <b class="floating-lable">Fax</b>
                            </div>
                        </div>
                          <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::file('mother_image','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Image <b class="fa fa-asterisk"></b> Passport size100kb</b>
                            </div>
                              <div class="col-md-6">
                                {!! Form::file('m_signature','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Signature <b class="fa fa-asterisk"></b>  size100kb</b>
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
                    <a data-toggle="tab"  class="btn btn-primary btn-size-md menu5" onclick="menu('mm6')" style="width:85px" href="#menu6">Next</a>
        </div>
    </form>
</div>
 