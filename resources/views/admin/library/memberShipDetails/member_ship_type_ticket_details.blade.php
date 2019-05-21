    
  <div class="col-lg-4">
      <label>No of Days</label>
      <select name="no_of_days"  class="form-control" >
      <option selected disabled>Select Days</option>
      @foreach ( $memberShipFacilitys as $memberShipFacility)
      <option value="{{ $memberShipFacility->id }}">{{ $memberShipFacility->no_of_days}}</option>  
      @endforeach

      </select> 
  </div>
  <input type="hidden" class="form-control" name="member_ship_details_id" value="{{ $memberShipDetail->id }}">
  {{-- <input type="" class="form-control" name="member_ship_type_id" value="{{ $memberShipDetail->member_ship_type_id }}"> --}}

  <div class="col-lg-4">
      <label>Ticket No.</label>
      <input type="number" name="ticket_no" class="form-control" placeholder="Enter Ticket No">
      
  </div> 
  <div class="col-lg-4"> 
      <input type="submit" class="btn btn-success" value="Save" style="margin:  23px">  
  </div>
</form> 

 <div class="row">
   <div class="col-lg-6" id="btn_save_ticket_table_show">
     @include('admin.library.memberShipDetails.member_ship_ticket_table')
   </div>
 </div>
