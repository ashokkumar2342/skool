<div class="col-lg-4">
                <label>Registration No</label>
                <select name="registration_no"  id="registration_no" class="form-control select2" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_div')">
                   <option disabled selected>Select Class</option>
                   @foreach ($registrations as $registration)
                    <option value="{{ $registration->id }}">{{ $registration->registration_no }}</option>
                   @endforeach
                 </select> 
              </div>
              