 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="add_document" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Add</h4>
                 </div>
                 <div class="modal-body">
                   <form action="{{ route('admin.document.add') }}" id="document-form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                         {{ Form::label('document_type_id','Document Type',['class'=>' control-label']) }}
                         {!! Form::select('document_type_id',$documentTypes, null, ['class'=>'form-control','placeholder'=>'Select Document Type','required']) !!}
                         <p class="text-danger">{{ $errors->first('parents') }}</p>
                    </div>
                     <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="form-group">
                        {{ Form::label('file','File/ ONLY PDF',['class'=>' control-label']) }}                         
                        {{ Form::file('file','',['class'=>'form-control',' required']) }}
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="save">
                    {{-- <button type="button" class="btn_save_document btn btn-success">Save</button> --}}
                </div>
             </form>  
            </div>
       </div>
    </div>
 @push('scripts')
  
 {{-- add document --}}
  
@endpush