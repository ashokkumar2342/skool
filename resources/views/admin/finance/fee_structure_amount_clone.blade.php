<div class="modal-dialog" style="width:40%"> 
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Fee Structure Clone</h4>
        </div>
        <div class="modal-body">
            <div class="row"> 
                <div class="col-md-12"> 
                    <form action="{{ route('admin.feeStructureAmount.clone.store',$condition_id) }}" method="post" class="add_form" button-click="btn_close" select-triger="academic_year_select_box" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 form-group"> 
                             <label>For Academic Year</label>
                             <select name="for_academic_year_id" class="form-control">
                                 <option selected disabled>Select For Academic Year</option>
                                 @foreach ($acardemicYears as $acardemicYear)
                                    <option value="{{ $acardemicYear->id }}">{{ $acardemicYear->name }}</option> 
                                 @endforeach 
                             </select>
                           </div>
                           <div class="col-lg-6 form-group"> 
                             <label>New Academic Year</label>
                             <select name="new_academic_year_id" class="form-control">
                                <option selected disabled>Select Academic Year</option>
                                 @foreach ($acardemicYears as $acardemicYear)
                                    <option value="{{ $acardemicYear->id }}">{{ $acardemicYear->name }}</option> 
                                 @endforeach 
                             </select>
                           </div>
                           <div class="col-lg-12 text-center">
                            <input type="submit" class="btn btn-success" value="Clone" style="margin: 10px">
                               
                           </div>
                        </div> 
                    </form> 
                </div> 
            </div>

        </div>
    </div>

    <!-- /.content -->


