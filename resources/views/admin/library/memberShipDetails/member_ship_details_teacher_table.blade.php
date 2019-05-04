 <div class="col-lg-4" id="library_member_ship_details_table">
  <label>Member Ship No</label>
                      <select name="teacher" class="form-control" onchange="callAjax(this,'{{ route('admin.library.member.ship.details.teacher.show') }}','library_member_ship_student_table')" >
                      	<option selected="" disabled="">Select Teacher Email</option>}
                      	option
                        @foreach ($teachers as $teacher) 
                        <option value="{{ $teacher->id }}">{{ $teacher->email or '' }}</option>
                        @endforeach 
                      </select>
 </div>
