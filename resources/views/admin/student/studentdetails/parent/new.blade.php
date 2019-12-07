<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }

  
}
   
</style>
  <div class="form-group col-md-4">
    {{ Form::label('name','Name',['class'=>' control-label']) }} 
      <span class="fa fa-asterisk"></span>                      
    {{ Form::text('name','',['class'=>'form-control','maxlength'=>'50']) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('education','Education',['class'=>' control-label']) }} 
                            
    {{ Form::text('education','',['class'=>'form-control','maxlength'=>'50']) }}
     
</div>
<div class="form-group col-md-4">
  {{ Form::label('profession','Profession',['class'=>' control-label']) }}
  
  {!! Form::select('profession',$professions, null, ['class'=>'form-control','placeholder'=>'Select Profession','required']) !!} 
</div> 

<div class="form-group col-md-4">
    {{ Form::label('income','Annual Income',['class'=>' control-label']) }}
    
    {!! Form::select('income',$incomes, null, ['class'=>'form-control','placeholder'=>'Select income','required']) !!}
    
</div>
<div class="form-group col-md-4">
    {{ Form::label('mobile','Mobile No.',['class'=>' control-label']) }}
                             
    {{ Form::text('mobile','',['class'=>'form-control','maxlength'=>'10','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57' ]) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('email','Email',['class'=>' control-label']) }} 
                            
    {{ Form::email('email','',['class'=>'form-control','maxlength'=>'100' ]) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('dob','Date of Birth',['class'=>' control-label']) }}
                             
    {{ Form::date('dob','',['class'=>'form-control ' ]) }}
     
</div>
<div class="form-group col-md-4">
    {{ Form::label('doa','Date of Anniversary',['class'=>' control-label ']) }}
                             
    {{ Form::date('doa','',['class'=>'form-control ' ]) }}
     
</div>                  
<div class="col-lg-4">                         
<div class="form-group">
    {{ Form::label('islive','Alive',['class'=>' control-label']) }}
     <select name="islive" class="form-control" >
       <option value="1" {{ @$default->alive==1? 'selected' :'' }}>Yes</option> 
       <option value="2" {{ @$default->alive==2? 'selected' :'' }}>No</option> 
     </select>                       
     
    <p class="text-danger">{{ $errors->first('nationality') }}</p>
</div>
</div> 
<div class="form-group col-md-12">
    {{ Form::label('office_address','Office Address',['class'=>' control-label']) }}
                            
    {{ Form::textarea('office_address','',['class'=>'form-control','rows'=>2,'maxlength'=>'200' ]) }}
     
</div>
<div class="form-group col-md-12">
    {{ Form::label('organization_address','Organization Name',['class'=>' control-label']) }}
                            
    {{ Form::textarea('organization_address','',['class'=>'form-control','rows'=>2,'maxlength'=>'200' ]) }}
     
</div>
<div class="form-group col-md-12">
    {{ Form::label('f_designation','Designation',['class'=>' control-label']) }}
                            
    {{ Form::textarea('f_designation','',['class'=>'form-control','rows'=>2,'maxlength'=>'50' ]) }}
     
</div>
  <div class="col-lg-12 text-center">

    <input type="submit" class="btn btn-success">
</div>  