<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Sibling Info</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.sibling.add',$student->id) }}" method="post" class="add_form" button-click="btn_close,sibling_info_tab">
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('student_sibling_id','Student Sibling Registration No',['class'=>'control-label']) }} 
                    <span class="fa fa-asterisk"></span> 
                    {{ Form::text('student_sibling_id','',['class'=>'form-control','required','maxlength'=>'20']) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="save">
                </div>
            </form>  
        </div>
    </div>
</div>


