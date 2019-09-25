
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }

     .fa-asterisk {
    color: red;
    font-size:10px; 
}
   
</style>
 
  <div class="modal-dialog" style="width:90%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Address</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.parents.address.store') }}" method="post" class="add_form" button-click="btn_close,address_info">
          {{ csrf_field() }}
          <input type="hidden" name="student_id" value="{{ $student_id }}">
          <div class="row">
            <div class="col-lg-4">
              <label>Primary Mobile</label><span class="fa fa-asterisk"></span>
              <input type="text" name="primary_mobile" class="form-control" placeholder="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>
            <div class="col-lg-4">
              <label>Primary E-mail</label><span class="fa fa-asterisk"></span>
              <input type="email" name="primary_email" class="form-control" placeholder="" maxlength="50">
            </div>
            <div class="col-lg-4">
              <label>Category</label><span class="fa fa-asterisk"></span>
              <select name="cotegory_id" class="form-control">
                <option selected disabled>Select Category </option>
                @foreach ($cotegorys as $cotegory)
                  <option value="{{ $cotegory->id }}">{{ $cotegory->name }}</option> 
                @endforeach 
              </select>
            </div>
            <div class="col-lg-4">
              <label>Religion</label><span class="fa fa-asterisk"></span>
              <select name="religion_id" class="form-control">
                <option selected disabled>Select Religion</option>
                @foreach ($religions as $religion)
                  <option value="{{ $religion->id }}">{{ $religion->name }}</option> 
                @endforeach 
              </select>
            </div>
            <div class="col-lg-4">
              <label>State</label><span class="fa fa-asterisk"></span>
              <input type="text" name="state" class="form-control" placeholder="" maxlength="50">
            </div>
            <div class="col-lg-4">
              <label>City</label><span class="fa fa-asterisk"></span>
              <input type="text" name="city" class="form-control" placeholder="" maxlength="50">
            </div>
            <div class="col-lg-6">
              <label>P Address</label><span class="fa fa-asterisk"></span>
              <textarea class="form-control" name="p_address" maxlength="250"></textarea>
            </div>
            <div class="col-lg-6">
              <label>C Address</label><span class="fa fa-asterisk"></span>
              <textarea class="form-control" name="c_address" maxlength="250"></textarea>
            </div>
            <div class="col-lg-4">
              <label>P Pincode</label><span class="fa fa-asterisk"></span>
              <input type="text" name="p_pincode" class="form-control" maxlength="6" placeholder="" maxlength="">
            </div>
            <div class="col-lg-4">
              <label>C Pincode</label><span class="fa fa-asterisk"></span>
              <input type="text" name="c_pincode" class="form-control" maxlength="6" placeholder="" maxlength="">
            </div>
            <div class="col-lg-4">
              <label>Nationality</label><span class="fa fa-asterisk"></span>
              <select name="nationality" class="form-control">
                <option selected value="1">Indian</option>
                <option   value="2">Other Country</option> 
              </select>
            </div> 
          <div class="col-lg-12 text-center" style="margin-top: 10px">
            <input type="submit" class="btn btn-success">
            
          </div>
          </div>

          
        </form>
     
      </div>   
    </div>
  </div>

                 
   