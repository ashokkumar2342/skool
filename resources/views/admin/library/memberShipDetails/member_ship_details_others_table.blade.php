 <div class="col-lg-4" id="library_member_ship_details_table">
  <label>Member Ship No</label>
                      <select name="other" class="form-control select2" onchange="callAjax(this,'{{ route('admin.library.member.ship.details.others.show') }}','library_member_ship_student_table')" >
                      	<option selected="" disabled="">Select Other Code</option>}
                      	option
                        @foreach ($others as $other) 
                        <option value="{{ $other->id }}">{{ $other->code or '' }}</option>
                        @endforeach 
                      </select>
 </div>
 <div class="col-lg-4" id="library_member_ship_details_table">

                        <label>Ticket</label>
                         <select name="member_ship_facility_id"  class="form-control" >
                         	<option selected disabled>Select Ticket/Days</option>
                          @foreach ( $memberShipFacilitys as $memberShipFacility)
                          <option value="{{$memberShipFacility->id  }}">{{$memberShipFacility->no_of_ticket  }} - {{$memberShipFacility->no_of_days  }} Days</option> 
                          @endforeach
                            
                        </select>  
                       </div>
 	
 </div>

