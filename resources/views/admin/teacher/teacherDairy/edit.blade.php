   
<div class="modal-dialog" style="width:70%"> 
<div class="modal-content">
  <div class="modal-header"> 
    <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
      <h4 align="center"><b>Teacher Adjust List</b></h4>
      </div>
     <div class="modal-body">
        <form action="{{ route('admin.teacher.appointment.update',$appointments->id) }}" method="post" class="add_form" button-click="btn_close,btn_appoinment">
      {{ csrf_field() }}
      <div class="row">
        {{-- <div class="col-lg-4">
          <label>User Name</label>
          <select name="user_id" class="form-control">
            <option selected disabled>Select User</option>
            @foreach ($admins as $admin)
            <option value="{{ $admin->id }}">{{ $admin->first_name }}</option> 
            @endforeach
          </select> 
        </div> --}}
        <div class="col-lg-4">
          <label>From Date Time</label>
          <input type="date" name="from_date" class="form-control" value="{{ $appointments->from_date }}"> 
        </div>
        <div class="col-lg-4">
          <label>To Date Time</label>
          <input type="date" name="to_date" class="form-control" value="{{ $appointments->to_date }}"> 
        </div>
        <div class="col-lg-4">
          <label>Subject</label>
          <select name="subject_id" class="form-control">
            <option selected disabled>Select Subject</option>
            @foreach ($subjectTypes as $subjectType)
              <option value="{{ $subjectType->id }}"{{ $appointments->subject_id==$subjectType->id? 'selected' : '' }}>{{ $subjectType->name }}</option> 
              
            @endforeach
          </select> 
        </div>
        <div class="col-lg-12">
          <label>Venue</label>
          <textarea class="form-control" name="venue">{{$appointments->venue }}  </textarea>
        </div>
        <div class="col-lg-12 text-center">
          <input type="submit" value="Udate" class="btn btn-success" style="margin-top: 20px">
           
         </div> 
      </div>
        
       
     </form>    
    </div>
  </div>  

</div>
