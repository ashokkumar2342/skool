<div class="row">
      <form action="{{ route('student') }}" method="post" no-reset="true" class="add_form" accept-charset="utf-8"  novalidate>
        {{ csrf_field() }}
        
                                         
                                                                
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
                            <input type="text" name="first_name" class="form-control input-sm" id="txtFName" style="text-transform:uppercase;" value="{{ $pr->name }}" autocomplete="off" maxlength="50"  required />
                            <b class="floating-lable">First Name <b class="fa fa-asterisk"></b> </b>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="last_name" value="{{ $pr->last_name }}" class="form-control input-sm" id="txtLName" style="text-transform:uppercase;" autocomplete="off" maxlength="50"  required />
                            <b class="floating-lable">Last Name</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="nick_name" value="{{ $pr->nick_name }}"   class="form-control input-sm" id="txtMName" style="text-transform:uppercase;" autocomplete="off" maxlength="50"  required />
                            <b class="floating-lable">Nick Name</b>
                        </div>
                    </div>

                   

                    <div class="form-group">
                        <div class="col-md-12">                           
                            {!! Form::select('academic_year',$academicYear, $pr->academic_year_id, ['class'=>'form-control','placeholder'=>'Select Academic Session','required']) !!}
                            <b class="floating-lable">Academic Session<b class="fa fa-asterisk"></b></b>
                        </div>
                    </div> 
                      <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="aadhaar_no" value="{{ $pr->aadhaar_no }}" id="AdharCard" class="form-control input-sm" style="text-transform:uppercase;" maxlength="12"  required />
                                <b class="floating-lable">Aadhaar No. of Child<b class="fa fa-asterisk"></b></b>
                            </div>

                        </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input id="DateBirth" name="dob" value="{{ date('d-m-Y',strtotime($pr->dob)) }}" class="form-control datepicker input-sm" type="text"  maxlength="10"  required />
                            <b class="floating-lable">Date of Birth <b class="fa fa-asterisk"></b></b>
                        </div>

                       
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                             {!! Form::select('tongue',$tongues,$pr->tongue, ['class'=>'form-control','placeholder'=>'Select Tongue','required']) !!}
                            <b class="floating-lable">Select Mother Tongue </b>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="email" value="{{ $pr->email }}" class="form-control input-sm" id="txtAddEmail" maxlength="60" autocomplete="off" required />
                            <b class="floating-lable">Email<b class="fa fa-asterisk"></b></b>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::file('image','', ['class'=>'form-control','placeholder'=>'Select Locality']) !!}
                             
                            <b class="floating-lable">Student Photo <b class="fa fa-asterisk"></b> Passport size100kb</b>
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
                          
                            {!! Form::select('religion',$religions, $pr->religion_id, ['class'=>'form-control','placeholder'=>'Select Religion','required']) !!}
                            <b class="floating-lable">Select Religion  </b>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="mobile" value="{{ $pr->mobile }}" class="form-control input-sm" id="PhoneNo" autocomplete="off" style="text-transform:uppercase;" maxlength="10"  required />
                            <b class="floating-lable">Mobile No. For SMS Correspondance<b class="fa fa-asterisk"></b></b>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::select('gender',$genders, $pr->gender_id, ['class'=>'form-control','placeholder'=>'Select Gender','required']) !!}
                            <b class="floating-lable">Select Gender <b class="fa fa-asterisk"></b></b>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-12">
                                {!! Form::select('blood_group',$bloodGroups, $pr->blood_group, ['class'=>'form-control','placeholder'=>'Select Blood Group','required']) !!}
                                <b class="floating-lable">Select Blood Group  </b>
                            </div>
                        </div>

                 
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::select('class',$classes, $pr->class_id, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                            <b class="floating-lable">Select Class <b class="fa fa-asterisk"></b></b>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::select('category',$categories,$pr->category_id, ['class'=>'form-control','placeholder'=>'Select Category','required']) !!}
                            <b class="floating-lable">Select Category</b>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::select('staff_ward',['yes'=>'yes','no'=>'no'], $pr->staff_ward, ['class'=>'form-control','placeholder'=>'Select staff Ward','required']) !!}
                           
                            <b class="floating-lable">Staff Ward</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::select('locality',['0 - 2 Km'=>'0 - 2 Km','Between 2 Km - 5 Km'=>'Between 2 Km - 5 Km','Between 10 Km -15 KM'=>'Between 10 Km -15 KM'], $pr->locality, ['class'=>'form-control','placeholder'=>'Select Locality','required']) !!}
                            </select>
                            <b class="floating-lable">Locality <b class="fa fa-asterisk"></b></b>
                        </div>
                    </div>
                 
                
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
                
            </div>
        </div>
    </div>
     <div class="text-center">
        @if ($pr->status!=11)
          <input type="submit" id="btnSave" value="Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" />
          @endif
         <a data-toggle="tab"  class="btn btn-primary btn-size-md menu1" onclick="menu('mm2')" style="width:85px" href="#menu2">Next</a>
     </div>
</form>  
</div>