   
<div class="modal-dialog" style="width:70%"> 
<div class="modal-content">
  <div class="modal-header"> 
    <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
      <h4 align="center"><b>Teacher Diary</b></h4>
      </div>
     <div class="modal-body">
        <form action="{{ route('admin.teacher.diary.details') }}" method="post" class="add_form" button-click="btn_appoinment" success-content-id="diary_details">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-lg-6">
          <label>Teacher</label>
          <select name="teacher_id" class="form-control" onchange="callAjax(this,'')">
            <option selected disabled>Select Teacher Name</option>
            @foreach ($TeacherFacultys as $TeacherFaculty)
              <option value="{{ $TeacherFaculty->id }}">{{ $TeacherFaculty->name }}</option> 
            @endforeach
          </select> 
        </div>
        <div class="col-lg-6">
          <label>Ondate</label>
          <input type="date" name="ondate" class="form-control"> 
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 20px"> 
          <input type="submit" value="Show" class="btn btn-success"> 
        </div>
        <div id="diary_details">
           
         </div> 
      </div>
       
       
     </form>    
    </div>
  </div>  

</div>
