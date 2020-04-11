 <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$sectionType?'Edit':'Add' }} Section</h4>
      </div>
        <form action="{{route('admin.section.update',@$sectionType->id)}}" no-reset="true" class="add_form" button-click="btn_close" content-refresh="class_section">
          {{csrf_field()}}
      <div class="modal-body">
     
     
      		<div class="row">
            <div class="col">             
          <div class="form-group">
          {!! Form::label('name', 'Section Name : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('name', @$sectionType->name, ['class'=>"form-control",'placeholder'=>"Section Name",'autocomplete'=>'off','maxlength'=>'30',]) !!}
            <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('code', 'Section Code : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('code', @$sectionType->code,  ['class'=>"form-control",'placeholder'=>"Section Code",'autocomplete'=>'off','maxlength'=>'5',]) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
            </div>
          </div>
          <div class="form-group">
          {!! Form::label('sorting_order_id', 'Sorting Order No : ', ['class'=>"col-sm-3 control-label"]) !!}            
            <div class="col-sm-9">
            {!! Form::text('sorting_order_id', @$sectionType->sorting_order_id,  ['class'=>"form-control",'placeholder'=>"Sorting Order No",'autocomplete'=>'off','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
            </div>
          </div>
      	  
      		</div>
     
       
           
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success ">Submit</button>

         </div>
            </form>
    </div>
</div>
