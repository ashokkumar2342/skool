   
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medical Detail Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form id="medical-form" action="{{ route('admin.medical.update',$medicalInfo->id) }}"   method="post" button-click="btn_close,medical_info_tab" class="add_form">
             {{ csrf_field() }} 
                               
                    <div class="form-group col-md-4">
                         {{ Form::label('ondate','On Date',['class'=>' control-label']) }} 
                          
                         {{ Form::date('ondate',$medicalInfo->ondate,['class'=>'form-control datepicker']) }}
                         
                     </div>

                     <div class="form-group col-md-4">
                          {{ Form::label('bloodgroup_id','Blood Group',['class'=>' control-label']) }}
                           
                          {!! Form::select('bloodgroup_id',$bloodgroups,@$medicalInfo->bloodgroups->id,['class'=>'form-control','placeholder'=>'Select Blood Group','required']) !!}
                          
                     </div> 
                   <div class="form-group col-md-4">
                        {{ Form::label('hb','HB ',['class'=>' control-label']) }}                          
                        {{ Form::text('hb',$medicalInfo->hb,['class'=>'form-control','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','maxlength'=>'3']) }}
                        
                    </div>
                     <div class="form-group col-md-2">
                        {{ Form::label('bp','BP Lower',['class'=>' control-label ']) }}
                         
                        {{ Form::text('bp_lower',$medicalInfo->bp_lower,['class'=>'form-control','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','maxlength'=>'3']) }}
                        
                    </div> 
                    <div class="form-group col-md-2">
                        {{ Form::label('bp','BP Upper',['class'=>' control-label ']) }}
                         
                        {{ Form::text('bp_uper',$medicalInfo->bp_uper,['class'=>'form-control','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','maxlength'=>'3']) }}
                       
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('weight','Weight (In kg)',['class'=>' control-label','maxlength'=>'3']) }}      
                                            
                        {{ Form::text('weight',$medicalInfo->weight,['class'=>'form-control' ,'onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','maxlength'=>'3']) }}
                         
                    </div>
                     
                     <div class="form-group col-md-4">
                        {{ Form::label('height','Height (In cm)',['class'=>' control-label ' ,'maxlength'=>'3']) }} 
                                                 
                        {{ Form::text('height',$medicalInfo->height,['class'=>'form-control' ,'onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','maxlength'=>'3']) }}
                        
                    </div>
                    
                    <div class="form-group col-md-4">
                        {{ Form::label('vision','vision',['class'=>' control-label ']) }}                         
                        {{ Form::text('vision',$medicalInfo->vision,['class'=>'form-control ','maxlength'=>'50']) }}
                         
                    </div>
                    <div class="form-group col-md-4">
                      <label>Narration</label>
                      <input type="text" name="narration" class="form-control">
                      
                    </div> 
                  <div class="form-group col-md-4">
                       {{ Form::label('complextion','Complextion',['class'=>' control-label ']) }}     
                      <select name="complextion" class="form-control">
                        @foreach ($complextions as $complextion)
                          <option value="{{ $complextion->id }}">{{ $complextion->name }}</option>  
                        @endforeach
                      </select> 
                     </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('id_marks1','Id Marks1',['class'=>' control-label ']) }}
                         
                        {{ Form::text('id_marks1',$medicalInfo->id_marks1,['class'=>'form-control','maxlength'=>'200']) }}
                         
                    </div> 
                    <div class="form-group col-md-4">
                        {{ Form::label('id_marks2','Id Marks2',['class'=>' control-label ']) }}
                        {{ Form::text('id_marks2',$medicalInfo->id_marks2,['class'=>'form-control','maxlength'=>'200']) }}
                         
                    </div>
                     <div class="form-group col-md-4">
                        {{ Form::label('dental','Dental',['class'=>' control-label ']) }}
                        {{ Form::text('dental',$medicalInfo->dental,['class'=>'form-control']) }}
                        
                    </div>
                   
                   <div class="form-group col-md-4">
                        {{ Form::label('alergey','Alergey',['class'=>' control-label']) }} 
                         
                         <select name="alergey" id="alergey" class="form-control" onchange="showHideDiv(this.value,'alergey_vacc_div')">
                            <option value="0">No</option>
                            <option value="1">Yes</option> 
                          </select>
                         
                    </div>
                     
                    <div style="display: none" id="alergey_vacc_div">
                      <div  class="form-group col-md-4" >
                        {{ Form::label('isalgeric','Isalgeric ',['class'=>' control-label ']) }} 
                        <input type="text" name="isalgeric"  class="form-control" maxlength="50">   
                       
                       </div>
                    <div  class="form-group col-md-4" >
                        {{ Form::label('alergey_vacc','Alergey Vacc',['class'=>' control-label ']) }} 
                        <input type="text" name="alergey_vacc"  class="form-control" maxlength="50">   
                       
                  </div>
                </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('physical_handicapped','Physical Handicapped',['class'=>' control-label ']) }}
                         
                        <select name="physical_handicapped" onchange="showHideDiv(this.value,'narration_div')" class="form-control">
                          <option value="0">No</option>
                          <option value="1">Yes</option> 
                        </select>
                        
                    </div> 
                    <div style="display: none" id="narration_div"> 
                   
                    <div class="form-group col-md-4">
                        {{ Form::label('parcent','parcent',['class'=>' control-label ']) }}
                                                 
                        {{ Form::text('parcent','',['class'=>'form-control','maxlength'=>'3']) }}
                       
                    </div>  
                    <div class="form-group col-md-4" >
                        {{ Form::label('ishandicapped','Ishandicapped',['class'=>' control-label ','maxlength'=>'5']) }}
                                                 
                        {{ Form::text('ishandicapped','',['class'=>'form-control ']) }}
                       
                    </div> 
                    </div>  
                    <div class="col-lg-12 text-center">
                    
                    <input type="submit" class="btn btn-success" value="Update">
                   </div>
                    </form>                     

                </div>
               
            </div>
       </div>
    </div>   
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
    