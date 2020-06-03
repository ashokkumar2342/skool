<!-- Modal -->
<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }  
</style> 
  <div class="modal-dialog" style="width:40%"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Fee Details Concession Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          <form class=" add_form" button-click="btn_close,btn_student_fee_assign_show"    action="{{ route('admin.studentFee.details.concession.store',$studentFeeDetail->id) }}" method="post">              
          {{ csrf_field() }} 
  
  <input type="hidden" name="academic_year_id" id="academic_year_id" value="{{ $feeStructureAmounts->academic_year_id }}">      
  <input type="hidden" name="fee_structure" id="fee_structure" value="{{ $feeStructureAmounts->fee_structure_id }}">      
<div class="col-lg-12 form-group">
<label>Concession</label>
<select name="concession" class="form-control" onchange="callAjax(this,'{{ route('admin.concession.search') }}'+'?fee_structure='+$('#fee_structure').val()+'&academic_year_id='+$('#academic_year_id').val(),'concession_amount')">
  <option value="0">No concession</option>
  @foreach ($concessions as $concession)
     <option value="{{ $concession->id }}">{{ $concession->name }}</option>
  @endforeach
</select> 
</div>
<div id="concession_amount">
 
</div>
          <div class="text-center">
             <input type="submit" value="Update" class="btn btn-success">
          </div>
        </form>
        </div> 
       </div> 
    </div>
    <!-- /.box-body -->
  </div>
</div>


  <!-- /.box -->
