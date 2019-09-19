<div class="col-lg-4"> 
          <label>Class</label>
            <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')" disabled="">
               <option disabled selected>Select Class</option>
               @foreach ($classTypes as $classType)
                <option value="{{ $classType->id }}"{{ $lessonPlanFollows->class_id==$classType->id? 'selected' : '' }}>{{ $classType->name }}</option>
               @endforeach
             </select> 
          </div> 
          <div class="col-lg-4">
            <label>Section</label>
             <select name="section_id" class="form-control" id="section_div" disabled=""> 
             </select> 
          </div>
        <div class="col-lg-4">
          <label>Subject</label>
          <select name="subject_id" class="form-control" disabled="">
            <option selected disabled>Select Subject</option>
            @foreach ($subjectTypes as $subjectType)
              <option value="{{ $subjectType->id }}"{{ $lessonPlanFollows->subject_id==$subjectType->id? 'selected' : '' }}>{{ $subjectType->name }}</option> 
            @endforeach
          </select> 
        </div> 
        <div class="col-lg-6">
          <label>Topic To Be Covered</label>
          <select name="lesson_plan_id" class="form-control" disabled="" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
            <option selected disabled>Select Lesson Plan</option>
            @foreach ($lessonPlans as $lessonPlan)
              <option value="{{ $lessonPlan->id }}"{{ $lessonPlan->id==$lessonPlanFollows->lesson_plan_id? 'selected' : '' }}>{{ $lessonPlan->topic_covered }}</option> 
            @endforeach
          </select> 
        </div> 
        <div class="col-lg-6">
          <label>Topic Covered</label>
          <textarea class="form-control" name="topic_covered" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div> 
        
        <div class="col-lg-12 text-center">
          <input type="submit" class="btn btn-success" style="margin-top: 20px">
           
         </div> 