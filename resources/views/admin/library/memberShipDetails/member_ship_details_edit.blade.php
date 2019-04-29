
     <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Library Member Type Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.member.ship.details.update',$membershipdetails->id) }}" method="post" class="add_form" button-click="btn_library_member_ship_details_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Member Ship Type</label>
                      <select name="member_ship_type" class="form-control">
                        @foreach ($librarymembertypes as $librarymembertype) 
                        <option value="{{ $librarymembertype->id  }}"{{ $membershipdetails->member_ship_type_id==$librarymembertype->id? 'selected="selected"' : ''  }}>{{ $librarymembertype->member_ship_type }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-lg-4">
                      <label>Member Ship Facility</label>
                       <select name="member_ship_facility" class="form-control">
                        @foreach ($membershipfacilitys as $membershipfacility) 
                         <option value="{{ $membershipfacility->id  }}"{{ $membershipdetails->member_ship_id==$membershipfacility->id? 'selected="selected"' : ''  }}>{{ $membershipfacility->member_ship_type_id }}</option>
                        @endforeach 
                       </select>
                    </div> 
                    <div class="col-lg-4">
                      <label>Member Ship No</label>
                      <input type="text" required=""  name="member_ship_no" class="form-control" value="{{ $membershipdetails->member_ship_no }}">  
                    </div> 
                     <div class="col-lg-4">
                      <label>Name</label>
                      <input type="text" name="name" required="" class="form-control" value="{{ $membershipdetails->name }}">  
                    </div> 
                     <div class="col-lg-4">
                      <label>Father's Name</label>
                      <input type="text" required="" name="father_name" class="form-control" value="{{ $membershipdetails->father }}">  
                    </div> 
                    <div class="col-lg-4">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control"maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $membershipdetails->mobile }}" >  
                    </div>  
                    <div class="col-lg-4">
                      <label>Email</label>
                      <input type="email" name="email" required="" class="form-control" value="{{ $membershipdetails->email }}">  
                    </div> 
                     <div class="col-lg-4">
                      <label>Address</label>
                      <textarea class="form-control" name="address">{{ $membershipdetails->address }} </textarea>
                    </div> 
                  </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Update" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
            </div>   
              
      <!-- /.row -->
          </div>
          
        </div>
      </div>
   </div>

    <!-- /.content -->

 

