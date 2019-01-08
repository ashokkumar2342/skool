<div class="row">
           <form action="{{ route('father') }}" method="post" no-reset="true" class="add_form" accept-charset="utf-8"  >
        {{ csrf_field() }}                          
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

            <div class="col-lg-6 b-r">
                <div class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-3" style="padding: 0px 3px 0px 0px">
                                    {!! Form::select('f_title',['MR.'=>'MR.','DR.'=>'DR.','COL.'=>'COL.','FR'=>'FR','LATE'=>'LATE'], $pr->f_title, ['class'=>'form-control','placeholder'=>'Select Locality','required']) !!}
                              
                                    <b class="floating-lable">Title </b>
                                </div>
                                <div class="col-md-9" style="padding: 0px">
                                    <input type="text" name="father_name" value="{{ $pr->father_name }}" class="form-control input-sm" style="text-transform:uppercase;" id="Mother" maxlength="40"  required />
                                    <b class="floating-lable">Father's Name<b class="fa fa-asterisk"></b>  </b>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="f_qualification" value="{{ $pr->f_qualification }}" class="form-control input-sm" style="text-transform:uppercase;" id="Mother" minlength="2"   maxlength="40"  required />
                                <b class="floating-lable">Qualification  </b>
                            </div>
                        </div>

                        <div class="form-group"> 
                            <div class="col-md-12"> 
                                {!! Form::select('f_occupation',$professions, $pr->f_occupation, ['class'=>'form-control','placeholder'=>'Select Profession','required']) !!}
                                <b class="floating-lable">Profession</b>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="f_designation" value="{{ $pr->f_designation }}" class="form-control input-sm" style="text-transform:uppercase;" minlength="3"  maxlength="40"    />
                                <b class="floating-lable">Designation </b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="f_college" value="{{ $pr->f_college }}" id="MCollegeUniversity" class="form-control input-sm" style="text-transform:uppercase;" minlength="3" maxlength="150"  required />
                                <b class="floating-lable">College/University</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="f_residence_telephone" value="{{ $pr->f_residence_telephone }}" id="MTelelphone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-sm" style="text-transform:uppercase;" maxlength="12" minlength="3"  tabindex="0" />
                                <b class="floating-lable">Residence Telephone No</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="f_office_telephone" value="{{ $pr->f_office_telephone }}" id="MOfficeTelelphone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-sm" style="text-transform:uppercase;" maxlength="10"  tabindex="0"  />
                                <b class="floating-lable">Office Telephone No</b>
                            </div>
                        </div>

                        <div class="form-group" >
                            <div class="col-md-12"> 
                                {!! Form::select('f_annual_income',$incomeRanges, $pr->f_annual_income, ['class'=>'form-control','placeholder'=>'Select Income','required']) !!}
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
                                <input type="text" name="f_organization" value="{{ $pr->f_organization }}" id="MOrgName" class="form-control input-sm" style="text-transform:uppercase;" minlength="3" maxlength="120"    />
                                <b class="floating-lable">Organization </b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea rows="2" name="f_organization_address" 
                                 cols="53" id="MOrgAddress" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120"  >{{ $pr->f_organization_address }}</textarea>
                                <small class="floating-lable">Organization Address<b class="fa fa-asterisk"></b><small></small></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="f_pin_code" value="{{ $pr->f_pin_code }}" class="form-control input-sm" id="MPincode" style="text-transform:uppercase;" autocomplete="off" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57'   />
                                <b class="floating-lable">Pin code</b>
                            </div>
                        </div>
                        

                        <div class="form-group" >
                            <div class="col-md-12">
                                <input type="text" name="f_phone_no" value="{{ $pr->f_phone_no }}"  id="MTelelphone" minlength="10" maxlength="10" class="form-control input-sm" style="text-transform:uppercase;"    />
                                <b class="floating-lable">Phone No</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" name="f_email" value="{{ $pr->f_email }}" id="MEmail" class="form-control input-sm"  maxlength="60" required />
                                <b class="floating-lable">Email Id <b class="fa fa-asterisk"></b></b>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="father_mobile" value="{{ $pr->father_mobile }}" minlength="10" id="MMobileNo" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-sm" style="text-transform:uppercase;" maxlength="10"   tabindex="0" required />
                                <b class="floating-lable">Mobile No <b class="fa fa-asterisk"></b></b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="f_fax" value="{{ $pr->f_fax }}" class="form-control input-sm" minlength="10" id="MFax" style="text-transform:uppercase;" autocomplete="off"  maxlength="10" />
                                <b class="floating-lable">Fax</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::file('father_image','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Father's Photo  Passport size 100kb</b>
                            </div>
                              <div class="col-md-6">
                                {!! Form::file('f_signature','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Father Signature  size 100kb</b>
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
                    <a data-toggle="tab"  class="btn btn-primary btn-size-md menu4" onclick="menu('mm5')" style="width:85px" href="#menu5">Next</a>
        </div>
    </form>
    </div>
 