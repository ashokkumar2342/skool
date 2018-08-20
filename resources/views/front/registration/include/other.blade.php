 <div class="row">

    <div class="col-md-12">

        <div class="col-lg-6 b-r">
            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="passport_no" class="form-control input-sm" style="text-transform:uppercase;" id="PassportNo" maxlength="50" onkeypress="return Restrict_Name(event);" required />
                            <b class="floating-lable">Passport No </b>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="DateofIssuedPassport" name="date_of_issued_passport" class="form-control input-sm" type="text" value="Date of Issued Passport" maxlength="10"  required />
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
                            <input type="text" name="passport_issue_place" class="form-control input-sm" style="text-transform:uppercase;" id="PassportIssuePlace" maxlength="40" onkeypress="return Restrict_Name(event);" required />
                            <b class="floating-lable">Passport Issue Place </b>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="PassportExpirydate" name="passport_expiry_date" class="form-control input-sm" type="text" value="Passport Expiry date" maxlength="10" required />
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
                    <select class="form-control input-sm" id="SchoolBus" name="school_bus" required="required"><option alue=""></option>
                        <option value="yes">YES</option>
                        <option selected="selected" value="no">NO</option>
                        </select>
                    <b class="floating-lable">Select School Bus </b>

                </div>
                
                <div class="col-md-2 text-center">
                    <a href="#" style="font-size: 16px;line-height:33px;color:#0073b7;" onclick="return openLocpop();">Select Bus Route</a>
                </div>

                <div class="col-md-5"> 
                    <input type="hidden"  id="hidTransportRoute" />

                    <input type="text" class="form-control input-sm"  id="TransportRouteName" maxlength="50" required />
                    <b class="floating-lable">Transport Route </b>

                   
                </div>


              {{--   <div id="Regpopup1" style="display:none; margin-top:63px; ">
                    <div id="Regclose1" onclick="return fCloseMessageDiv1()">X</div>


                    <div class="panel-body" style="overflow-x:hidden; height: 400px;">
                        <div id="gvLocalityData" style="width:95%;" align="center">
                            
                        </div>
                    </div>
                </div> --}}


            </div>
    </div>
</div>