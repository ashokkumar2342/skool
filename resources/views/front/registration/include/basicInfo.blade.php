{{ Form::open(['route'=>'admin.student.post']) }} 
                         <div class="row">{{--row start --}}
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <div class="col-md-12">
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('student_name','Student Name',['class'=>' control-label']) }}                         
                                                {{ Form::text('student_name','',['class'=>'form-control',' required']) }}
                                                <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                            </div>
                                        </div>  
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('nick_name','Nick Name',['class'=>' control-label']) }}                         
                                                {{ Form::text('nick_name','',['class'=>'form-control']) }}
                                                <p class="text-danger">{{ $errors->first('nick_name') }}</p>
                                            </div>
                                        </div>
                                                              
                              <div class="row">{{--row start --}}
                                 <div class="col-md-12 ">
                                     <div class="form-group">
                                         <div class="col-md-12">                                          
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                     {!! Form::select('class',$classes,null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                     <p class="text-danger">{{ $errors->first('session') }}</p>
                                                 </div>
                                             </div>
                                           
                                             <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('date_of_admission','Date of Admission',['class'=>' control-label']) }}   
                                                     <div class="input-group">
                                                       <div class="input-group-addon">
                                                         <i class="fa fa-calendar"></i>
                                                       </div>                          
                                                     {{ Form::text('date_of_admission','',array('class' => 'form-control datepicker',' required' )) }}
                                                     </div>
                                                     <p class="text-danger">{{ $errors->first('date_of_admission') }}</p>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('date_of_leaving','Date of Leaving',['class'=>' control-label']) }}   
                                                     <div class="input-group">
                                                       <div class="input-group-addon">
                                                         <i class="fa fa-calendar"></i>
                                                       </div>                          
                                                     {{ Form::text('date_of_leaving','',array('class' => 'form-control datepicker' )) }}
                                                     </div>
                                                     <p class="text-danger">{{ $errors->first('date_of_leaving') }}</p>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('date_of_activation','Date of Activation',['class'=>' control-label']) }}   
                                                     <div class="input-group">
                                                       <div class="input-group-addon">
                                                         <i class="fa fa-calendar"></i>
                                                       </div>                          
                                                     {{ Form::text('date_of_activation','',array('class' => 'form-control datepicker',' required' )) }}
                                                     </div>
                                                     <p class="text-danger">{{ $errors->first('date_of_activation') }}</p>
                                                 </div>
                                             </div>
                                              
                                         </div>
                                     </div>
                                 </div>
                              </div> {{--row end --}}
                             
                                             <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('father_mobile','Father Mobile Number',['class'=>' control-label']) }}                         
                                                     {{ Form::text('father_mobile','',['class'=>'form-control ',' required']) }}
                                                     <p class="text-danger">{{ $errors->first('father_mobile') }}</p>
                                                      
                                                 </div>
                                             </div>
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('mother_mobile','Mother Mobile Number',['class'=>' control-label']) }}                         
                                                     {{ Form::text('mother_mobile','',['class'=>'form-control ',' required']) }}
                                                     <p class="text-danger">{{ $errors->first('mother_mobile') }}</p>
                                                 </div>
                                             </div>
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('email','Email Id',['class'=>' control-label']) }}
                                                     {{ Form::text('email','',['class'=>'form-control']) }}
                                                     <p class="text-danger">{{ $errors->first('email') }}</p>
                                                 </div>
                                             </div>  
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('date_of_birth','Date of Birth',['class'=>' control-label']) }}      
                                                     <div class="input-group">
                                                       <div class="input-group-addon">
                                                         <i class="fa fa-calendar"></i>
                                                       </div>                   
                                                         {{ Form::text('date_of_birth','',['class'=>'form-control datepicker','required']) }}
                                                     </div>
                                                    
                                                     <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                                 </div>
                                             </div> 
                                               <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                                     {!! Form::select('gender',$genders, $default->genders->id, ['class'=>'form-control','placeholder'=>'Select Gender','required']) !!}
                                                     <p class="text-danger">{{ $errors->first('gender') }}</p>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                                     {!! Form::select('religion',$religions, null, ['class'=>'form-control','placeholder'=>'Select Religion','required']) !!}
                                                     <p class="text-danger">{{ $errors->first('religion') }}</p>
                                                 </div>
                                             </div>
                                             <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('category','Category',['class'=>' control-label']) }}
                                                     {!! Form::select('category',$categories,null, ['class'=>'form-control','placeholder'=>'Select Religion','required']) !!}
                                                     <p class="text-danger">{{ $errors->first('category') }}</p>
                                                 </div>
                                             </div>
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('state','State',['class'=>' control-label']) }}
                                                     {!! Form::text('state', $default->state, ['class'=>'form-control','required']) !!}
                                                     <p class="text-danger">{{ $errors->first('state') }}</p>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>{{--row end --}}   
                             
                              <div class="row">{{--row start --}}
                                 <div class="col-md-12 ">
                                     <div class="form-group">
                                         <div class="col-md-12">
                                             <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('city','City',['class'=>' control-label']) }}
                                                     {!! Form::text('city',$default->city, ['class'=>'form-control','required']) !!}
                                                     <p class="text-danger">{{ $errors->first('city') }}</p>
                                                 </div>
                                             </div>
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('p_address','Permanent Address',['class'=>'control-label']) }}
                                                      {{ Form::textarea('p_address','',['class'=>'form-control','rows'=>2  ,'style'=>'resize:none']) }}
                                                      <p class="text-danger">{{ $errors->first('p_address') }}</p>
                                                 </div>
                                             </div>
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('c_address',' Correspondence Address',['class'=>'control-label']) }}
                                                      {{ Form::textarea('c_address','',['class'=>'form-control', 'rows'=>2 ,'style'=>'resize:none']) }}
                                                      <p class="text-danger">{{ $errors->first('c_address') }}</p>
                                                 </div>
                                             </div>
                                              <div class="col-lg-3">                         
                                                 <div class="form-group">
                                                     {{ Form::label('pincode','Pincode',['class'=>' control-label']) }}                         
                                                     {{ Form::text('pincode',$default->pincode,array('class' => 'form-control' )) }}
                                                     <p class="text-danger">{{ $errors->first('pincode') }}</p>
                                                 </div>
                                             </div>  
                                             
                                         </div>
                                     </div>
                                 </div>
                             </div> {{--row end --}}               
                              
                         
                              <div class="row">
                         <div class="col-md-12 text-center">
                             <button class="btn btn-success">Submit</button>
                         </div>
                     </div>
                             
                         {{ Form::close() }}