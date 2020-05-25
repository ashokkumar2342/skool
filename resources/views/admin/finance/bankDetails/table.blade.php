@foreach ($SchoolBankDetails as $SchoolBankDetail)
            <div class="col-lg-6">
            <div class="panel panel-default">
            <div class="panel-heading text-right"><a href="" title="" class="btn btn-sm btn-primary">Mapping</a></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Bank Name 
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->Banks->name or '' }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Ifsc Code.  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->ifsc_code }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                              Account No.   
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->account_no }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Account Name  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->account_name }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Contact No.  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->contact_no }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Email  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->email }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                               Contact Person Name 
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->contact_person_name }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Branch 
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->branch }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Branch Address 
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $SchoolBankDetail->bank_address }}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endforeach