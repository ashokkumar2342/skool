  @if ($reportforId==3)
 <div class="col-lg-4"> 
 <label>Class</label><br>
 <select name="class_id[]" class="multiselect" multiple="multiple" > 
 	@foreach ($classTypes as $classType) 
 	<option value="{{ $classType->id }}">{{ $classType->name }}</option>
 	@endforeach 
 </select>
 </div>
 @endif
 @if ($reportforId==2)
 <div class="col-lg-4"> 
 <label>Registration No</label><br>
 <select name="registration_no" class="form-control select2"> 
 	@foreach ($students as $studen) 
 	<option value="{{ $studen->id }}">{{ $studen->registration_no }}</option>
 	@endforeach 
 </select>
 </div> 
 @endif
  @if ($reportforId==4)
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
              @endif