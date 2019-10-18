
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
        <h4 class="modal-title">Edit Member Ship Facility </h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.member.ship.facility.Update',$membershipfacilitys->id) }}" method="post" class="add_form" button-click="btn_member_ship_facility_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="form-group col-lg-4">
                      <label>Member Ship Type</label>
                      <select name="member_ship_type" class="form-control" >
                        <option disabled selected>Select Member Ship Type</option> 
                        @foreach ($librarymembertypes as $librarymembertype) 
                        <option value="{{ $librarymembertype->id  }}"{{ $membershipfacilitys->member_ship_type_id==$librarymembertype->id? 'selected="selected"' : ''  }}>{{ $librarymembertype->member_ship_type or '' }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-lg-4"> 
                      <label>No of Tickets</label>
                      <input type="text" name="no_of_ticket" class="form-control" value="{{ $membershipfacilitys->no_of_ticket }}" placeholder="Enter No of Tickets" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div>
                   
                    <div class="form-group col-lg-4">
                      <label>No of Days</label>
                      <input type="text" name="no_of_days" class="form-control"   value="{{ $membershipfacilitys->no_of_days }}" maxlength="10" placeholder="Enter No of Days" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
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

 

