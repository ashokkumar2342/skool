  <div class="form-group col-md-4">
    {{ Form::label('name','Parents Name',['class'=>' control-label','maxlength'=>'50']) }}                         
    {{ Form::text('name','',['class'=>'form-control',' required','maxlength'=>'50']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('education','Education',['class'=>' control-label','maxlength'=>'50']) }}                         
    {{ Form::text('education','',['class'=>'form-control','maxlength'=>'50']) }}
     
</div>
<div class="form-group col-md-4">
  {{ Form::label('occupation','Profession',['class'=>' control-label']) }}{!! Form::select('occupation',$professions, null, ['class'=>'form-control','placeholder'=>'Select Profession','required']) !!} 
</div> 

<div class="form-group col-md-4">
    {{ Form::label('income','Income Slab(Yearly)',['class'=>' control-label']) }}
    {!! Form::select('income',$incomes, null, ['class'=>'form-control','placeholder'=>'Select income','required']) !!}
    
</div>
<div class="form-group col-md-4">
    {{ Form::label('mobile','Mobile',['class'=>' control-label']) }}                         
    {{ Form::text('mobile','',['class'=>'form-control','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('email','email',['class'=>' control-label']) }}                         
    {{ Form::email('email','',['class'=>'form-control']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('dob','Date of Birth',['class'=>' control-label']) }}                         
    {{ Form::text('dob','',['class'=>'form-control datepicker']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('doa','Date of Anniversary',['class'=>' control-label ']) }}                         
    {{ Form::text('doa','',['class'=>'form-control datepicker']) }}
     
</div>                  
<div class="form-group col-md-4">
    {{ Form::label('islive','IsLive',['class'=>' control-label']) }}                         
    {!! Form::select('islive',[
      '0'=>'No',
      '1'=>'Yes'                                                    
      ], null, ['class'=>'form-control']) !!}
      <p class="text-danger">{{ $errors->first('islive') }}</p>
  </div>
<div class="form-group col-md-8">
    {{ Form::label('office_address','Office Address',['class'=>' control-label']) }}                         
    {{ Form::textarea('office_address','',['class'=>'form-control','rows'=>2 ]) }}
     
</div>
  <div class="col-lg-12 text-center">

    <input type="submit" class="btn btn-success">
</div>  