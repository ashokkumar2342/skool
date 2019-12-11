<form  action="{{ route('admin.attendance.barcode.save') }}" method="post" class="add_form">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-lg-4" style="margin-left: 20px">
                          <label>Registration No</label>
                          <input type="text" class="form-control" name="registration_no" id="registration_no" button-click="btn_save_attendance_barcode" onkeyup="aaaaa(this)"> 

                        </div>
                      </div>
              </form>
               <div class="col-lg-12" style="padding-top: 20px">
                        <form action="{{ route('admin.attendance.barcode.save') }}" button-click="btn_click_form_blade" method="post" class="add_form">
                          {{ csrf_field()  }}
                          
                        <div id="div_show">
                           
                         </div> 
                          
                        </form>
                      </div> 