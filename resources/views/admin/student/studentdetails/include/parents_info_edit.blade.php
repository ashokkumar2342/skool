  
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
        <h4 class="modal-title">Perent Info Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
         <form id="parents-form" action="{{ route('admin.parents.update',$parentsInfo->id) }}" class="add_form" method="post" button-click="btn_close,parent_info">
                    <div class="form-group col-md-4">
                         {{ Form::label('relation_type_id','Parents',['class'=>' control-label']) }}
                         {!! Form::select('relation_type_id',$parentsType, $parentsInfo->relation_type_id, ['class'=>'form-control','placeholder'=>'Select Parents','required']) !!}
                         <p class="text-danger">{{ $errors->first('parents') }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('name','Parents Name',['class'=>' control-label','maxlength'=>'50']) }}                         
                        {{ Form::text('name',$parentsInfo->name ,['class'=>'form-control',' required','maxlength'=>'50']) }}
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('education','Education',['class'=>' control-label','maxlength'=>'50']) }}                         
                        {{ Form::text('education',$parentsInfo->education ,['class'=>'form-control','maxlength'=>'50']) }}
                        <p class="text-danger">{{ $errors->first('education') }}</p>
                    </div>
                    <div class="form-group col-md-4">
                      {{ Form::label('occupation','Profession',['class'=>' control-label']) }}{!! Form::select('occupation',$professions, $parentsInfo->occupation, ['class'=>'form-control','placeholder'=>'Select Profession','required']) !!} 
                    </div>                                        
                   <div class="form-group col-md-4">
                        {{ Form::label('income','Income Range',['class'=>' control-label']) }}
                        {!! Form::select('income',$incomes, $parentsInfo->income_id, ['class'=>'form-control','placeholder'=>'Select income','required']) !!}
                        <p class="text-danger">{{ $errors->first('income') }}</p>
                   </div>
                   <div class="form-group col-md-4">
                        {{ Form::label('mobile','Mobile',['class'=>' control-label']) }}                         
                        {{ Form::text('mobile',$parentsInfo->mobile ,['class'=>'form-control','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
                        <p class="text-danger">{{ $errors->first('mobile') }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('email','email',['class'=>' control-label']) }}                         
                        {{ Form::email('email',$parentsInfo->email ,['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                     <div class="form-group col-md-4">
                        {{ Form::label('dob','Date of Birth',['class'=>' control-label']) }}                         
                        {{ Form::text('dob',$parentsInfo->dob ,['class'=>'form-control datepicker']) }}
                        <p class="text-danger">{{ $errors->first('dob') }}</p>
                    </div>
                     <div class="form-group col-md-4">
                        {{ Form::label('doa','Date of Anniversary',['class'=>' control-label ']) }}                         
                        {{ Form::text('doa',$parentsInfo->doa ,['class'=>'form-control datepicker']) }}
                        <p class="text-danger">{{ $errors->first('doa') }}</p>
                    </div>                  
                    <div class="form-group col-md-8">
                        {{ Form::label('office_address','Office Address',['class'=>' control-label']) }}                         
                        {{ Form::textarea('office_address',$parentsInfo->office_address,['class'=>'form-control','rows'=>2 ]) }}
                        <p class="text-danger">{{ $errors->first('office_address') }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('islive','IsLive',['class'=>' control-label']) }}                         
                        {!! Form::select('islive',[
                          '0'=>'No',
                          '1'=>'Yes'                                                    
                          ], null, ['class'=>'form-control']) !!}
                        <p class="text-danger">{{ $errors->first('islive') }}</p>
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
       