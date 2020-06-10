<div class="modal-dialog"> 
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <form action="{{ route('admin.student.CharacterCertificateApplication.store') }}" method="post" class="add_form"  no-reset="true" button-click="btn_close,btn_studentshow">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-6 form-group">
              <label>Date of Birth</label>
              <input type="date" disabled="disabled" class="form-control disabled" value="{{ @$student->dob }}">
              <input type="hidden" name="student_id" class="form-control hidden" value="{{ @$student->id }}">
              <input type="hidden" name="dob" class="form-control hidden" value="{{ @$student->dob }}">
            </div>
            <div class="col-lg-6 form-group">
              <label>Pass Class</label>
              <select name="class_id" class="form-control">
                @foreach ($classTypes as $classType)
                <option value="{{ $classType->id }}">{{ $classType->name }}</option>  
                @endforeach
            </select>
            </div> 
            <div class="col-lg-6 form-group">
              <label>Exam Roll No.</label>
              <input type="text" name="Exam_Roll_No" class="form-control">
            </div>
            <div class="col-lg-6 form-group">
              <label>Exam Held On</label>
              <input type="text" name="Exam_Held_On" class="form-control">
            </div>
            <div class="col-lg-6 form-group">
              <label>Extra Activity</label>
              <input type="text" name="Extra_Activity" class="form-control" value="{{ @$sportsActivityName->sports_activity_name }}">
            </div>
            <div class="col-lg-6 form-group">
              <label>Character Type</label>
              <input type="text" name="Character_Type" class="form-control">
            </div>
            @php
                $date=date('Y-m-d');
            @endphp
            <div class="col-lg-6 form-group">
              <label>Application Date</label>
              <input type="date" name="Application_Date" class="form-control" value="{{ $date }}">
            </div>
            {{-- <div class="col-lg-6 form-group">
              <label>Issue Date</label>
              <input type="text" name="Issue_Date" class="form-control">
            </div> --}}
            <div class="col-lg-6 form-group">
              <label>Application Attach</label>
              <input type="file" name="application_attach" class="form-control">
            </div>
             <div class="col-lg-12 form-group text-center">
              <input type="submit" class="btn btn-success" style="margin-top: 24px">
            </div>
          </div>
        </form> 
        </div> 
    </div> 
</div>
</div>


