 <div class="col-lg-4" id="library_member_ship_details_table">
  <label>Member Ship No</label>
                      <select name="member_ship_no" class="form-control select2" id="registration_list_select" onchange="callAjax(this,'{{ route('admin.library.member.ship.details.student.show') }}'+'?library_member_ship='+$('#library_member_ship').val(),'library_member_ship_student_table')" >
                        <option selected disabled>Select Registration No</option> 
                        @foreach ($datas as $student) 
                        <option value="{{ $student->id }}">{{ $student->registration_no or '' }}</option>
                        @endforeach 
                      </select>
 </div>
 {{-- <div class="col-lg-4" id="library_member_ship_details_table">

                        <label>Ticket</label>
                         <select name="member_ship_facility_id"  class="form-control" >
                         	<option selected disabled>Select Ticket/Days</option>
                          @foreach ( $memberShipFacilitys as $memberShipFacility)
                          <option value="{{$memberShipFacility->id  }}">{{$memberShipFacility->no_of_days  }} Days</option> 
                          @endforeach
                            
                        </select>  
                       </div>
 	
 </div> --}}

 