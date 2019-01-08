<div class="row">
    <form action="{{ route('address') }}" no-reset="true" method="post" class="add_form" accept-charset="utf-8" >
{{ csrf_field() }}

    <div class="col-md-12">

        <div class="col-lg-5">
            <div class="form-horizontal">
                <div class="box-body">

                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea rows="2" cols="53" name="c_address"   id="PresFlatNos" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off"  maxlength="120"  required>{{ $pr->c_address }}</textarea>
                            <small class="floating-lable">Residential Address<small class="fa fa-asterisk"></small></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control input-sm" value="{{ $pr->pincode }}" id="PresPinCodes" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  name="pincode" autocomplete="off" maxlength="6" required />
                            <b class="floating-lable">Pin code</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="phone" value="{{ $pr->phone }}" class="form-control input-sm" id="PresTelephoneNos" style="text-transform:uppercase;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" autocomplete="off" maxlength="11"   required />
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
                            <textarea rows="2" name="p_address" cols="53" id="PemFlatNos" class="form-control input-sm" style="text-transform:uppercase;" autocomplete="off" maxlength="120" required>{{ $pr->p_address }}</textarea>
                            <small class="floating-lable">Permanent Address<small class="fa fa-asterisk"></small></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="p_pincode" value="{{ $pr->p_pincode }}" class="form-control input-sm" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="PemPinCodes" style="text-transform:uppercase;" autocomplete="off" maxlength="6"  required />
                            <b class="floating-lable">Pin code</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="p_phone" value="{{ $pr->p_phone }}" class="form-control input-sm" id="PemTelephoneNos" style="text-transform:uppercase;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off" maxlength="11" required />
                            <b class="floating-lable">Phone No. </b>
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
      
      <a data-toggle="tab"  class="btn btn-primary menu3" onclick="menu('mm4')" style="width:85px" href="#menu4">Next</a>
        
    </div>
</form>
</div>