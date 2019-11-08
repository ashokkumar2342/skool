<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }

  
}
   
</style>
  <div class="form-group col-md-4">
    {{ Form::label('name','Parents Name',['class'=>' control-label']) }} 
     <span class="fa fa-asterisk"></span>                       
    {{ Form::text('name','',['class'=>'form-control',' required','maxlength'=>'50']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('education','Education',['class'=>' control-label']) }} 
     <span class="fa fa-asterisk"></span>                       
    {{ Form::text('education','',['class'=>'form-control',' required','maxlength'=>'50']) }}
     
</div>
<div class="form-group col-md-4">
  {{ Form::label('profession','Profession',['class'=>' control-label']) }}
  <span class="fa fa-asterisk"></span>
  {!! Form::select('profession',$professions, null, ['class'=>'form-control','placeholder'=>'Select Profession','required']) !!} 
</div> 

<div class="form-group col-md-4">
    {{ Form::label('income','Income Slab(Yearly)',['class'=>' control-label']) }}
    <span class="fa fa-asterisk"></span>
    {!! Form::select('income',$incomes, null, ['class'=>'form-control','placeholder'=>'Select income','required']) !!}
    
</div>
<div class="form-group col-md-4">
    {{ Form::label('mobile','Mobile No',['class'=>' control-label']) }}
    <span class="fa fa-asterisk"></span>                         
    {{ Form::text('mobile','',['class'=>'form-control','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57',' required']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('email','E-mail ID',['class'=>' control-label']) }} 
    <span class="fa fa-asterisk"></span>                        
    {{ Form::email('email','',['class'=>'form-control','maxlength'=>'50',' required']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('dob','Date of Birth',['class'=>' control-label']) }}
    <span class="fa fa-asterisk"></span>                         
    {{ Form::date('dob','',['class'=>'form-control ',' required']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('doa','Date of Anniversary',['class'=>' control-label ']) }}
    <span class="fa fa-asterisk"></span>                         
    {{ Form::date('doa','',['class'=>'form-control ',' required']) }}
     
</div>                  
<div class="form-group col-md-4">
    {{ Form::label('islive','IsLive',['class'=>' control-label']) }}
    <span class="fa fa-asterisk"></span>                         
    {!! Form::select('islive',[
      '1'=>'Yes',                                                    
      '0'=>'No'
      ], null, ['class'=>'form-control']) !!}
      <p class="text-danger">{{ $errors->first('islive') }}</p>
  </div>
<div class="form-group col-md-12">
    {{ Form::label('office_address','Office Address',['class'=>' control-label']) }}
                            
    {{ Form::textarea('office_address','',['class'=>'form-control','rows'=>2,'maxlength'=>'200' ]) }}
     
</div>
  <div class="col-lg-12 text-center">

    <input type="submit" class="btn btn-success">
</div>  