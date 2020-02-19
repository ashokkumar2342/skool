 
                <form action="{{ route('admin.homework.post') }}" class="add_form"  method="post" content-refresh="homework_table">
                {{ csrf_field() }}                                      
                   <div class="col-lg-2">
                    <div class="form-group">  
                          <select name="class" class="form-control" onchange="callAjax(this,'{{ route('admin.teacher.class.wise.section.addForm') }}','section_id_div')">
                            <option selected disabled>Select Class</option>
                            @foreach($classTypes as $classType)
                            <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group" id="section_id_div">
                          <select  class="form-control">
                            <option selected disabled>Select Section</option> 
                          </select>
                        </div>
                        <div class="form-group">
                          {!! Form::text('date', date('d-m-Y')  , ['class'=>'form-control datepicker','id'=>'date','placeholder'=>'Date','required']) !!}
                          <p class="text-danger">{{ $errors->first('section') }}</p>
                        </div>
                        <div class="form-group">
                          {!! Form::file('homework_doc', ['class'=>'form-control','id'=>'homework_doc','placeholder'=>'homework_doc']) !!}
                          <p class="text-danger">{{ $errors->first('homework_doc') }}</p>
                        </div>
                    </div>                     
                    <div class="col-lg-10">                         
                        <div class="form-group">
                          <textarea class="form-control summernote" name="homework" style="height: 120px;width: 636px"></textarea>
                        </div>
                    </div>
              <div class="row">
                 <div class="col-md-12 text-center">
                     <button class="btn btn-success" type="submit" id="btn_homework">Create Homework</button>
                 </div>
             </div>                     
           </form>
      