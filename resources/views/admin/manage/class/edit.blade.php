 
 <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$classes?'Edit':'Add' }} Class</h4>
      </div>
        <form action="{{route('admin.class.update',@$classes->id)}}" no-reset="true" class="add_form" button-click="btn_close" content-refresh="dataTable">
          {{csrf_field()}}
      <div class="modal-body">
      
         <div class="col">             
          <div class="form-group">
          {!! Form::label('name', 'Class Name : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('name', @$classes->name, ['class'=>"form-control",'placeholder'=>"Enter Class Name",'autocomplete'=>'off','maxlength'=>'20']) !!}
            <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('code', 'Class Code :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('code', @$classes->alias, ['class'=>"form-control",'placeholder'=>"Enter Class Code",'autocomplete'=>'off','maxlength'=>'5']) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
            </div>
          </div> 
          <div class="form-group">
          {!! Form::label('shorting_id', 'Sorting Order No :', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('shorting_id', @$classes->shorting_id, ['class'=>"form-control",'placeholder'=>"Enter Sorting Order No",'autocomplete'=>'off','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) !!}
            <p class="text-danger">{{ $errors->first('shorting_id') }}</p>
            </div>
          </div>    

                 
         </div>
         
         
      </div>
     <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>

         </div>
         {!! Form::close() !!}
       

  </div>
</div>