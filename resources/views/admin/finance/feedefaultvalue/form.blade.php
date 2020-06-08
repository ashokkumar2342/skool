<form action="{{ route('admin.finance.fee.default.value.store') }}" method="post" class="add_form" no-reset="true">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-3 form-group">
                    <label>Upto Month/Year</label>
                    <select name="upto_month_year" class="form-control">
                      <option selected disabled>Select Upto Month/Year</option> 
                      @foreach ($uptoMonthYear as $uptoMonthYea)
                      <option value="{{ date('d-m-Y',strtotime($uptoMonthYea)) }}"{{ date('d-m-Y',strtotime($uptoMonthYea))==@$upto_month_year?'selected' : '' }}>{{ date('M-Y',strtotime($uptoMonthYea)) }}</option> 
                      @endforeach
                    </select> 
                  </div>
                  <div class="col-lg-3 form-group">
                    <label>Payment Mode</label>
                    <select name="payment_mode" class="form-control">
                      <option selected disabled>Select Payment Mode</option> 
                      @foreach ($paymentModes as $paymentMode)
                      <option value="{{ $paymentMode->id }}"{{ @$feedefaultvalue->payment_mode==$paymentMode->id?'selected' : '' }}>{{ $paymentMode->name }}</option> 
                      @endforeach
                    </select> 
                  </div> 
                  <div class="col-lg-3 form-group">
                    <label>Sibling Details</label>
                    <select name="sibiling_detail" class="form-control">
                      <option selected disabled>Select Receipt Template</option> 
                       <option value="1" {{ @$feedefaultvalue->sibiling_detail==1? 'selected' :'' }}>Yes</option> 
                       <option value="0" {{ @$feedefaultvalue->sibiling_detail==0? 'selected' :'' }}>No</option>
                    </select> 
                  </div>
                  <div class="col-lg-3 form-group">
                    <label>Receipt Print</label>
                    <select name="print_receipt" class="form-control">
                      <option selected disabled>Select Receipt Print</option> 
                       <option value="1" {{ @$feedefaultvalue->print_receipt==1? 'selected' :'' }}>Yes</option> 
                       <option value="0" {{ @$feedefaultvalue->print_receipt==0? 'selected' :'' }}>No</option>
                    </select> 
                  </div> 
                </div> 
                  <div class="row">
                    <div class="col-lg-12 text-center" style="margin-top: 20px">
                    <input type="submit" class="btn btn-success"> 
                    </div> 
                  </div> 
              </form>