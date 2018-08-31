<div class="row">
    <form action="{{ route('sibling') }}" method="post" no-reset="true" class="add_form" accept-charset="utf-8"  >
        {{ csrf_field() }} 
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <label class="control-label" style="font-size: 17px; color: #00c0ef; "> Any Sibling  ?(Real brother/sister)</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="N" name="SameSibling" id="SiblingYes" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="N" name="SameSibling" checked="checked" id="SiblingNo" onclick="return GetSiblingData();" /> No
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="tdSibling" style="display: none">
                <div class="col-md-12">
                    <span style="border-bottom: 2px solid #00c0ef; font-size: 15px; color:  #00c0ef"><span style="font-weight: 700"> Note:- </span>  Please Enter Adm. No. & Press Enter </span>
                </div>
                <div class="col-lg-3 b-r">
                    <div class="form-horizontal">
                        <div class="box-body">

                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="AdmNo1" name="admission_no" class="form-control input-sm" type="text" autocomplete="off" maxlength="10"
                                           required />
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
                                    <input id="txtSiblingName1" name="name" placeholder="Name"  class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="50" required />
                                    
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
                                    <input id="idClassSection" name="class" placeholder="Class"   class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="30" required />
                                    
                                </div>
                            </div> 
                          
                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                    </div>
                </div>
                 <div class="col-lg-3 b-r" id="tdSibling2">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="idClassSection" name="school_name" placeholder="School Name"   class="form-control input-sm" type="text" tabindex="0" autocomplete="off" maxlength="30" required />
                                    
                                </div>
                            </div> 
                          
                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                    </div>
                </div>
                 <div class="col-lg-3 b-r" id="tdSibling2">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="radio" value="1" name="is_sibling" checked="checked" /> In This School &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" value="2"name="is_sibling"  id="SiblingNo"  /> Other School
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
                    <a data-toggle="tab"  class="btn btn-primary btn-size-md menu7" onclick="menu('mm8')" style="width:85px" href="#menu8">Next</a>
        </div>
             
                            </form>
        </div>
        {{-- <div class="row" style="display: none">
            <form action="{{ route('sibling') }}" method="post" class="add_form" accept-charset="utf-8"  >
        {{ csrf_field() }} 
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <label class="control-label" style="font-size: 17px; color: #fb8826; "> Any Sibling in Other School ?(Real brother/sister)</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="N" name="SameSibling1" id="SiblingYes1" onclick="return GetSiblingData1();" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="N" name="SameSibling1" id="SiblingNo1" checked ="checked" onclick="return GetSiblingData1();" /> No
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="tdSiblingzOther">

                <div class="col-lg-12 b-r">
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
                 
            </div>
            <div class="text-center">
          <input type="submit" id="btnSave" value="Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" />
         <a data-toggle="tab"  class="btn btn-primary btn-size-md" onclick="test()" style="width:85px" href="#menu8">Next</a>
     </div> --}}
        {{-- </form> --}}
        {{-- </div> --}}