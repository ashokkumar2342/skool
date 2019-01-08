<div class="row" style="padding-top: 20px">
    <form action="{{ route('declaration') }}" method="post" no-reset="true"   accept-charset="utf-8"  >
        {{ csrf_field() }}   
            <div class="timeline-item">
                <div class="timeline-body">
                    <ol>
                        <li>
                            <p>
                                I / We hereby certify that the above information provided by me / us is correct.
                            </p>
                        </li>
                        <li>
                            <p>
                                I / We understand that if the information is found to be incorrect or false, my ward will be automatically debarred from the selection /
                                admission process without any correspondence in this regard.
                            </p>
                        </li>
                        <li>
                            <p>I / We also understand that the application / registration / wait listing does not guarantee admission to my ward.</p>
                        </li>
                        <li>
                            <p>I / We accept the process of admission undertaken by the school and I / We will abide the decision taken by the school authorities.</p>
                        </li>
                    </ol>
                </div>
            </div> 
 
    <div class="timeline-item">
        <div class="timeline-body">
            <div class="form-group" id="capture">
                @if ($pr->status!=11)
                <div class="col-md-10 col-md-offset-1 text-center">
                    <label style="text-align:left;color:#f32b07;font-size:14px">
                        <input type="checkbox" value="chkAgree" onclick="chkagreeshowHide()" style="color:orangered" tabindex="0" id="chkAgree"  required=""> I Agree
                    </label>
                </div>
                @endif
            {{--     <div class="col-md-4 col-md-offset-4 text-center" style="margin-top: 10px; margin-bottom: 10px;">
                    <div class="pop_textbox text-center"> 
                         <b class="floating-lable">Enter Captcha Code</b>
                        <input class="form-control" autocomplete="off" placeholder="Enter captcha" name="captcha" type="text" value=""> {!! captcha_img() !!}  
                   
                    </div>
                    
                </div>  --}}

            </div> 
        </div>
    </div>
 
     <div class="row">
        <div class="col-md-4 col-lg-offset-4 text-center">
            @if ($pr->status!=11)
            <input type="submit" id="btn-final-Save" value="Final Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" disabled onclick="return confirm('Final Save Can not change')"  />  
            @endif
              <a data-toggle="tab"  class="menu11" onclick="menu('mm11')" style="width:85px" href="#menu11"></a>
              {{-- <a    class="btn btn-info btn-size-md"   style="width:85px" href="#menu11">preview</a> --}}
              <button type="button" style="width:85px" onclick="callPopupLarge(this,'{{ route('preview',Crypt::encrypt($pr->id)) }}')" class="btn btn-primary btn-size-md" data-toggle="modal"  >Preview </button>
        </div>
            
     </div>

 
      

 
</form>
</div>
<!-- Trigger the modal with a button -->
