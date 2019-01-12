 <div class="row">
<form action="{{ route('other') }}" method="post" class="add_form" no-reset="true" accept-charset="utf-8"  >
        {{ csrf_field() }} 
    <div class="col-md-12">

        <div class="col-lg-6 b-r">
            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="passport_no" value="{{ $pr->passport_no }}" class="form-control input-sm" style="text-transform:uppercase;" id="PassportNo"  maxlength="50"  accept="application/pdf,application/vnd" required />
                            <b class="floating-lable">Passport No </b>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input   name="date_of_issued_passport" value="{{ $pr->date_of_issued_passport!=null? date('d-m-Y',strtotime($pr->date_of_issued_passport)):''}}" class="form-control input-sm datepicker" type="text"  maxlength="10"  accept="application/pdf,application/vnd" required />
                            <b class="floating-lable">Date of Issued Passport</b>
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
                            <input type="text" name="passport_issue_place" value="{{ $pr->passport_issue_place }}" class="form-control input-sm" style="text-transform:uppercase;" id="PassportIssuePlace" maxlength="40"  accept="application/pdf,application/vnd" required />
                            <b class="floating-lable">Passport Issue Place </b>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="PassportExpirydate" value="{{ $pr->date_of_issued_passport!=null? date('d-m-Y',strtotime($pr->passport_expiry_date)):''}}" name="passport_expiry_date" class="form-control input-sm datepicker" type="text"  maxlength="10" accept="application/pdf,application/vnd" required />
                            <b class="floating-lable">Passport Expiry date</b>
                        </div>
                    </div>      

                </div>
             
            </div>
        
        </div>
        <div class="form-group">
            <div class="col-md-12 timeline-body">
                <label class="col-md-12">Would you like to avail of the school transport?if yes mention the Route and the preferred bus preferred bus stop as per route/stops indicated in the information sheet.</label>
                
                
                <div class="col-md-5">
                      {!! Form::select('school_bus',['yes'=>'yes','no'=>'no'], $pr->school_bus, ['class'=>'form-control','placeholder'=>'Select School Bus','required']) !!}
                     
                    <b class="floating-lable">Select School Bus </b>

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
                    <a data-toggle="tab"  class="btn btn-primary btn-size-md menu9" onclick="menu('mm10')" style="width:85px" href="#menu10">Next</a>
        </div>
</form>

</div>
