<div class="col-lg-3">
                <label>Class</label>
                <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
                   <option disabled selected>Select Class</option>
                   @foreach ($classTypes as $classType)
                    <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                   @endforeach
                 </select> 
              </div> 
              <div class="col-lg-3">
                <label>Section</label>
                 <select name="section_id" class="form-control" id="section_div"> 
                 </select> 
              </div>