<div class="modal-dialog" style="width: 70%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Add</h4>
    </div>
    <div class="modal-body"> 
      <form class="add_form" content-refresh="route_table" action="{{ route('admin.exam.classtest.store') }}" method="post">              
        {{ csrf_field() }}
        <div class="row">                  
          <div class="col-lg-3 form-group">
            <label>Academic Year</label>
            <select name="academic_year_id" id="academic_year_id" class="form-control">
              <option selected disabled>Select Academic Year</option>
              @foreach ($academicYears as $academicYear)
              <option value="{{ $academicYear->id }}"{{ $academicYear->status==1?'selected':'' }}>{{ $academicYear->name }}</option> 
              @endforeach 
            </select>
          </div>
          <div class="col-lg-3 form-group">
            <label>Class</label>
            <select name="class_id" id="class_id2" class="form-control" onchange="callAjax(this,'{{ route('admin.exam.classtest.class.section.subject') }}','section_divs')">
              <option disabled selected>Select Class</option>
              @foreach ($classTypes as $classType)
              <option value="{{ $classType->id }}"{{ $classType->id==$class_id?'selected':'' }}>{{ $classType->name }}</option>
              @endforeach
            </select> 
          </div>
          <div id="section_divs"> 
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-4 form-group">
            <label>Test Date</label>
            <input type="date"  name="test_date" class="form-control"> 
          </div> 
          <div class="col-lg-4 form-group">
            <label>Max Marks</label>
            <input type="text"  name="max_marks" class="form-control"> 
          </div>
          <div class="col-lg-4 form-group">
            <label>Syllabus</label>
            <input type="file" name="sylabus" class="form-control"> 
          </div>
          <div class="col-lg-12 form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
          <div class="col-lg-4">
            <label>Is Include Term Exam</label>
            <input type="checkbox" name="is_include_term_exam" value="1">
            
          </div>
          <div class="col-lg-4 text-center form-group">
            <input type="submit" class="btn btn-success" style="width: 60%"> 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="">
   
   $('#class_id2').trigger('change');
   
</script>

