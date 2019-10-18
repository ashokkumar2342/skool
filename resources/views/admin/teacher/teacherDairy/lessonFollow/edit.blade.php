   
<div class="modal-dialog" style="width:70%"> 
<div class="modal-content">
  <div class="modal-header"> 
    <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
      <h4 align="center"><b>Lesson Plan Follow Edit</b></h4>
      </div>
     <div class="modal-body">
        <form action="{{ route('admin.teacher.lesson.plan.follow.update',$lessonPlanFollows->id) }}" method="post" class="add_form" button-click="btn_close,btn_appoinment">
      {{ csrf_field() }}
      <div class="row">
        <div class="form-group   col-lg-4"> 
          <label>Class</label>
            <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
               <option disabled selected>Select Class</option>
               @foreach ($classTypes as $classType)
                <option value="{{ $classType->id }}"{{ $lessonPlanFollows->class_id==$classType->id? 'selected' : '' }}>{{ $classType->name }}</option>
               @endforeach
             </select> 
          </div> 
          <div class="form-group   col-lg-4">
            <label>Section</label>
             <select name="section_id" class="form-control" id="section_div"> 
             </select> 
          </div>
        <div class="form-group   col-lg-4">
          <label>Subject</label>
          <select name="subject_id" class="form-control">
            <option selected disabled>Select Subject</option>
            @foreach ($subjectTypes as $subjectType)
              <option value="{{ $subjectType->id }}"{{ $lessonPlanFollows->subject_id==$subjectType->id? 'selected' : '' }}>{{ $subjectType->name }}</option> 
            @endforeach
          </select> 
        </div> 
        <div class="form-group   col-lg-4">
          <label>Teacher</label>
          <select name="teacher_id" class="form-control">
            <option selected disabled>Select Teacher Name</option>
            @foreach ($TeacherFacultys as $TeacherFaculty)
              <option value="{{ $TeacherFaculty->id }}"{{ $lessonPlanFollows->teacher_id==$TeacherFaculty->id? 'selected' : '' }}>{{ $TeacherFaculty->name }}</option> 
            @endforeach
          </select> 
        </div>
        <div class="form-group   col-lg-4">
          <label>Lesson Plan</label>
          <select name="lesson_plan_id" class="form-control">
            <option selected disabled>Select Lesson Plan</option>
            @foreach ($lessonPlans as $lessonPlan)
              <option value="{{ $lessonPlan->id }}"{{ $lessonPlanFollows->lesson_plan_id==$lessonPlan->id? 'selected' : '' }}>{{ $lessonPlan->topic_covered }}</option> 
            @endforeach
          </select> 
        </div> 
        <div class="form-group   col-lg-4">
          <label>Ondate</label>
          <input type="date" name="ondate" class="form-control" value="{{ $lessonPlanFollows->ondate }}"> 
        </div> 
        
        <div class="form-group   col-lg-12 text-center">
          <input type="submit" value="Update" class="btn btn-success" style="margin-top: 20px">
           
         </div> 
      </div>
       
       
     </form>    
    </div>
  </div>  

</div>
