<div class="row">
    <form action="{{ route('previous.school') }}" no-reset="true" method="post" class="add_form" no-reset="true" accept-charset="utf-8"  >
        {{ csrf_field() }}
    <div class="col-md-12">

        <div class="col-lg-12">
            <div class="form-horizontal">
                <div class="box-body">


                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="text" name="last_school" value="{{ $pr->last_school }}" class="form-control input-sm" id="LastSchools" style="text-transform:uppercase;" autocomplete="off" maxlength="50" required />
                            <b class="floating-lable">Last School</b>
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="leaving_date" value="{{ $pr->leaving_date }}"  class="form-control input-sm datepicker" id="LeavingDate" style="text-transform:uppercase;" autocomplete="off" maxlength="6"  required />
                            <b class="floating-lable">Leaving Date</b>
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="reason_change_school" value="{{ $pr->reason_change_school }}"  class="form-control input-sm" id="ReasonChangeSchool" style="text-transform:uppercase;" autocomplete="off" maxlength="200" onkeypress="return Restrict_Name(event);" required />
                            <b class="floating-lable">Reason Change School</b>
                        </div>
                    </div>


                </div>

                <!-- /.box-body -->
                <!-- /.box-footer -->
                <div class="text-center">
                    @if ($pr->status!=11)
                   <input type="submit" id="btnSave" value="Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" /> 
                   @endif
                    <a data-toggle="tab"  class="btn btn-primary btn-size-md menu2" onclick="menu('mm3')" style="width:85px" href="#menu3">Next</a>
                </div>
                 
            </div>

        </div>



    </div>
</form>
</div>
