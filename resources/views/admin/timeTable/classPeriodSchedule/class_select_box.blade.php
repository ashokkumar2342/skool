<div class="col-lg-3">
                      <label>Class</label></br>
                       <select name="class_id[]" class="form-control multiselect"  multiple="multiple"> 
                        @foreach ($classTypes as $classType) 
                          <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                        @endforeach 
                        </select> 
                    </div>