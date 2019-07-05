 <div class="col-lg-4"> 
                 <label>Class</label>
                 <select name="class" class="form-control" id="class_id" onchange="callAjax(this,'{{ route('admin.teacher.class.wise.section') }}','class_wise_section')">
                   <option selected disabled>Select Class</option> 
                   @foreach ($teacherFacultys as $teacherFaculty) 
                   <option value="{{ $teacherFaculty->class_id }}">{{ $teacherFaculty->classTypes->name or '' }}</option> 
                    @endforeach 
                 </select> 
                 </div>