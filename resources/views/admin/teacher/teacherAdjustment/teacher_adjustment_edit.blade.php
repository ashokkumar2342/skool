  <style type="text/css" media="screen">
      .bd{
        border-bottom: #eee solid 1px;;
    }

</style>

<div class="modal-dialog" style="width:40%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Teacher</h4>
    </div>
    <div class="modal-body">
     <div class="row"> 
      <form action="{{ route('admin.teacher.adjustment.update',$teacherAdjustment->id) }}" method="post" class="add_form" button-click="btn_close,teacher_absent_show" content-refresh="teacher_adjustment_result">
        {{ csrf_field() }} 
        <div class="col-lg-12">
           <h3><b> <span> {{ $teacherAdjustment->teacherFaculty->name or '' }}</span></b></h3>
           <label>Teacher Name</label>
           <select name="teacher" class="form-control">
            <option selected disabled >Select Teacher</option> 
            @foreach ($teacherFacultys as $teacherFaculty)
            <option value="{{ $teacherFaculty->teacher_id }}">{{ $teacherFaculty->teacherFaculty->name or '' }}</option>
            @endforeach
        </select> 
    </div>
    <div class="col-lg-12 text-center">

       <input type="submit" value="Update" class="btn btn-success btn-rounded" style="margin-top: 10px"> 
   </div>
</form> 


</div>

</div>
</div>
