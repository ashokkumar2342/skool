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
        
             {{ Form::label('concession','Concession',['class'=>' control-label']) }}
           <select name="concession" id="concession" class="form-control form-group" onchange="concessitonAmount($('#concession').val())" required>
                  <option value="" selected="" disabled="">Select Concession</option> 
                  @foreach ($concession as $key=>$value)
                     <option value="{{ $key }}" {{ $key==$studentFeeDetail->concession_id?'selected':'' }}>{{ $value }}</option>
                  @endforeach
                  
                </select>
             {{ Form::label('concession_amount','Concession Amount',['class'=>' control-label']) }}

            {!! Form::text('concession_amount',$studentFeeDetail->concession_amount, ['class'=>'form-control form-group concession','placeholder'=>'Concession Amount','required','id'=>'concession_amount']) !!}
        
          <br> 
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
