<div class="modal-dialog"> 
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="row"> 
                <div class="col-lg-12 form-group"> 
                    <form action="{{ route('admin.feeStructureLastDate.report.generate') }}" method="post"  no-reset="true" target="blank">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label>Academic Year</label>
                                <select name="academic_year_id" class="form-control" required="required">
                                    <option selected disabled>Select Academic Year</option>
                                    @foreach ($academicYears as $academicYear)
                                    <option value="{{ $academicYear->id }}"{{ $academicYear->status==1?'selected':'' }}>{{ $academicYear->name }}</option> 
                                    @endforeach 
                                </select>
                            </div>
                            {{-- <div class="col-lg-12 form-group">
                                <label>Fee Structure</label>
                                <select name="fee_structure" id="fee_structure" class="form-control">
                                    @foreach ($FeeStructures as $FeeStructure)
                                    <option selected disabled>Select Fee Structure</option> 
                                    <option value="{{ $FeeStructure->id }}">{{ $FeeStructure->name }}</option>  
                                    @endforeach
                                </select> 
                            </div> --}}
                            {{-- <div class="col-lg-4" style="margin-top: 30px">
                                <label>Page Break</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="checked" value="page-break" > 
                            </div> --}}
                            <div class="col-lg-12 text-center" style="margin-top: 24px">
                                <input type="submit" class="btn btn-primary" value="PDF Generate"> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


