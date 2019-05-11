
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
        <h4 class="modal-title">Member Ship Facility Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.member.ship.facility.store') }}" method="post" class="add_form" button-click="btn_member_ship_facility_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Member Ship Type</label>
                      <select name="member_ship_type" class="form-control" >
                        <option disabled selected="">Select Member Ship Type</option> 
                        @foreach ($librarymembertypes as $librarymembertype) 
                        <option value="{{ $librarymembertype->id }}">{{ $librarymembertype->member_ship_type }}</option>
                        @endforeach 
                      </select>
                    </div>
                    <div class="col-lg-4">
                      <label>No of Tickets</label>
                      <select name="no_of_ticket" class="form-control" onchange="callAjax(this,'{{ route('member.ship.facility.onchange') }}','no_of_daya_div')">
                        <option selected disabled>Select Option</option> 
                        @foreach ($tickets as $ticket) 
                        <option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div id="no_of_daya_div">
                       
                     </div> 
                  </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
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

 

