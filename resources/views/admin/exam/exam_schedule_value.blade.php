<option value="" selected disabled>Select Exam Schedule</option>

                             @foreach ($examSchedules as $examSchedule)
                                <option value="{{ $examSchedule->id }}">Class: {{ $examSchedule->classes->name }},  &nbsp;&nbsp;&nbsp; Subject: {{ $examSchedule->subjects->name }}</option>
                             @endforeach 