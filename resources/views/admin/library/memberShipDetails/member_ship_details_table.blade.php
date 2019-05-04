 <div class="col-lg-4" id="library_member_ship_details_table">
  <label>Member Ship No</label>
                      <select name="student_id" class="form-control" onchange="callAjax(this,'{{ route('admin.library.member.ship.details.student.show') }}','library_member_ship_student_table')" >
                        <option selected disabled>Select Registration No</option>}
                        option
                        @foreach ($students as $student) 
                        <option value="{{ $student->id }}">{{ $student->registration_no or '' }}</option>
                        @endforeach 
                      </select>
 </div>

