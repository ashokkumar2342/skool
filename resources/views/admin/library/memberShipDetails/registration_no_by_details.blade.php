<div id="library_member_ship_student_table">
   <div class="col-lg-4"> 
	<label>Name</label>
	<input type="text" class="form-control" name="name" value="{{ $datas->name or ''}}">
   </div> 
  <input type="text" class="form-control hidden" hidden="" name="registration_no" value="{{ $datas->registration_no or '' }}"> 
   </div>  
   <div class="col-lg-4"> 
	<label>Mobile No</label>
	<input type="text" class="form-control" name="mobile" value="{{ $datas->father_mobile or '' }}">
   </div> 
    <div class="col-lg-4"> 
	<label>Email</label>
	<input type="text" class="form-control" name="email" value="{{ $datas->email or '' }}">
   </div> 
   <div class="col-lg-4">
   	<label>Address</label>
   <textarea  class="form-control" name="address">{{ $datas->c_address or ''}}</textarea> 
   </div> 
    
     
    @if (empty($memberShipDetail))
       <div class="col-lg-12 text-center" style="padding-top: 10px">
         <input type="submit" class="btn btn-success" id="btn_click_ticket_details_show">
       </div>
         
    @endif 
    </form>         
  </div> 
   <form action="{{ route('admin.library.member.registration.ticket.details.store') }}" method="post" class="add_form" success-content-msg="true" success-content-id="btn_save_ticket_table_show">
    {{ csrf_field() }} 
  <div id="ticket_details_show">
    @if (!empty($memberShipDetail)) 
       
        
        @include('admin.library.memberShipDetails.member_ship_type_ticket_details')
    
                  
     
    @endif 
  </div>
  <div id="btn_save_ticket_table_show">
    
  </div>
</div>
<script type="text/javascript">
     $(document).ready(function(){
        $('#btn_click_ticket_details_show').click(function(){
          $('#btn_click_ticket_details_show').hide();
            
          });
        }); 
  </script>
