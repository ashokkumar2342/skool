   
<div class="modal-dialog" style="width:70%"> 
<div class="modal-content">
  <div class="modal-header"> 
    <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
      <h4 align="center"><b>Lesson Plan Edit</b></h4>
      </div>
     <div class="modal-body">
        <form action="{{ route('admin.teacher.lesson.plan.update',$lessonPlans->id) }}" method="post" class="add_form" button-click="btn_close,btn_appoinment">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-lg-4">
          <label>Class</label>
          <select name="class_id" class="form-control">
            <option selected disabled>Select Class</option>
            @foreach ($classTypes as $classType)
              <option value="{{ $classType->id }}" {{ $classType->id==$lessonPlans->class_id? 'selected' : '' }}>{{ $classType->name }}</option> 
            @endforeach
          </select>
        </div> 
        <div class="col-lg-4">
          <label>Subject</label>
          <select name="subject_id" class="form-control">
            <option selected disabled>Select Subject</option>
            @foreach ($subjectTypes as $subjectType)
              <option value="{{ $subjectType->id }}"{{ $subjectType->id==$lessonPlans->subject_id? 'selected' : '' }}>{{ $subjectType->name }}</option> 
              
            @endforeach
          </select> 
        </div> 
        <div class="col-lg-4">
          <label>Lecture No</label>
          <input type="test" name="lecture_no" class="form-control" value="{{ $lessonPlans->lecture_no }}"> 
        </div> 
        <div class="col-lg-12">
          <label>Topic Covered</label>
          <textarea class="form-control" name="topic_covered">{{ $lessonPlans->topic_covered }}</textarea>
        </div>
        <div class="col-lg-12 text-center">
          <input type="submit" class="btn btn-success" style="margin-top: 20px">
           
         </div> 
      </div>
       
       
     </form>    
    </div>
  </div>  

</div>
