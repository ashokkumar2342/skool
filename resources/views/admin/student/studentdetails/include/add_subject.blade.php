<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Add Subject</h4>
        </div>
        <div class="modal-body">
            <form   action="{{ route('admin.studentSubject.store') }}" class="add_form" method="post" button-click="subject_tab,btn_close"> 
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject" class="form-control">
                        <option selected disabled>Select Subject</option>
                        @foreach ($subjectTypes as $subjectType)
                        <option value="{{ $subjectType->id }}">{{ $subjectType->name }}</option> 
                        @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label>Is Optional</label>
                    <select name="isoptional" class="form-control">
                        <option selected disabled>Select Option</option>
                        @foreach ($isoptionals as $isoptional)
                        <option value="{{ $isoptional->id }}">{{ $isoptional->name }}</option>
                        @endforeach
                    </select>
                </div> 
                <input type="hidden" name="student_id" id="session_id" value="{{ $student }}">
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success" name="save">
        </div>
            </form>  
        </div>
    </div>
</div>


