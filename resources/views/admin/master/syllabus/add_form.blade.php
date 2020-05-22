<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add</h4>
        </div>
        <div class="modal-body"> 
            <form action="{{ route('admin.master.syllabus.store') }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close" content-refresh="category_dataTable">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-12">
                    <div class="form-group"> 
                      <label >Academic Year</label>  
                      <select name="academic_year_id" id="fee_paid_upto" class="form-control">
                        <option disabled selected>Select Academic Year</option>
                        @foreach ($academicYears as $academicYear)
                         <option value="{{$academicYear->id}}">{{$academicYear->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12 form-group"> 
                    <label>Class</label>
                    <select name="class_id" class="form-control" id="class_id" onchange="callAjax(this,'{{ route('admin.master.syllabus.class.subject') }}','class_wise_subject')">
                      <option selected disabled>Select Class</option> 
                      @foreach ($classTypes as $classType) 
                      <option value="{{ $classType->id }}">{{ $classType->name or '' }}</option> 
                       @endforeach 
                    </select> 
                  </div>
                  <div class="col-lg-12 form-group" id="class_wise_subject">
                    
                  </div>
                  <div class="col-lg-12 form-group">
                    <label>Syllabus</label>
                    <input type="file" name="syllabus" class="form-control">
                      
                  </div>
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                        <input type="submit" class="btn btn-success">
                    </div> 
                </div> 
            </form>
        </div> 
    </div>
</div>


<!-- /.content -->


