<form action="{{ route('admin.staff.teacher.mapping.store') }}" method="post" class="add_form" button-click="btn_mapping_show">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4 form-group">
                <label>Class</label>
                <select name="class" class="form-control select2">
                  <option selected disabled>Select Class</option>
                  @foreach ($sections as $section)
                  @if (in_array($section->id,$TeacherClassAssignsectionId)) 
                  @else
                  <option value="{{ $section->id }}">{{ $section->classes->name or ''}}--{{ $section->sectionTypes->name or '' }}</option>  
                  @endif 
                  @endforeach
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                <label>Teacher</label>
                <select name="staff" class="form-control select2">
                  <option selected disabled>Select Teacher</option> 
                  @foreach ($StaffDetails as $StaffDetail)
                  @if (in_array($StaffDetail->id,$TeacherClassAssignstaffId)) 
                  @else
                  <option value="{{ $StaffDetail->id }}">{{ $StaffDetail->name }}--{{ $StaffDetail->code }}</option>
                  @endif  
                  @endforeach
                </select> 
              </div>
              <div class="col-lg-4 form-group">
                 <input type="submit" class="form-control btn btn-primary" value="Save" style="margin-top: 22px">
              </div> 
          </form>
          <div class="table-responsive col-lg-12" style="margin-top: 20px">
            <table class="table table-striped table-bordered" id="mapping_table">
              <thead>
                <tr>
                  <th>Class</th>
                  <th>Teacher Name</th>
                  <th>Teacher Code</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($TeacherClassAssigns as $TeacherClassAssign)
                <tr>
                  <td>{{ $TeacherClassAssign->sections->classes->name or '' }}--{{ $TeacherClassAssign->sections->sectionTypes->name or '' }}</td>
                  <td>{{ $TeacherClassAssign->employees->name or '' }}</td>
                  <td>{{ $TeacherClassAssign->employees->code or '' }}</td>
                   
                </tr> 
                @endforeach
              </tbody>
            </table>
             
           </div>
           </div> 