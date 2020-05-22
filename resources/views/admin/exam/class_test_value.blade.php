<div class="form-group">
                          {{ Form::label('class','Class Test',['class'=>' control-label']) }}
                           <select name="classTest" class="form-control" onchange="callAjax(this,'{{ route('admin.classdetail.studentSearch') }}','student_details_Result')">
                             <option value="" selected disabled>Select Class Test</option>
                             @foreach ($classTests as $classTest)
                                <option value="{{ $classTest->id }}">Class: {{ $classTest->classes->name }}, &nbsp;&nbsp;&nbsp;Section : {{ $classTest->sectionTypes->name }},&nbsp;&nbsp;&nbsp; Subject: {{ $classTest->subjects->name }}</option>
                             @endforeach 
                           </select>
                      </div>