<form action="{{ route('admin.registration.report.post') }}" data-table-without-pagination="report_dataTable" success-content-id="report_result" method="post" no-reset="true" accept-charset="utf-8" id="report_form" class="add_form">
                            {{ csrf_field() }}
                        <div class="col-md-12">  
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    
                                      {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                                         {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control']) }}
                                        <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                   </div>     
                                </div>
                                <div class="col-lg-3">                         
                                <div class="form-group">
                                    {{ Form::label('report_for','Report For',['class'=>' control-label']) }}
                                    {!! Form::select('report_for',[                   
                                                         
                                                        7=>'all',
                                                        1=>'Class',
                                                        2=>'Category',
                                                        3=>'Religion',
                                                        4=>'Gender',
                                                        5=>'Income Slab',
                                                        6=>'Profession',
                                                        
                                        ], null, ['class'=>'form-control','placeholder'=>'Select','required']) !!}
                                    <p class="text-danger">{{ $errors->first('report_for') }}</p>
                                </div>
                                 
                            </div>
                            <div class="col-lg-3" id="class">                         
                                <div class="form-group">  
                             {{ Form::label('class','Class',['class'=>' control-label']) }}
                               <select name="class" id="classgroup" class="form-control">
                                     <option value="">Select</option>  
                                    @foreach (App\Model\ClassType::all() as $class)
                                       <option value="{{ $class->id }}">{{ $class->name }}</option> 
                                     @endforeach 
                               </select>
                                </div>
                            </div>
                            <div class="col-lg-3" id="cate" >                                                   
                                <div class="form-group">
                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select</option>
                                      @foreach (App\Model\Category::all() as $category)                                            
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>                                  
                                      @endforeach 
                                    </select>                                    
                                </div>
                            </div> 
                             <div class="col-lg-3" id="rel" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                    <select name="religion" id="religion" class="form-control">
                                     {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                     @foreach (App\Model\Religion::all() as $religion)                                            
                                           <option value="{{ $religion->id }}">{{ $religion->name }}</option>                                  
                                     @endforeach 
                                 </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="gen" style="display:none"> 
                                <div class="form-group">
                                    {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                    <select name="gender" id="gender" class="form-control">
                                     {{ Form::label('gender','gender',['class'=>' control-label']) }}
                                     @foreach (App\Model\Gender::all() as $gender)                                            
                                           <option value="{{ $gender->id }}">{{ $gender->genders }}</option>                                  
                                     @endforeach 
                                    </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="incomeSlab" style="display:none"> 
                                <div class="form-group">
                                    {{ Form::label('incomeSlab','Income Slab',['class'=>' control-label']) }}
                                    <select name="incomeSlab" id="income" class="form-control">
                                      
                                     @foreach (App\Model\IncomeRange::all() as $range) 
                                           <option value="{{ $range->id }}">{{ $range->range }}</option> 
                                     @endforeach 
                                    </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="professions" style="display:none"> 
                                <div class="form-group">
                                    {{ Form::label('professions','Profession',['class'=>' control-label']) }}
                                    <select name="profession" id="profession" class="form-control">
                                      
                                     @foreach (App\Model\Profession::all() as $name) 
                                           <option value="{{ $name->id }}">{{ $name->name }}</option> 
                                     @endforeach 
                                    </select> 
                                 </div>
                             </div> 
                          
                            <div class="col-lg-3" id="se" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                      <select name="section" id="section" class="form-control"> 
                                    </select>
                                   
                                </div>
                            </div>
                             <div class="col-lg-3" style="padding-top: 20px;">                         
                                <div class="form-group">
                                  <button class="btn btn-success" id="btn_submit" type="submit">Show</button>
                                    
                                </div>
                            </div>
                        </div>

                    {{ Form::close() }}