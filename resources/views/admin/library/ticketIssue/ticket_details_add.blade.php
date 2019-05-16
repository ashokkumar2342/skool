
     <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tickets Details Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.ticket.details.update',$MemberShipDetail->id) }}" method="post" class="add_form" button-click="btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="col-md-12">
                     <h4>Ticket {{ $MemberShipDetail->membershipfacilitys->no_of_ticket or '' }}-{{ $MemberShipDetail->membershipfacilitys->no_of_days or '' }} Days</h4>
                    </div>
                    
                    <div class="col-lg-6">
                      <label>Ticket</label>
                         <select name="member_ship_facility_id"  class="form-control" >
                          <option selected disabled>Select Ticket/Days</option>
                          @foreach ( $memberShipFacilitys as $memberShipFacility)
                          <option value="{{$memberShipFacility->id  }}">{{$memberShipFacility->no_of_ticket or ''  }} - {{$memberShipFacility->no_of_days or ''  }} Days</option> 
                          @endforeach
                            
                        </select>  
                      
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

 

