 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subject Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form action="{{ route('admin.subjectType.update',$subjects->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="dataTable" >
              {{ csrf_field() }}
              <div class="row"> 
                 <div class="col"> 
                <div class="form-group">
                  {!! Form::label('SubjectName', 'Subjcet Name  ', ['class'=>"col-sm-3 control-label"]) !!}            
                 <div class="form-group col-sm-9">
                  {!! Form::text('name',@$subjects->name, ['class'=>"form-control",'placeholder'=>"Subject Name",'autocomplete'=>'off','maxlength'=>'50',]) !!}
                  <p class="text-danger">{{ $errors->first('name') }}</p>
                 </div>
               </div>
                <div class="form-group">
          {!! Form::label('Subject Code', ' Subject Code ', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="form-group col-sm-9">
            {!! Form::text('code', @$subjects->code, ['class'=>"form-control",'placeholder'=>"Subject Code",'autocomplete'=>'off','maxlength'=>'10',]) !!}
            <p class="text-danger">{{ $errors->first('code') }}</p>
            </div>
          </div>
                <div class="form-group">
          {!! Form::label('Code', 'Sorting Order No ', ['class'=>"col-sm-3 control-label"]) !!}
            <div class="col-sm-9">
            {!! Form::text('sorting_order_id', @$subjects->sorting_order_id, ['class'=>"form-control",'placeholder'=>"Sorting Order No",'autocomplete'=>'off','maxlength'=>'2','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) !!}
            <p class="text-danger">{{ $errors->first('sorting_order_id') }}</p>
            </div>
          </div>
        </div>
      </div>
          <div class="modal-footer"> 
            <a class="btn btn-default" onclick="$('#btn_close').click()" >Close</a>
            <button type="submit" class="btn btn-success ">Submit</button> 
         </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

               
             